<?php

use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\ScanController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('dashboard/prgexchange',[ProgramsController::class, 'index'])->name('prgexchange');
Route::get('/prgexchange/create',[ProgramsController::class, 'create'])->name('prgexchange.create');
Route::post('/prgexchange',[ProgramsController::class, 'store'])->name('prgexchange.store');
Route::get('/prgexchange/{id}/readmore',[ProgramsController::class, 'show'])->name('prgexchange.show');
Route::get('/prgexchange/{id}/edit',[ProgramsController::class, 'edit'])->name('prgexchange.edit');


Route::get('/Scan',[ScanController::class, 'index'])->name('scan');
Route::get('/scan/test',function(){
    return Inertia::render('Scan/test');
})->name('scan.test');
Route::get('/Scan/{points}/{details}',[ScanController::class, 'create'])->name('scan.create');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Redirect::route('prgexchange');
        // return Inertia::render('Dashboard');
    })->name('dashboard');
});
