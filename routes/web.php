<?php

use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\BidController;
use App\Http\Controllers\User\TransactionController as UserTransactionController;

use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post')
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.post')
    ->middleware('guest');

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/bid/{item}', [BidController::class, 'store'])
        ->name('bid.store');

    Route::get('/transaksi', [UserTransactionController::class, 'index'])
        ->name('transaksi');
});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/barang', [ItemController::class, 'index'])
        ->name('barang');

    Route::resource('/items', ItemController::class)->except(['index']);

    Route::get('/peserta', function () {
        $participants = User::where('role','user')
        ->withCount('transactions')->get();
        return view('admin.peserta', compact('participants'));
    })->name('peserta');

    Route::get('/transaksi', [AdminTransactionController::class, 'index'])
        ->name('transaksi');

    Route::post('/barang/{item}/proses', [AdminTransactionController::class, 'processSingle'])
        ->name('barang.process');
});
