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
        $dsSanPhamHomNay = SanPham::leftjoin('loaisanpham','sanpham.lsp_ma','=','loaisanpham.lsp_ma')
                            ->leftjoin('nhasanxuat','sanpham.nsx_ma','=','nhasanxuat.nsx_ma')
                            ->leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
                            ->where('sanpham.sp_trangThai','=',1)
                            ->where('dongia_mathang.dgmh_gia','<=',10000)
                            ->take(9)->get();
        $dsSanPhamMoi = SanPham::leftjoin('loaisanpham','sanpham.lsp_ma','=','loaisanpham.lsp_ma')
                        ->leftjoin('nhasanxuat','sanpham.nsx_ma','=','nhasanxuat.nsx_ma')
                        ->leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
                        ->where('sanpham.sp_trangThai','=',1)
                        ->orderBy('sanpham.sp_ma','desc')
                        ->take(9)->get();
        return view('frontend.index')
            ->with('dsLoaiSanPham',$dsLoaiSanPham)
            ->with('dsSanPhamMoi',$dsSanPhamMoi)
            ->with('dsSanPhamHomNay',$dsSanPhamHomNay)
            ->with('dsSanPhamNoiBat',$dsSanPhamNoiBat);
    }
    private function searchSanPham(Request $request){
         $query = SanPham::all();
         $searchByLoai = $request->query('searchByLoai');
         if($searchByLoai !=null){

         }
         $data = $query;
         return $data;
    }
}
