<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        Carbon::setLocale('id');

        $teachers = Teacher::latest()->get();
        $news = News::orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('dashboard', [
            'teachers' => $teachers,
            'newsItems' => $news,
        ]);
    }
}
