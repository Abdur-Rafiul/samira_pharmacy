<?php

use App\Http\Controllers\Frontend\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class,'Home']);
Route::get('/getmedicineDetails/{mname}/{cname}',[CategoryController::class,'getMedicineDetails']);
Route::post('/MedicineDetails',[CategoryController::class,'MedicineDetails']);
