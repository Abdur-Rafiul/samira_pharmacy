<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\SiteinfoController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\CategoryDetailsController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavListController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::delete('logout', [AuthController::class, 'logout']);

});


Route::get('/GetVisitorDetails',[VisitorController::class, 'GetVisitorDetails']);
Route::post('/SendContactDetails',[ContactController::class, 'SendContactDetails']);
Route::get('/SendSiteInfo',[SiteinfoController::class, 'SendSiteInfo']);

Route::get('/SendCategoryDetails',[CategoryDetailsController::class, 'SendCategoryDetails']);
Route::get('/ProductListByRemark/{remark}',[ProductListController::class, 'ProductListByRemark']);
Route::get('/ProductListBySubCategory/{Category}/{SubCategory}',[ProductListController::class, 'ProductListBySubCategory']);
Route::get('/ProductListByRemark/{remark}',[ProductListController::class, 'ProductListByRemark']);
Route::get('/ProductListByCategory/{Category}',[ProductListController::class, 'ProductListByCategory']);
Route::get('/SendSliderInfo',[SliderController::class, 'SendSliderInfo']);
Route::get('/ProductDetails/{code}',[ProductDetailsController::class, 'ProductDetails']);
Route::get('/NotificationHistory',[NotificationController::class, 'NotificationHistory']);

Route::get('/ProductBySearch/{key}',[ProductListController::class, 'ProductBySearch']);
Route::get('/SimilarProduct/{subcategory}',[ProductListController::class, 'SimilarProduct']);
Route::post('/postReview',[ReviewController::class, 'postReview']);
Route::get('/reviewList/{code}',[ReviewController::class, 'reviewList']);


Route::post('/addToCart',[ProductOrderController::class, 'AddToCart']);
Route::get('/CartCount/{email}',[ProductOrderController::class, 'CartCount']);
Route::get('/CartList/{email}',[ProductOrderController::class, 'CartList']);
Route::get('/RemoveCartList/{id}',[ProductOrderController::class, 'RemoveCartList']);

Route::get('/CartItemPlus/{id}/{quantity}/{price}',[ProductOrderController::class, 'CartItemPlus']);
Route::get('/CartItemMinus/{id}/{quantity}/{price}',[ProductOrderController::class, 'CartItemMinus']);
Route::post('/CartOrder',[ProductOrderController::class, 'CartOrder']);
Route::get('/OrderListByUser/{email}',[ProductOrderController::class, 'OrderListByUser']);


Route::get('/addFav/{code}/{email}',[FavListController::class, 'addFav']);
Route::get('/favList/{email}',[FavListController::class, 'favList']);
Route::get('/removeFavItem/{code}/{email}',[FavListController::class, 'removeFavItem']);

