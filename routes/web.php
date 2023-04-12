<?php

use App\Http\Controllers\ReminderController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('reminders')->group(function() {
    Route::get('/', [ReminderController::class, 'index'])->name('reminders.index');
    Route::get('/create', [ReminderController::class, 'create'])->name('reminders.create');
    Route::post('/store', [ReminderController::class, 'store'])->name('reminders.store');
    Route::get('/show/{id}', [ReminderController::class, 'show'])->name('reminders.show');
    Route::get('/{reminder}/edit', [ReminderController::class, 'edit'])->name('reminders.edit');
    Route::post('/update/{id}', [ReminderController::class, 'update'])->name('reminders.update');
    Route::post('/destroy', [ReminderController::class, 'destroy'])->name('reminders.destroy');
});
