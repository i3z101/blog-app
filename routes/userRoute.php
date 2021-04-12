<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| users Routes
|--------------------------------------------------------------------------
|
*/

Auth::routes();

Route::get('/',[PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Route::get('/home', function(){
    return redirect('/');
});



