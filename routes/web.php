<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopgridController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;

Route::get('/',[ShopgridController::class,'index'])->name('home');
Route::get('/product-category',[ShopgridController::class,'category'])->name('product-category');
Route::get('/product-detail',[ShopgridController::class,'product'])->name('product-detail');
Route::get('/card/show',[CartController::class,'index'])->name('card.show');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::get('/customer/login',[CustomerAuthController::class,'login'])->name('customer.login');
Route::get('/customer/register',[CustomerAuthController::class,'register'])->name('customer.register');
