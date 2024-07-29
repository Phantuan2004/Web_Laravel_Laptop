<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

// Tạo phương thức prefix để sử dụng url chung
Route::prefix('/')->group(function () {
    //*TODO: User
    //* Home
    Route::get('/', [UserController::class, 'index'])->name('home');

    //* Product page
    Route::get('products', [UserController::class, 'ListProducts'])->name('ListProducts');

    //* Products by Category
    Route::get('pro_by_cate/{id}', [UserController::class, 'ProByCate'])->name('ProByCate');

    //* Detail page
    Route::get('detal/{id}', [UserController::class, 'DetailProducts'])->name('DetailProducts');

    //* Search page
    Route::get('searchUser', [UserController::class, 'SearchUser'])->name('SearchUser');

    //* Dashboard page
    Route::get('dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    //* User profile page
    Route::middleware('auth')->group(function () {
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';


    //*TODO: Admin page
    //* Home
    Route::get('admin', [AdminController::class, 'indexAdmin'])->name('index');

    //* Add
    Route::get('add', [AdminController::class, 'add'])->name('add');
    Route::post('add', [AdminController::class, 'store'])->name('store');

    //* Edit
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::put('edit/{id}', [AdminController::class, 'update'])->name('edit');

    //* Delete
    Route::delete('product/{id}', [AdminController::class, 'destroy'])->name('destroy');

    //* Search
    Route::get('search', [AdminController::class, 'search'])->name('search');
});
