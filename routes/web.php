<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeacherController;
use App\Models\News;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Carbon::setLocale('id');

    $teachers = Teacher::latest()->take(6)->get();
    $news = News::orderByDesc('published_at')
        ->orderByDesc('created_at')
        ->take(3)
        ->get();

    return view('welcome', [
        'teachers' => $teachers,
        'latestNews' => $news,
    ]);
})->name('home');

Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::view('/kalender', 'calendar')->name('calendar');
Route::view('/galeri', 'gallery')->name('gallery');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('teachers', TeacherController::class)->only(['store', 'update', 'destroy']);
    Route::resource('admin/news', AdminNewsController::class)->only(['store', 'update', 'destroy'])->names('admin.news');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
