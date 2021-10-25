<?php

use App\Http\Controllers\Backend\SanPhamController;
use App\Http\Controllers\Backend\KhachHangController;
use App\Http\Controllers\Backend\CuaHangTapHoaController;
use App\Http\Controllers\Backend\DonHangController;
use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/test',function(){
    $date = new DateTime();
        $today = $date->format('YmdHis');
    return $today;
});
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function(){
    return view('frontend.index');
});
Route::get('/frontend', function(){
    return view('frontend.index');
});
Route::get('/index1', function(){
    return view('frontend.index1');
});
//dashboards
Route::get('/admin',[AdminController::class,'dashboards'])->name('admin');
// sản phẩm
Route::resource('admin/sanpham',SanPhamController::class,['as'=>'admin']);
Route::delete('/sanpham/bulkaction',[SanPhamController::class,'BulkAction']);
Route::get('/backend/sanpham/search',[SanPhamController::class,'Search']);
// khách hàng
Route::resource('admin/khachhang',KhachHangController::class,['as'=>'admin']);
Route::delete('/khachhang/bulkaction',[KhachHangController::class,'BulkAction'])->name('khachhang.bulkaction');
// lấy thông tin địa chỉ
Route::get('khachhang/getquanhuyen', [KhachHangController::class,'getQuanHuyen'])->name('khachhang.getquanhuyen');
// cửa hàng tập hóa
Route::resource('admin/cuahangtaphoa',CuaHangTapHoaController::class,['as'=>'admin'])->middleware('auth');
Route::delete('/cuahangtaphoa/bulkaction',[CuaHangTapHoaController::class,'BulkAction'])->name('cuahangtaphoa.bulkaction')->middleware('auth');
Route::get('/sanpham/cuahangtaphoa/{id}',[CuaHangTapHoaController::class,'SanPhamCuaHang'])->name('sanpham.cuahangtaphoa')->middleware('auth');
Route::post('/sanpham/gia',[CuaHangTapHoaController::class,'UpdatePrice'])->name('sanpham.gia')->middleware('auth');
Route::get('/backend/sanpham/cuahangtaphoa/search',[CuaHangTapHoaController::class,'Search'])->middleware('auth');
// đơn hàng
Route::resource('admin/donhang',DonHangController::class,['as'=>'admin']);
Route::get('/donhang/inhoadon/{id}',[DonHangController::class,'pdf'])->name('donhang.inhoadon');
Route::delete('/donhang/bulkaction',[DonHangController::class,'BulkAction'])->name('donhang.bulkaction');
Route::get('/backend/donhang/search',[DonHangController::class,'Search']);
