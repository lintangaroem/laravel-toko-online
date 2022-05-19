<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\customerController;
use App\http\Controllers\UserController;
use App\http\Controllers\barangController;
use App\http\Controllers\transaksiController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[UserController::class,'login']);
Route::post('/register', [UserController::class,'register']);
Route::post('/logincustomer', [UserController::class,'login']);

Route::group(['middleware'=>['jwt.verify:admin']], function(){
    Route::get('/profile_admin',[userController::class,'profile_admin']);
});
Route::group(['middleware'=>['jwt.verify:petugas']], function(){
    Route::post('/createcustomer',[customerController::class,'createcustomer']);
    Route::put('/update_customer/{id}',[customerController::class,'update']);
    Route::delete('delete_customer/{id}',[customerController::class,'destroy']);
    Route::get('detailcustomer/{id}',[customerController::class,'getdetail']);
    Route::get('/profile_petugas',[userController::class,'profile_admin']);
    Route::get('/getcustomer',[customerController::class,'getCustomer']);

    Route::get('/getbarang',[barangController::class,'getbarang']);
    Route::post('/storecarttodb',[transaksiController::class,'store']);

});
