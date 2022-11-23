<?php

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

Route::get('/', \App\Http\Livewire\MainPage::class);

Route::get('/login', \App\Http\Livewire\LoginPage::class);

Route::get('/register', \App\Http\Livewire\RegisterPage::class);

Route::get('/dashboard', \App\Http\Livewire\Dashboard::class);
