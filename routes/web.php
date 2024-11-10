<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

Route::view('/', "welcome")->name('home');

Route::view('contacto', "contact")->name('contact');

Route::view('nosotros', "about")->name('about');

Route::resource('blog', PostController::class)->names('posts')->parameters(['blog' => 'post']);

Route::resource('categories', CategoryController::class);

Route::get('admin/{user}', [AdminController::class, 'index'])->name('admin')->middleware('auth');
Route::get('admin/{post}/edit', [AdminController::class, 'edit'])->name('admin.edit')->middleware('auth');
Route::delete('admin/{post}', [AdminController::class, 'destroy'])->name('admin.destroy')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update-avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'es'])) {
        abort(400);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('lang');

require __DIR__ . '/auth.php';
