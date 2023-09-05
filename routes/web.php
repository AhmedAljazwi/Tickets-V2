<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;

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

Route::get('/users', [UserController::class, 'users'])->middleware(['isUser', 'isAdmin', 'hasUsers']);
Route::get('/events', [EventController::class, 'index'])->middleware(['isUser', 'isAdmin', 'hasEvent']);
Route::get('/create-event', [EventController::class, 'create'])->middleware(['isUser', 'isAdmin', 'hasEvent']);
Route::post('/store-event', [EventController::class, 'store'])->middleware(['isUser', 'isAdmin', 'hasEvent']);
Route::get('/edit-event/{id}', [EventController::class, 'edit'])->middleware(['isUser', 'isAdmin', 'hasEvent']);
Route::put('/update-event/{id}', [EventController::class, 'update'])->middleware(['isUser', 'isAdmin', 'hasEvent']);
Route::get('/delete-event/{id}', [EventController::class, 'delete'])->middleware(['isUser', 'isAdmin', 'hasEvent']);

Route::get('/show-event/{id}', [ReservationController::class, 'show'])->middleware('isUser');
Route::post('/reserve/{id}', [ReservationController::class, 'reserve'])->middleware('isUser');

Route::get('/register', [UserController::class, 'register']);
Route::post('/register-store', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/check', [UserController::class, 'check']);

Route::get('/logout', [UserController::class, 'logout'])->middleware('isUser');

Route::get('/settings', [UserController::class, 'settings'])->middleware('isUser');
Route::post('/settings-store', [UserController::class, 'storeSettings'])->middleware('isUser');

Route::get('/reservations', [ReservationController::class, 'showReservations'])->middleware('isUser');

Route::get('/disable-account/{id}', [UserController::class, 'disable'])->middleware(['isUser', 'isAdmin', 'hasUsers']);
Route::get('/activate-account/{id}', [UserController::class, 'activate'])->middleware(['isUser', 'isAdmin', 'hasUsers']);

Route::get('/event-state/{id}', [UserController::class, 'eventState'])->middleware(['isUser', 'isAdmin', 'hasUsers']);
Route::get('/users-state/{id}', [UserController::class, 'usersState'])->middleware(['isUser', 'isAdmin', 'hasUsers']);

Route::get('/admin-wallet', [WalletController::class, 'index']);
Route::get('/recharge-wallet/{id}', [WalletController::class, 'recharge']);
Route::post('/recharge-wallet/{id}', [WalletController::class, 'rechargeUser']);
Route::get('user-wallet', [WalletController::class, 'userWallet']);