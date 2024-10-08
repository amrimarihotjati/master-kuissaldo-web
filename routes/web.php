<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

    // HomeController
    Route::get('/web-landing-page/dashboard', [App\Http\Controllers\HomeController::class, 'landingPageDashboard'])->name('landingPageDashboard');
    
    // LandingPage
    // CRUD
    Route::post('/create-landing-page', [App\Http\Controllers\LandingPageController::class, 'createNewLandingPage'])->name('createNewLandingPage');
    Route::get('/delete-landing-page/{id}', [App\Http\Controllers\LandingPageController::class, 'deleteLandingPage'])->name('deleteLandingPage');
    Route::get('/get-dt-landing-page', [App\Http\Controllers\LandingPageController::class, 'getDTLandingPage'])->name('getDTLandingPage');
    Route::get('/get-detail-landing-page/{id}', [App\Http\Controllers\LandingPageController::class, 'detailLandingPage'])->name('detailLandingPage');

    Route::get('/hakakses', [App\Http\Controllers\HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [App\Http\Controllers\HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [App\Http\Controllers\HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [App\Http\Controllers\HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');

});