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
