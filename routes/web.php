<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

$pages = [
    'home',
    'about-us',
    'team/governance-council',
    'team/personnel',
    'team/experts-consultants',
    'projects/ongoing',
    'projects/completed',
    'publications/articles',
    'publications/reports',
    'publications/manuals-guidelines',
    'publications/photo-gallery',
    'events-career/upcoming',
    'events-career/completed',
    'events-career/vacancy',
    'contact-us',
];

Route::get('/', function () {
    return view('grdc', ['pageKey' => 'home']);
})->name('home');

foreach ($pages as $page) {
    if ($page === 'home') {
        continue;
    }

    Route::get($page, function () use ($page) {
        return view('grdc', ['pageKey' => $page]);
    })->name(str_replace(['/', '-'], ['.', '_'], $page));
}

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
