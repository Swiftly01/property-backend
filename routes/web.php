
<?php

use App\Http\Controllers\BuyRequestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomBuildController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PhotographRedirectContoller;
use App\Http\Controllers\PhotographRedirectController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PodcastRedirectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SellRequestController;
use App\Http\Controllers\StagingRedirectController;
use Illuminate\Support\Facades\Route;



Route::get('/', [IndexController::class, 'index'])->name('home');

Route::prefix('/property')->group(function () {
    Route::get('/', [PropertyController::class, 'showProperty'])->name('property');
    Route::post('/store', [SellRequestController::class, 'store'])->name('sellRequest.store');
    Route::get('/listing', [SellRequestController::class, 'create'])->name('sellRequest.create');
    Route::get('/{property}', [PropertyController::class, 'showPropertyDetails'])->name('property.show');
    Route::post('/buy-request', [BuyRequestController::class, 'store'])->name('buyRequest.store');
});


Route::get('/staging', [StagingRedirectController::class, 'showStagings'])->name('staging');
Route::get('/staging/{staging}/show', [StagingRedirectController::class, 'showStagingDetails'])->name('staging.details');

Route::get('/photographs', [PhotographRedirectController::class, 'showPhotographs'])->name('photographs');
Route::get('/photographs/{photograph}/show', [PhotographRedirectController::class, 'showPhotographDetails'])->name('photograph.details');

Route::get('/podcasts', [PodcastRedirectController::class, 'showPodcasts'])->name('podcasts');
Route::get('/contact', [ContactController::class, 'showContactPage'])->name('contact');
Route::get('/custom-build', [CustomBuildController::class, 'create'])->name('custom-build');

Route::get('/success', function () {
    return view('pages.success');
})->name('success');

Route::get('/test', function () {})->name('test');

 Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');


Route::middleware('auth')->prefix('/admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [DashboardController::class, 'showSettings'])->name('settings');
    Route::resource('/properties', PropertyController::class);
    Route::resource('/buy-requests', BuyRequestController::class);
    Route::resource('/sell-requests', SellRequestController::class);

    Route::resource('/photographs', PhotographRedirectController::class);
    Route::resource('/stagings', StagingRedirectController::class);
    Route::resource('/podcasts', PodcastRedirectController::class);
    Route::resource('/contacts', ContactController::class);

    Route::patch('buy-requests/{buy_request}/{action}', [BuyRequestController::class, 'handleStatusUpdate'])
        ->name('buy-requests.update-status');
    Route::patch('sell-requests/{sell_request}/{action}', [BuyRequestController::class, 'handleStatusUpdate'])
        ->name('sell-requests.update-status');

    Route::delete('properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::delete('thumbnail/{model}/{id}', [MediaController::class, 'destroyThumbnail'])->name('thumbnail.delete');
    Route::delete('/media/{media}', [MediaController::class, 'destroyOtherImage'])->name('media.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
