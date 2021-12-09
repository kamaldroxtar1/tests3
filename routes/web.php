<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tests3_controller;

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

Route::get('/show', [tests3_controller::class, 'show']);
Route::get('/add', [tests3_controller::class, 'add']);
Route::post('/form_submit', [tests3_controller::class, 'store']);
Route::get('/delete/{id}', [tests3_controller::class, 'destroy']);
Route::get('/edit/{id}', [tests3_controller::class, 'edit']);
Route::post('/update/{id}', [tests3_controller::class, 'update']);


Route::view("/edit","tests3.edit");

