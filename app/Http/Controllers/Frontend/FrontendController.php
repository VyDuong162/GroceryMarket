<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\CuaHangTapHoa;
use App\Models\ChiTiet_DonHang;
use App\Models\DiaChi;
use App\Models\DonGia_MatHang;
use App\Models\TinhTp;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
        return view('frontend.index')
            ->with('dsLoaiSanPham',$dsLoaiSanPham)
            ->with('dsSanPhamMoi',$dsSanPhamMoi)
            ->with('dsSanPhamHomNay',$dsSanPhamHomNay)
            ->with('dsSanPhamNoiBat',$dsSanPhamNoiBat)
            ->with('dsYeuThich',$dsYeuThich)
            ->with('dsTinhTp',$dsTinhTp)
            ->with('arr1chieu', $arr1chieu)
            ->with('soluong',$soluong);
    }
    private function searchSanPham(Request $request){
         $query = SanPham::all();
         $searchByLoai = $request->query('searchByLoai');
         if($searchByLoai !=null){

         }
         $data = $query;
         return $data;
    }
    public function location(){
        $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
        return view('frontend.layout.master')
        ->with('dsTinhTp',$dsTinhTp);
    }
    public function timkiemcuahang(Request $request){
        $cuahang = CuaHangTapHoa::leftjoin('phuongxa','cuahangtaphoa.px_ma','=','phuongxa.px_ma')
                                ->leftjoin('quanhuyen','phuongxa.qh_ma','=','quanhuyen.qh_ma')
                                ->leftjoin('tinhtp','quanhuyen.ttp_ma','=','tinhtp.ttp_ma')
                                ->where('tinhtp.ttp_ma','=',$request->ttp_ma)
                                ->get();
        return $cuahang;
    }
    public function timkiem(Request $request){
        if($request->ajax()){
            $query1= $request->get('query');
            if($query1 != ''){
                $output='';
                $dsSanPham = SanPham::leftjoin('loaisanpham', 'sanpham.lsp_ma', '=', 'loaisanpham.lsp_ma')
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
                
            }else{
            }
            $dem_sp = $dsSanPham->count();
            if($dem_sp > 0){
            }else{
                return "Không tìm thấy sản phẩm";
            }
        }
    }
    public function myorders(Request $request){
        if($request->dh_trangThai==null){
            return view('frontend.pages.my_orders');
        }else{
            if($request->dh_trangThai === 'all')
            {
                $kh_ma = Auth::user()->kh_ma;
                $dsDonHang = DonHang::where('kh_ma','=',$kh_ma)
                                    ->orderBy('dh_taoMoi')->get();
                 return $dsDonHang;
            }else{
                $kh_ma = Auth::user()->kh_ma;
                $dsDonHang = DonHang::where('kh_ma','=',$kh_ma)
                                    ->where('dh_trangThai','=',$request->dh_trangThai)
                                    ->orderBy('dh_taoMoi')->get();
            }
            if(Auth::check()){
                $dsYeuThich = YeuThich::where('kh_ma','=',$kh_ma)->get('sp_ma');
                $soluong = $dsYeuThich->count('sp_ma');
            }else{
                $soluong=0;
            }
           
           
            return $dsDonHang;
        }
      
    }
    public function mywishlist(Request $request){
        if(Auth::check()){
            $kh_ma = Auth::user()->kh_ma;
            $dsYeuThich = YeuThich::where('kh_ma','=',$kh_ma)->get('sp_ma');
            $soluong = $dsYeuThich->count('sp_ma');
           if($soluong > 0){
            $arr =collect([]);
            
            foreach($dsYeuThich  as $index => $yt){
                $arr->push($yt->sp_ma);
                
            }
            $dsSanPham = SanPham::leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
                                ->leftjoin('cuahangtaphoa','dongia_mathang.chth_ma','=','cuahangtaphoa.chth_ma')
                                ->where('sanpham.sp_ma','=',$arr)
                                ->get();
           }else{
            $dsSanPham ='';
           }
           
            
           
            return view('frontend.pages.my-wishlist')
            ->with('dsSanPham',$dsSanPham)
            ->with('soluong',$soluong);
        }
       
    }
    public function orderdetail(Request $request){
    
        $dh =DonHang::leftjoin('khachhang','donhang.kh_ma','=','khachhang.kh_ma')
                        ->where('donhang.dh_ma','=',$request->dh_ma)->first();
                     
        $chth = $dh->chth_ma;
        $cuahang = CuaHangTapHoa::where('chth_ma', $chth)->first();
        $ctdh = ChiTiet_DonHang::leftjoin('sanpham','chitiet_donhang.sp_ma','=','sanpham.sp_ma')
        ->where('chitiet_donhang.dh_ma','=',$request->dh_ma)->get();
        return response()->json(
                ['dh'=>$dh,
                'cuahang'=>$cuahang,
                'ctdh'=>$ctdh
                ]
            
           
        );
        
      
    }
    public function orderdetailrating(Request $request){
    
        $dh =DonHang::leftjoin('khachhang','donhang.kh_ma','=','khachhang.kh_ma')
                        ->where('donhang.dh_ma','=',$request->dh_ma)->first();
                     
        $chth = $dh->chth_ma;
        $ds_sp_da_danhgia = collect([]);
       
        $cuahang = CuaHangTapHoa::where('chth_ma', $chth)->first();
        $ctdh_danhgia = ChiTiet_DonHang::leftjoin('sanpham','chitiet_donhang.sp_ma','=','sanpham.sp_ma')
                                ->leftjoin('danhgia','chitiet_donhang.sp_ma','=','danhgia.sp_ma')
        ->where('chitiet_donhang.dh_ma','=',$request->dh_ma)
        ->where('chitiet_donhang.sp_ma','=','danhgia.sp_ma')->get('danhgia.sp_ma');
        foreach ($ctdh_danhgia as $index =>$ct){
            $ds_sp_da_danhgia->push($ct->sp_ma);
        }
        if(!empty($ds_sp_da_danhgia)){
            $ctdh = ChiTiet_DonHang::leftjoin('sanpham','chitiet_donhang.sp_ma','=','sanpham.sp_ma')
            ->where('chitiet_donhang.dh_ma','=',$request->dh_ma)
            ->whereNotIn('chitiet_donhang.sp_ma',$ds_sp_da_danhgia)
            ->get();
        }else{
            $ctdh = ChiTiet_DonHang::leftjoin('sanpham','chitiet_donhang.sp_ma','=','sanpham.sp_ma')
            ->where('chitiet_donhang.dh_ma','=',$request->dh_ma)
            ->get();
        }
       
        return response()->json(
                ['dh'=>$dh,
                'cuahang'=>$cuahang,
                'ctdh'=>$ctdh
                ]
            
           
        );
        
      
    }
    public function orderdestroy(Request $request){
        $datetime = Carbon::now();
        $dh = DonHang::where('donhang.dh_ma','=',$request->dh_ma)->update(['dh_trangThai' => '1','dh_capNhat' => $datetime]);
        return;
    }
    public function mywishlist_store(Request $request){
       
        $kh_ma =Auth::user()->kh_ma;
        if($request->status === 'true'){
            $sp_ma = $request->sp_ma;
            
            $chth = DonGia_MatHang::where('sp_ma','=',$sp_ma)->first();
           
            $yt = new YeuThich();
            $yt->sp_ma = $sp_ma;
            
            $yt->chth_ma = $chth->chth_ma;
            $yt->kh_ma = $kh_ma;
            DB::table('yeuthich')->insert([
                'sp_ma' => $yt->sp_ma,
                'chth_ma' =>$yt->chth_ma,
                'kh_ma' => $yt->kh_ma
            ]);
            return 'thêm thành công';
        }else if($request->status === 'false'){
            $yt = YeuThich::where('sp_ma','=',$request->sp_ma)
                        ->where('kh_ma','=',$kh_ma)->first();
            $yt->delete();
            return 'xóa thành công';
        }
        
    }
    public function mywishlist_check(Request $request){
        if($request->sp_ma!=null){
            $result = DB::table('yeuthich')
            ->where('kh_ma', '=',Auth::user()->kh_ma)
            ->where('sp_ma','=',$request->sp_ma)
            ->get();
        return response()->json(array(
            'code'=>200,
            'result'=>$result,
            ));
        }
    }
   

}
