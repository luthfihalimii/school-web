<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        Carbon::setLocale('id');

        $articles = News::orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('berita', [
            'articles' => $articles,
        ]);
    }

    public function show(string $slug): View
    {
        Carbon::setLocale('id');

        $article = News::where('slug', $slug)->firstOrFail();

        $relatedArticles = News::where('id', '!=', $article->id)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        return view('detail-berita', [
            'article' => $article,
            'relatedArticles' => $relatedArticles,
        ]);
    }
}
