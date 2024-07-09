<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Admin\AddCateController;
use App\Http\Controllers\Admin\ShowCateController;
use App\Http\Controllers\Admin\ShowSongsController;
use App\Http\Controllers\Admin\ShowSingleSongsController;
use App\Http\Controllers\Admin\ShowAllUsersController;
use App\Http\Controllers\Admin\ViewFeedbacksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CountHomeController;

//for public
use App\Http\Controllers\Public\ShowAllController;
use App\Http\Controllers\Public\FeedbackController;
use App\Http\Controllers\Public\EventController;
use App\Http\Controllers\Public\BlogController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/events', function () {
    return view('events');
})->name('events');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/addcate', function () {
    return view('addcate');
})->middleware(['auth', 'verified'])->name('addcate');

Route::get('/addsong', function () {
    return view('addsong');
})->middleware(['auth', 'verified'])->name('addsong');

Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/reports', function () {
    return view('reports');
})->middleware(['auth', 'verified'])->name('reports');


Route::get('/viewspecificsong', function () {
    return view('viewspecificsong');
})->middleware(['auth', 'verified'])->name('viewspecificsong');

    //This for categories public
    Route::get('/', [ShowAllController::class, 'show'])->name('welcome.show');

    //This rote is for feedback
    Route::post('/home', [FeedbackController::class, 'store'])->name('home.store');



Route::middleware('auth')->group(function () {

    //Dashboard 
    Route::get('/dashboard', [CountHomeController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //This Controller is forcategories
    Route::post('addcategories', [AddCateController::class, 'store'])->name('addcategories.store');
    Route::get('/addcate', [ShowCateController::class, 'show'])->name('/addcate.show');
    Route::delete('/addcategories', [AddCateController::class, 'destroy'])->name('deletecate.destroy');

     //This Songs backend
     Route::post('addsongs', [ShowSongsController::class, 'store'])->name('addsongs.store');
     Route::get('/addsong', [ShowSongsController::class, 'show'])->name('/addsong.show');
     Route::get('/addsongs', [ShowSongsController::class, 'destroy'])->name('deletesong.destroy'); 
     //This is to view patints pharmacy record 
     Route::get('/viewspecificsong/{id}', [ShowSingleSongsController::class, 'show'])->name('viewspecificsong.show');
    // Route::delete('/addcategories', [AddCateController::class, 'destroy'])->name('deletecate.destroy');

     //For users
     Route::get('/users', [ShowAllUsersController::class, 'show'])->name('/users.show');
     Route::delete('/deleteusers', [ShowAllUsersController::class, 'destroy'])->name('deleteuser.destroy');

    // Route::get('/upload', [SongController::class, 'create'])->name('upload.form');
    // Route::post('/upload', [SongController::class, 'store'])->name('upload.song');

     //This is for report backend 
    Route::post('/reports', [ViewFeedbacksController::class, 'show'])->name('reports.show');

    //This is for event 
    Route::get('/events', [EventController::class, 'show'])->name('/events.show');

    //This is for blog/news backend
    Route::get('/blog', [BlogController::class, 'show'])->name('/blog.show');



});

require __DIR__.'/auth.php';
 