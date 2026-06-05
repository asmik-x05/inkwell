<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/categories', [PageController::class, 'category'])->name('categories');

Route::get('/categories/{slug}', [PageController::class, 'categoryRedirect'])->name('category');


Route::get('/trending', [PageController::class, 'trending'])->name('trending');

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', AuthController::class)->middleware('throttle:5,1')->name('login.attempt');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/subscribe/newsletter', function (Request $req) {

    $subscribe = new NewsletterSubscriber();
    $subscribe->email = $req->email;
    $subscribe->token = \Str::random(32);
    $subscribe->save();

    return $subscribe;
});

Route::get('/search', SearchController::class)->name('search');

Route::get('/article/{slug}', [PageController::class, 'article'])->name('article');