<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;
use App\Models\YeuThich;
use App\Models\CuaHangTapHoa;
use App\Models\HinhAnhSanPham;
use App\Models\NhaSanXuat;
use App\Models\LoaiSanPham;
use App\Models\TinhTp;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
            $demsp = SanPham::where('sanpham.sp_trangThai','=',1)->get()->count();
            $dsSanPham = $this->searchSanPham($request);
            $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
            if(Auth::check()){
                $kh_ma = Auth::user()->kh_ma;
                $dsYeuThich = YeuThich::where('kh_ma','=',$kh_ma)->get('sp_ma');
                $arr = collect([]);
                $arr1chieu =[];
                foreach($dsYeuThich  as $index => $yt){
                    $arr->push($yt->sp_ma);
                    $arr1chieu[$index]=$yt->sp_ma;
                }
                $soluong = $dsYeuThich->count('sp_ma');
            }else{
                $dsYeuThich = '';
                $soluong = 0;
                $arr1chieu =[];
            }
            return view('frontend.pages.product')
                ->with('dsSanPham',$dsSanPham)
                ->with('dsYeuThich',$dsYeuThich)
                ->with('arr1chieu',$arr1chieu)
                ->with('dsTinhTp',$dsTinhTp)
                ->with('soluong',$soluong);
    }
    public function timkiem(Request $request){
        $demsp = SanPham::where('sanpham.sp_trangThai','=',1)->get()->count();
        $dsSanPham = $this->searchSanPham($request);
        $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
        if(Auth::check()){
            $kh_ma = Auth::user()->kh_ma;
            $dsYeuThich = YeuThich::where('kh_ma','=',$kh_ma)->get('sp_ma');
            $arr = collect([]);
            $arr1chieu =[];
            foreach($dsYeuThich  as $index => $yt){
                $arr->push($yt->sp_ma);
                $arr1chieu[$index]=$yt->sp_ma;
            }
            $soluong = $dsYeuThich->count('sp_ma');
        }else{
            $dsYeuThich = '';
            $soluong = 0;
            $arr1chieu =[];
        }
        if($request->timkiem!=null){
            $timkiem = $request->timkiem;
        }else{
            $timkiem ='';
        }
        return view('frontend.pages.search')
            ->with('dsSanPham',$dsSanPham)
            ->with('dsYeuThich',$dsYeuThich)
            ->with('arr1chieu',$arr1chieu)
            ->with('dsTinhTp',$dsTinhTp)
            ->with('soluong',$soluong)
            ->with('timkiem',$timkiem);
    }
    public function productlist(Request $request){
     
    }
    private function searchSanPham(Request $request){
        $query = SanPham::leftjoin('loaisanpham','sanpham.lsp_ma','=','loaisanpham.lsp_ma')
        ->leftjoin('nhasanxuat','sanpham.nsx_ma','=','nhasanxuat.nsx_ma')
        ->leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
        ->where('sanpham.sp_trangThai','=',1)->get();
        $searchByLoai = $request->lsp_ma;
        if($searchByLoai !=null){
            $query = SanPham::leftjoin('loaisanpham','sanpham.lsp_ma','=','loaisanpham.lsp_ma')
            ->leftjoin('nhasanxuat','sanpham.nsx_ma','=','nhasanxuat.nsx_ma')
            ->leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
            ->where('loaisanpham.lsp_ma','=',$searchByLoai)
            ->where('sanpham.sp_trangThai','=',1)->get();
        }
        $query1=$request->get('timkiem');
        if($query1!=null){
            $query = SanPham::leftjoin('loaisanpham', 'sanpham.lsp_ma', '=', 'loaisanpham.lsp_ma')
            ->leftjoin('nhasanxuat', 'sanpham.nsx_ma', '=', 'nhasanxuat.nsx_ma')
            ->where('sp_trangThai','=',1)
            ->where(
                function($query) use ($query1){
                    return $query->where('sp_ten','like','%'.$query1.'%')
                        ->orWhere('nsx_ten','like','%'.$query1.'%')
                        ->orWhere('lsp_ten','like','%'.$query1.'%')
                        ;
                }
            )
            ->orderBy('sp_ma', 'asc')->get();
        }
        $locgia = $request->get('locGia');
        if($locgia!=0){
            if($locgia==1){
                $query = SanPham::leftjoin('loaisanpham','sanpham.lsp_ma','=','loaisanpham.lsp_ma')
                ->leftjoin('nhasanxuat','sanpham.nsx_ma','=','nhasanxuat.nsx_ma')
                ->leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
                ->where('sanpham.sp_trangThai','=',1)->orderBy('dongia_mathang.dgmh_gia','asc')->get();
            }
            if($locgia==2){
                 
                $query = SanPham::leftjoin('loaisanpham','sanpham.lsp_ma','=','loaisanpham.lsp_ma')
                ->leftjoin('nhasanxuat','sanpham.nsx_ma','=','nhasanxuat.nsx_ma')
                ->leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
                ->where('sanpham.sp_trangThai','=',1)->orderBy('dongia_mathang.dgmh_gia','desc')->get();
            }
            if($locgia==3){
                 
                $query = SanPham::leftjoin('loaisanpham','sanpham.lsp_ma','=','loaisanpham.lsp_ma')
                ->leftjoin('nhasanxuat','sanpham.nsx_ma','=','nhasanxuat.nsx_ma')
                ->leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
                ->where('sanpham.sp_trangThai','=',1)->orderBy('sanpham.sp_ten','asc')->get();
            }
        }
        $data = $query;
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sp = SanPham::find($id);
        if(Auth::check()){
            $kh_ma = Auth::user()->kh_ma;
            $dsYeuThich = YeuThich::where('kh_ma','=',$kh_ma)->get('sp_ma');
            $soluong = $dsYeuThich->count('sp_ma');
        }else{
            $soluong = 0;
        }
        $lsp =$sp->lsp_ma;
        $dsSanPhamLienQuan =SanPham::where('lsp_ma',$lsp)->take(3)->get();
        $dsHinhAnhLienQuan =HinhAnhSanPham::where('sp_ma',$id)->get();
        $shop = $sp->dongiamathang()->first();
        $gia=$sp->dongiamathang()->first();
        $dsCuaHang = CuaHangTapHoa::Where('chth_trangThai','<','3')->get();
        $dsNhaSanXuat = NhaSanXuat::all();
        $dsLoaiSanPham = LoaiSanPham::all();
        return view('frontend.pages.product-detail')
        ->with('dsSanPhamLienQuan',$dsSanPhamLienQuan)
        ->with('sp',$sp)
        ->with('dsHinhAnhLienQuan',$dsHinhAnhLienQuan )
        ->with('dsNhaSanXuat',$dsNhaSanXuat)
        ->with('shop',$shop)
        ->with('gia',$gia)
        ->with('dsLoaiSanPham',$dsLoaiSanPham)
        ->with('dsCuaHang', $dsCuaHang)
        ->with('soluong',$soluong);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
