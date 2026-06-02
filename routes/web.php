<?php

use App\Http\Controllers\PageController;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::post('/subscribe/newsletter', function (Request $req) {

    $subscribe = new NewsletterSubscriber();
    $subscribe->email = $req->email;
    $subscribe->token = \Str::random(32);
    $subscribe->save();

    return $subscribe;
});