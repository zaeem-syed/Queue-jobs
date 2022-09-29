<?php

use App\Models\Channel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Jobs\OrderPlacedjob;

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

Route::get('/', function () {
    //(new OrderPlacedjob())->handle();
         dispatch(new OrderPlacedjob())->delay(5);
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/insert', [App\Http\Controllers\UserImageController::class, 'insert'])->name('insert');
Route::post('/store', [App\Http\Controllers\UserImageController::class, 'store'])->name('store');


Route::get('/showimage',[App\Http\Controllers\UserImageController::class, 'showimage']);

Route::post('/reviews',[App\Http\Controllers\UserImageController::class, 'reviews']);

Route::post('/like',[\App\Http\Controllers\UserImageController::class,'like']);

Route::get('/collect',[\App\Http\Controllers\UserImageController::class,'collection']);


Route::get('/vote',[\App\Http\Controllers\UserImageController::class,'vote']);

Route::post('/vote',[\App\Http\Controllers\UserImageController::class,'CastVote']);

Route::get('/channel',[ChannelController::class,'index']);


Route::get('/post',[PostController::class,'create']);



route::get('/product/{slug}',[ProductController::class,'show']);


Route::get('/any', function(){
    return view('any');
});


Route::get('/Country',[CountryController::class,'index']);
Route::post('/getstate',[CountryController::class,'getstate']);
Route::post('/getcity',[CountryController::class,'getcity']);
// Route::any('{/any}', function(){
//     return view('app');
// })->where('any','*');
