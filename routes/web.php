<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//RUTAS ADMIN
Route::middleware('admin')->group(function () {
    //RUTAS CATEGORIAS
    Route::get('/add_category', [AdminController::class, 'addCategory'])->name('admin.addcategory');
    Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('admin.viewcategory');
    Route::post('/add_category', [AdminController::class, 'postAddCategory'])->name('admin.postaddcategory');
    Route::get('/deletecategory/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deletecategory');
    Route::get('/updatecategory/{id}', [AdminController::class, 'updatecategory'])->name('admin.updatecategory');
    Route::post('/updatecategory/{id}', [AdminController::class, 'postUpdateCategory'])->name('admin.postupdatecategory');

    //RUTAS PRODUCTOS
    Route::get('/add_product', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::get('/view_product', [AdminController::class, 'viewProduct'])->name('admin.viewproduct');
    Route::post('/add_product', [AdminController::class, 'postAddProduct'])->name('admin.postaddproduct');
    Route::get('/deleteproduct/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteproduct');
    Route::get('/updateproduct/{id}', [AdminController::class, 'updateProduct'])->name('admin.updateproduct');
    Route::post('/updateproduct/{id}', [AdminController::class, 'postUpdateProduct'])->name('admin.postupdateproduct');

});

require __DIR__.'/auth.php';
