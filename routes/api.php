<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SanPhamController;
use App\Http\Controllers\Backend\KhachHangController;
use Facade\FlareClient\Api;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/khachhang/thongtin',[ApiController::class,'getThongTinKhachHang'])->name('api.khachhang.thongtin');
// don hang
Route::get('/thongke/donhang/chothanhtoan',[ApiController::class,'thongKeDonHangChoThanhToan'])->name('api.thongke.donhang.chothanhtoan');
Route::get('/thongke/donhang/dahuy',[ApiController::class,'thongKeDonHangDaHuy'])->name('api.thongke.donhang.dahuy');
Route::get('/thongke/donhang/dangxuly',[ApiController::class,'thongKeDonHangDangXuLy'])->name('api.thongke.donhang.dangxuly');
Route::get('/thongke/donhang/dagiao',[ApiController::class,'thongKeDonHangDaGiao'])->name('api.thongke.donhang.dagiao');
// san pham
Route::get('/thongke/tongsanpham',[ApiController::class,'thongKeTongSanPham'])->name('api.thongke.tongsanpham');
// cua hang tap hoa
Route::get('/thongke/tongcuahang',[ApiController::class,'thongKeTongCuaHang'])->name('api.thongke.tongcuahang');
Route::get('/thongke/doanhthuhomnay',[ApiController::class,'thongKeTongDoanhThuHomNay'])->name('api.thongke.doanhthuhomnay');
// bao cao don hang
Route::get('/baocao/donhang',[ApiController::class,'baoCaoDonHang'])->name('api.baocao.donhang');
Route::get('/donhang/ganday',[ApiController::class,'baoCaoDonHangGanDay'])->name('api.donhang.ganday');

//frontend
Route::get('/thongke/top_sanpham_noibat',[ApiController::class,'thongke_top_sanphamnoibat'])->name('api.thongke.topsanphamnoibat');
Route::get('/loaisanpham',[ApiController::class,'getloaisanpham'])->name('api.loaisanpham');
Route::get('/tinh-tp',[ApiController::class,'gettinhtp'])->name('api.tinhtp');
Route::get('/quan-huyen',[ApiController::class,'getquanhuyen'])->name('api.quanhuyen');
Route::get('/phuong-xa',[ApiController::class,'getphuongxa'])->name('api.phuongxa');
Route::get('/thongtinkhachhang',[ApiController::class,'thongtinkhachhang'])->name('api.thongtinkhachhang');
