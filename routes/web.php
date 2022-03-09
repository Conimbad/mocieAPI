<?php

use App\Http\Controllers\Welcome;
use App\Http\Livewire\Favorites;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [Welcome::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/favorites', Favorites::class)->name('favorites');
    Route::get('/dashboard', function () {

        return view('dashboard');
    })->name('dashboard');
});

/* Route::middleware(['auth:sanctum', 'verified'])->get('/favorites', Favorites::class)->name('favorites');
 */
