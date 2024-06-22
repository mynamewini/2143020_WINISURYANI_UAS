<?php

use Illuminate\Support\Facades\Route;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminMoneyController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminAspirationController;
use App\Http\Controllers\Admin\AdminSettingController;

// Operator Controllers
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\Operator\OperatorOrderController;
use App\Http\Controllers\Operator\OperatorProductController;
use App\Http\Controllers\Operator\OperatorCategoryController;
use App\Http\Controllers\Operator\OperatorAspirationController;
use App\Http\Controllers\Operator\OperatorMoneyController;

// User Controllers
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserAspirationController;

// Home Controller
use App\Http\Controllers\HomeController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Route
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('orders', AdminOrderController::class);

    // Confirm Payment
    Route::patch('/orders/{order}/confirm-payment', [AdminOrderController::class, 'confirmPayment'])->name('orders.confirmPayment');

    // Update Shipping
    Route::patch('/orders/{order}/update-shipping', [AdminOrderController::class, 'updateShipping'])->name('orders.updateShipping');

    // Order History
    Route::get('history', [AdminOrderController::class, 'history'])->name('orders.history');

    // updateAdminNotes
    Route::patch('/orders/{order}/updateAdminNotes', [AdminOrderController::class, 'updateAdminNotes'])->name('orders.updateAdminNotes');

    // income resource
    Route::resource('incomes', AdminMoneyController::class);

    // User Resource
    Route::resource('users', AdminUserController::class);

    // Admin User List
    Route::get('/admin-list', [AdminUserController::class, 'admin'])->name('adminList');

    // Operator User List
    Route::get('/operator-list', [AdminUserController::class, 'operator'])->name('operatorList');

    // User List
    Route::get('/user-list', [AdminUserController::class, 'user'])->name('userList');

    // Aspirasi Resource
    Route::resource('aspirations', AdminAspirationController::class);

    // Settings Resource
    Route::resource('settings', AdminSettingController::class);

});

// Operator Route
Route::middleware(['auth', 'role:operator'])->prefix('operator')->name('operator.')->group(function () {
    Route::get('/dashboard', [OperatorController::class, 'index'])->name('dashboard');
    Route::resource('categories', OperatorCategoryController::class);
    Route::resource('products', OperatorProductController::class);

    Route::resource('orders', OperatorOrderController::class);

    // Confirm Payment
    Route::patch('/orders/{order}/confirm-payment', [OperatorOrderController::class, 'confirmPayment'])->name('orders.confirmPayment');

    // Update Shipping
    Route::patch('/orders/{order}/update-shipping', [AdminOrderController::class, 'updateShipping'])->name('orders.updateShipping');

    // Order History
    Route::get('history', [OperatorOrderController::class, 'history'])->name('orders.history');

    // updateAdminNotes
    Route::patch('/orders/{order}/updateAdminNotes', [OperatorOrderController::class, 'updateAdminNotes'])->name('orders.updateAdminNotes');

    // Aspiration Resource
    Route::resource('aspirations', OperatorAspirationController::class);

    // income resource
    Route::resource('incomes', OperatorMoneyController::class);
});

// User Route
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/products', [UserProductController::class, 'index'])->name('user.products.index');
    Route::get('/user/products/{product}', [UserProductController::class, 'show'])->name('user.products.show');

    // Order Resource
    Route::resource('user.orders', UserOrderController::class);

    // Order Payment
    Route::get('/user/orders/{order}/payment', [UserOrderController::class, 'payment'])->name('user.orders.payment');

    // Completed Order
    Route::patch('/user/orders/{order}/completed', [UserOrderController::class, 'completed'])->name('user.orders.completed');

    // updateAccepted
    Route::get('/user/orders/{order}/updateAccepted', [UserOrderController::class, 'updateAccepted'])->name('user.orders.updateAccepted');

    // Aspiration Resource
    Route::resource('aspirations', UserAspirationController::class);
    
});

require __DIR__ . '/auth.php';
