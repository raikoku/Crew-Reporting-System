<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\AdminController;

//register
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//login
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('web');

//print 
Route::get('/print-crew-list', [PrintController::class, 'show'])->name('print.crew');
Route::get('/print-crew-list/pdf', [PrintController::class, 'exportPDF'])->name('print.crew.pdf');

//Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/flight/create', [AdminController::class, 'create'])->name('admin.flight.create');
Route::post('/admin/flight/update/{id}', [AdminController::class, 'update'])->name('admin.flight.update');
Route::post('/admin/flight/delete/{id}', [AdminController::class, 'delete'])->name('admin.flight.delete');
Route::post('/admin/flight/reset/{id}', [AdminController::class, 'reset'])->name('admin.flight.reset');


Route::get('/', function () {
    return view('welcome');
});
