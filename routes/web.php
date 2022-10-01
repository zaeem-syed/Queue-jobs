<?php

use App\Models\Channel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Jobs\DummyTestJob;
use App\Jobs\NewJobWorker;
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
        // foreach(range(1,100) as $i)
        // {
        //     dispatch(new OrderPlacedjob())->delay(5);
        // }

        //dispatch(new NewJobWorker())->onQueue('payments');

        //dispatch(new OrderPlacedjob())->delay(5);

    //     $chain=[
    //         new NewJobWorker(),
    //         new DummyTestJob(),
    //         new OrderPlacedjob(),

    //     ];

    //    \Illuminate\Support\Facades\Bus::chain($chain)->dispatch();

    $batch=[
        new NewJobWorker(),
        new DummyTestJob(),
        new OrderPlacedjob(),
    ];
    \Illuminate\Support\Facades\Bus::batch($batch)->dispatch();

    return view('welcome');
    //php artisan queue:batches-table first make this migration
    // use batchable trait in inside the job

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
