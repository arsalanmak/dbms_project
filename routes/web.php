<?php

use App\Http\Livewire\Cars;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('welcome'); });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/cars', Cars::class)->name('cars');

    
    // Route::get('/car/{car}', ShowPosts::class)->name('car.detail');
    // Route::get('/users', ShowPosts::class)->name('users');
    // Route::get('/user/{user}', ShowPosts::class)->name('users');

    // Route::get('/events', ShowPosts::class)->name('event');
    // Route::get('/event/{event}', ShowPosts::class)->name('event.show');
    // Route::get('/event/{event}/schedule', ShowPosts::class)->name('event.schedule');
});
