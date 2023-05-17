<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BandComponent;
use App\Http\Livewire\CreateComponent;
use App\Http\Livewire\EditComponent;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\RegisterComponent;
use App\Http\Livewire\UserProfile;

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

// Route::get('/', LoginComponent::class)->name('login');
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', LoginComponent::class)->name('login');
    Route::get('/register', RegisterComponent::class)->name('register');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', BandComponent::class)->name('band-component');
    Route::get('/{user}', UserProfile::class);
    Route::get('/add-band', CreateComponent::class);
    Route::get('/band/edit/{id}', EditComponent::class);
});
