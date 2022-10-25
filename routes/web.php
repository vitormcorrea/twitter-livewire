<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowTweets;
use App\Http\Livewire\User\UploadPhoto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('upload', UploadPhoto::class)->middleware('auth')->name('upload.photo.user');
Route::get('tweets', ShowTweets::class)->middleware('auth')->name('tweets.index');

Route::get('/', function () {
    return redirect()->route('tweets.index');
});

Route::middleware([  'auth:sanctum',  config('jetstream.auth_session'), 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return redirect()->route('tweets.index');
    })->name('dashboard');

});