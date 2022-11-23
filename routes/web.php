<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



route::get('/',[HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('/redirect',[HomeController::class, 'redirect']);
route::get('/view_catagory',[AdminController::class, 'view_catagory']);
route::post('/add_catagory',[AdminController::class, 'add_catagory']);
route::get('/delete_catagory/{id}',[AdminController::class, 'delete_catagory']);
route::get('/view_product',[AdminController::class, 'view_product']);
route::post('/add_product',[AdminController::class, 'add_product']);
route::get('/show_product',[AdminController::class, 'show_product']);
route::get('/delete_product/{id}',[AdminController::class, 'delete_product']);
route::get('/update_product/{id}',[AdminController::class, 'update_product']);
route::post('/confirm_update_product/{id}',[AdminController::class, 'CnfmUpdateProduct']);
route::get('/product_details/{id}',[HomeController::class, 'product_details']);
route::post('/add_cart/{id}',[HomeController::class, 'add_cart']);
route::get('/show_cart',[HomeController::class, 'show_cart']);
route::get('/remove_cart/{id}',[HomeController::class, 'remove_cart']);
