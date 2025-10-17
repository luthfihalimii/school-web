<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatePayload($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $data['slug'] = $this->generateSlug($data['title']);

        News::create($data);

        return redirect()->route('dashboard')
            ->with('status', 'Berita berhasil dipublikasikan.')
            ->with('activeTab', $request->input('redirect_tab', 'berita'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $this->validatePayload($request);

        if ($request->hasFile('image')) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $data['slug'] = $this->generateSlug($data['title'], $news->id);

        $news->update($data);

        return redirect()->route('dashboard')
            ->with('status', 'Berita berhasil diperbarui.')
            ->with('activeTab', $request->input('redirect_tab', 'berita'));
    }

    public function destroy(News $news): RedirectResponse
    {
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();

        return redirect()->route('dashboard')
            ->with('status', 'Berita berhasil dihapus.')
            ->with('activeTab', request()->input('redirect_tab', 'berita'));
    }

    protected function validatePayload(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['required', 'string'],
            'published_at' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $data['body'] = trim($data['body']);
        $data['excerpt'] = $data['excerpt'] ?? Str::limit(strip_tags($data['body']), 180);
        $data['published_at'] = isset($data['published_at'])
            ? Carbon::parse($data['published_at'])
            : now();

        return $data;
    }

    protected function generateSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 1;

        while (
            News::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }
}
