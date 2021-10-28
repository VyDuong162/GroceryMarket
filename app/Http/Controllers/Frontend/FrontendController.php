<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  
    public function index(){
        $dsLoaiSanPham = LoaiSanPham::orderBy('lsp_ten')->get();
        $dsSanPhamNoiBat = SanPham::leftjoin('loaisanpham','sanpham.lsp_ma','=','loaisanpham.lsp_ma')
                                    ->leftjoin('nhasanxuat','sanpham.nsx_ma','=','nhasanxuat.nsx_ma')
                                    ->leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
                                    ->where('sanpham.sp_trangThai','=',1)
                                    ->take(9)->get();
        return view('frontend.index')
            ->with('dsLoaiSanPham',$dsLoaiSanPham)
            ->with('dsSanPhamNoiBat',$dsSanPhamNoiBat);
    }
}
