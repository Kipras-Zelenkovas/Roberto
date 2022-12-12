<?php

use App\Http\Controllers\Applications;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Cities;
use App\Http\Controllers\Jobs;
use App\Models\Cities as ModelsCities;
use Illuminate\Support\Facades\Route;

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


Route::prefix('/')->group(function(){

    Route::get('', [Jobs::class, 'index'])->middleware('auth');
    Route::get('job', [Jobs::class, 'find'])->middleware('auth');
    Route::get('job-modify', [Jobs::class, 'modify'])->middleware('auth');
    Route::get('job-add', [Jobs::class, 'add'])->middleware('auth');
    Route::get('login', [Auth::class, 'sign_in'])->middleware('guest')->name('login');
    Route::get('register', [Auth::class, 'sign_up'])->middleware('guest')->name('register');
    Route::get('send', [Auth::class, 'send'])->middleware('guest')->name('password.request');;
    Route::get('reset/{token}', [Auth::class, 'reset'])->middleware('guest')->name('password.reset');
    Route::get('applications', [Applications::class, 'index'])->middleware('auth');
    Route::get('application', [Applications::class, 'find'])->middleware('auth');
    Route::get('application-add', [Applications::class, 'add'])->middleware('auth');
    Route::get('cities', [Cities::class, 'index'])->middleware('auth');
    Route::get('city-add', [Cities::class, 'add'])->middleware('auth');

    Route::post('', [Jobs::class, 'create'])->middleware('auth');
    Route::post('search', [Jobs::class, 'search'])->middleware('auth');
    Route::post('search-city', [Jobs::class, 'byCity'])->middleware('auth');
    Route::post('update', [Jobs::class, 'update'])->middleware('auth');
    Route::post('delete', [Jobs::class, 'delete'])->middleware('auth');
    Route::post('login', [Auth::class, 'login'])->middleware('guest');
    Route::post('register', [Auth::class, 'register'])->middleware('guest');
    Route::post('logout', [Auth::class, 'logout'])->middleware('auth');
    Route::post('forgot-password', [Auth::class, 'forgot_password'])->middleware('guest')->name('password.email');
    Route::post('reset-password', [Auth::class, 'reset_password'])->middleware('guest')->name('password.update');
    Route::post('application-create', [Applications::class, 'create'])->middleware('auth');
    Route::post('application-delete', [Applications::class, 'delete'])->middleware('auth');
    Route::post('city-create', [Cities::class, 'create'])->middleware('auth');
    Route::post('city-delete', [Cities::class, 'delete'])->middleware('auth');

    Route::post('/test', function(){
        return response()->json(ModelsCities::find(1)->jobs);
    });
});