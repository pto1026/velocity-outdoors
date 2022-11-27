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

Route::get('login', \App\Http\Livewire\LoginPage::class)->middleware('guest')->name('login');

Route::get('register', \App\Http\Livewire\RegisterPage::class)->middleware('guest');

Route::get('dashboard', \App\Http\Livewire\Dashboard::class)->middleware(['auth.session']);

Route::get('sign-out', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->middleware(['auth.session']);

Route::get('forgot-password', \App\Http\Livewire\ForgotPassword::class)->middleware('guest')->name('password.request');

Route::get('reset-password/{token}', \App\Http\Livewire\ResetPassword::class)->middleware('guest')->name('password.reset');
