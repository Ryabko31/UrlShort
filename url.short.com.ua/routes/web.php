<?php

use App\Http\Controllers\ShortLinkController;
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

Route::get('/404', function () {
    return view('404');
});




Route::get('/', [ShortLinkController::class, 'index']);

Route::post('/store', [ShortLinkController::class, 'store'])->name('store');


Route::get('{code}', [ShortLinkController::class, 'shortLink'])->name('shortLink');
