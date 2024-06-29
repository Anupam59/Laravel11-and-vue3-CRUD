<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(ProductController::class)->prefix('/product')->group(function (){
    Route::get('/index','Index');
    Route::post('/store','Store');
    Route::get('/show/{id}','Show');
    Route::post('/update/{id}','Update');
    Route::delete('/delete/{id}','Delete');
});
