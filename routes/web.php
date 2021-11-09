<?php

use App\Http\Controllers\Backend\SanPhamController;
use App\Http\Controllers\Backend\KhachHangController;
use App\Http\Controllers\Backend\CuaHangTapHoaController;
use App\Http\Controllers\Backend\DonHangController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\DiaChiController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ShopController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/frontend', function(){
    return view('frontend.index');
});
Route::get('/dangnhap', function(){
    return view('auth.login1');
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

// Frontend
Route::get('/index',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/shopping-cart',[ShoppingCartController::class,'index'])->name('frontend.shoppingcart');
Route::get('/checkout',[ShoppingCartController::class,'checkout'])->name('frontend.checkout');
Route::post('/order',[ShoppingCartController::class,'store'])->name('frontend.order');
Route::get('/order/detail',[FrontendController::class,'orderdetail'])->name('frontend.orderdetail');
Route::get('/order/destroy',[FrontendController::class,'orderdestroy'])->name('frontend.orderdestroy');
Route::get('/my-orders',[FrontendController::class,'myorders'])->name('frontend.myorders');
Route::get('/my-wishlist',[FrontendController::class,'mywishlist'])->name('frontend.mywishlist');
Route::post('/my-wishlist-store',[FrontendController::class,'mywishlist_store'])->name('frontend.mywishliststore');
Route::get('/my-mywishlist-check',[FrontendController::class,'mywishlist_check'])->name('frontend.mywishlistcheck');
Route::get('/my-address',[DiaChiController::class,'index'])->name('frontend.myaddress');
Route::post('/my-address/store',[DiaChiController::class,'store'])->name('frontend.myaddress.store');
Route::get('/my-address/edit/{id}',[DiaChiController::class,'edit'])->name('frontend.myaddress.edit');
Route::post('/my-address/update/{id}',[DiaChiController::class,'update'])->name('frontend.myaddress.update');
Route::get('/my-address/delete/{id}',[DiaChiController::class,'destroy'])->name('frontend.myaddress.delete');
//san pham
Route::get('/product',[ProductController::class,'index'])->name('frontend.product');
Route::get('/search/product',[ProductController::class,'timkiem'])->name('frontend.product.search');
Route::get('/productlist',[ProductController::class,'productlist'])->name('frontend.productlist');
Route::get('/product/{id}',[ProductController::class,'show'])->name('frontend.productdetail');
// cua hang
Route::get('/shop',[ShopController::class,'index'])->name('frontend.shop');
Route::get('/shop/{id}',[ShopController::class,'show'])->name('frontend.shopdetail');
// tim kiem
Route::get('/timkiem/cuahang',[FrontendController::class,'timkiemcuahang'])->name('frontend.timkiemcuahang');
Route::get('/timkiem',[FrontendController::class,'timkiem'])->name('frontend.timkiem');