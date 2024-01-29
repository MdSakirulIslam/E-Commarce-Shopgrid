<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopgridController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;


Route::get('/',[ShopgridController::class,'index'])->name('home');
Route::get('/product-category',[ShopgridController::class,'category'])->name('product-category');
Route::get('/product-detail',[ShopgridController::class,'product'])->name('product-detail');
Route::get('/card/show',[CartController::class,'index'])->name('card.show');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::get('/customer/login',[CustomerAuthController::class,'login'])->name('customer.login');
Route::get('/customer/register',[CustomerAuthController::class,'register'])->name('customer.register');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/category/manage',[CategoryController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::get('/category/store',[CategoryController::class,'store'])->name('category.store');

    Route::get('/sub-category/manage',[SubCategoryController::class,'index'])->name('sub-category.index');
    Route::get('/sub-category/create',[SubCategoryController::class,'create'])->name('sub-category.create');

    Route::get('/brand/manage',[BrandController::class,'index'])->name('brand.index');
    Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');

    Route::get('/unit/manage',[UnitController::class,'index'])->name('unit.index');
    Route::get('/unit/create',[UnitController::class,'create'])->name('unit.create');
});
