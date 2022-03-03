<?php

use App\Events\ChatEvent;
use App\Http\Livewire\Chat;
use App\Http\Livewire\Counter;
use App\Http\Livewire\Registration;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', Registration::class);
Route::get('/reg', Registration::class);

Route::get('/chat', Chat::class);
