<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/users', [UserController::class, 'users']);
Route::get('/events', [EventController::class, 'index']);
Route::get('/create-event', [EventController::class, 'create']);
Route::post('/store-event', [EventController::class, 'store']);
Route::get('/edit-event/{id}', [EventController::class, 'edit']);
Route::put('/update-event/{id}', [EventController::class, 'update']);
Route::get('/delete-event/{id}', [EventController::class, 'delete']);

Route::get('/show-event/{id}', [ReservationController::class, 'show']);
Route::post('/reserve/{id}', [ReservationController::class, 'reserve']);

Route::get('/register', [UserController::class, 'register']);
Route::post('/register-store', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/check', [UserController::class, 'check']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/settings', [UserController::class, 'settings']);
Route::post('/settings-store', [UserController::class, 'storeSettings']);

Route::get('/reservations', [ReservationController::class, 'showReservations']);