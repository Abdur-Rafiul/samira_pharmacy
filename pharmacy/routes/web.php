<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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



Route::get('/',[HomeController::class,'Home']);
Route::get('/category',[HomeController::class,'Category']);
Route::get('/count',[HomeController::class,'Count']);


Route::get('/categorymedicinedetails/{category_name}',[CategoryController::class,'CategoryMedicineDetails']);

Route::get('/getmedicineDetails/{mname}/{cname}',[CategoryController::class,'getMedicineDetails']);
Route::post('/MedicineDetails',[CategoryController::class,'MedicineDetails']);

Route::post('/add-to-cart',[CategoryController::class,'AddToCart']);
Route::post('/add-to-order',[CategoryController::class,'AddToOrder']);





//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/dashboard-profile',[HomeController::class,'DashBoardProfile'])->middleware(['auth', 'verified'])->name('dashboard-profile');;








Route::post('/payment',[paymentController::class,'index']);
Route::post('/success',[paymentController::class,'success'])->name('success');
Route::post('/fail',[paymentController::class,'fail'])->name('fail');










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
