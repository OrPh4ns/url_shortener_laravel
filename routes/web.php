<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShorterController;
use App\Models\Short;
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

Route::get('/', function ()
{
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/short', [ShorterController::class, 'index'])->name('short');
    Route::post('/short/insert', [ShorterController::class, 'store'])->name('short.insert');
    Route::get('/short/show', [ShorterController::class, 'get_all'])->name('short.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/{code}', function ($code){
    $short = DB::table('shorts')->select('orginal_url')->where('shorted_url', $code)->get();
    return redirect($short[0]->orginal_url);
});
