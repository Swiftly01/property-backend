<?php

use App\Http\Controllers\BuyRequestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhotographController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SellRequestController;
use App\Http\Controllers\StagingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function() {
    return view('admin.dashboard');
})->name('index');

 
Route::get('/test', function() {
})->name('test');


Route::resource('properties', PropertyController::class);
Route::resource('buy-requests', BuyRequestController::class);
Route::resource('sell-requests', SellRequestController::class);
Route::resource('photographs', PhotographController::class);
Route::resource('staging', StagingController::class);
Route::resource('podcasts', PodcastController::class);
Route::resource('contacts', ContactController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
