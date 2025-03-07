<?php

use Illuminate\Support\Facades\Route;
use   App\Http\Controllers\HomeController;  // 要加這個
use   App\Http\Controllers\MemberController;  // 要加這個
use   App\Http\Controllers\AdminController;  // 要加這個
use   App\Http\Controllers\ProductController;  // 要加這個

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

Route::get('/', function () {
    return view('welcome');
});

// 導向 HomeController 的 Index 函數(Action)
Route::get('Home/Index', [HomeController::class, 'Index']);
Route::get('Home/Login', [HomeController::class, 'Login']);
Route::get('Home/DBtest', [HomeController::class, 'DBtest']);
Route::post('Home/CheckLogin', [HomeController::class, 'CheckLogin']);
Route::post('Home/MemberAddDB', [HomeController::class, 'MemberAddDB']);
Route::get('Member/Index', [MemberController::class, 'Index']);
Route::get('Member/MemProductMgt', [MemberController::class, 'MemProductMgt']);
Route::get('Member/MemProductUpdate/{sno}', [MemberController::class, 'MemProductUpdate']);
Route::get('Member/MemProductDelete/{p_sno}', [MemberController::class, 'MemProductDelete']);
Route::post('Member/MemProductUpdateDB', [MemberController::class, 'MemProductUpdateDB']);
Route::get('Member/MemProductAdd/', [MemberController::class, 'MemProductAdd']);
Route::get('Member/MemProductList/{c_sno}', [MemberController::class, 'MemProductList']);
Route::get('Member/MemProductDetail/{p_sno}', [MemberController::class, 'MemProductDetail']);
Route::get('Product/ProductAddCar/{sno}/{acc}/{price}', [ProductController::class, 'ProductAddCar']);
Route::get('Product/ProductMyCar', [ProductController::class, 'ProductMyCar']);
Route::post('Product/ProductCarToOrder', [ProductController::class, 'ProductCarToOrder']);
Route::get('Product/ProductEval/{sno}/{acc}/{yval}', [ProductController::class, 'ProductEval']);
Route::delete('Product/ProductDeleteCar/{od_sno}', [ProductController::class, 'ProductDeleteCar']);
Route::post('Member/MemProductAddDB/', [MemberController::class, 'MemProductAddDB']);
Route::get('Member/MemInfo', [MemberController::class, 'MemInfo']);
Route::post('Member/MemInfoUpdate', [MemberController::class, 'MemInfoUpdate']);
Route::get('Admin/Index', [AdminController::class, 'Index']);
Route::get('Admin/AdmMemberDelete/{uid}', [AdminController::class, 'AdmMemberDelete']);
Route::get('Admin/AdmMemberMgt', [AdminController::class, 'AdmMemberMgt']);
Route::get('Admin/AdmOrderMgt', [AdminController::class, 'AdmOrderMgt']);
Route::get('Admin/AdmOrderExport', [AdminController::class, 'AdmOrderExport']);
Route::get('Admin/AdmMemberImport', [AdminController::class, 'AdmMemberImport']);
Route::post('Admin/AdmMemberExcelImport', [AdminController::class, 'AdmMemberExcelImport']);
Route::get('Admin/AdmOrderDetail/{omsno}', [AdminController::class, 'AdmOrderDetail']);
Route::get('Home/Logout', [HomeController::class, 'Logout']);
Route::get('Home/MemberRegister', [HomeController::class, 'MemberRegister']);
Route::get('Home/API_checkAccount/{uid}',  [HomeController::class, 'API_checkAccount']);

