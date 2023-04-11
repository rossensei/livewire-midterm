<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BandComponent;
use App\Http\Livewire\CreateComponent;
use App\Http\Livewire\EditComponent;

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

Route::get('/', BandComponent::class)->name('band-component');
Route::get('/add-band', CreateComponent::class);
Route::get('/band/edit/{id}', EditComponent::class);
