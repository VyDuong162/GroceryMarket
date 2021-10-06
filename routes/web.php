<?php

use App\Http\Controllers\Backend\SanPhamController;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function(){
    return view('backend.dashboards');
});
Route::get('/frontend', function(){
    return view('frontend.index');
});
Route::get('/index1', function(){
    return view('frontend.index1');
});
Route::resource('admin/sanpham',SanPhamController::class,['as'=>'admin']);