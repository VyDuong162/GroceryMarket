<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CuaHangTapHoa;
use App\Models\ChiTiet_DonHang;
use App\Models\DonHang;
use Illuminate\Support\Facades\DB;
class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function orderdetailrating(Request $request){

        $dh =DonHang::leftjoin('khachhang','donhang.kh_ma','=','khachhang.kh_ma')
                        ->where('donhang.dh_ma','=',$request->dh_ma)->first();
                     
        $chth = $dh->chth_ma;
        $ds_sp_da_danhgia = collect([]);
       
        $cuahang = CuaHangTapHoa::where('chth_ma', $chth)->first();
        $ctdh_danhgia = ChiTiet_DonHang::leftjoin('sanpham','chitiet_donhang.sp_ma','=','sanpham.sp_ma')
                                ->leftjoin('danhgia','chitiet_donhang.dh_ma','=','danhgia.dh_ma')
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
        if(count($ctdh)==0){
            $dh_capnhat =DonHang::where('dh_ma', $dh->dh_ma)->first();
            $dh_capnhat->dh_trangThai = 6;
            $dh_capnhat->save();
        }
        return view("frontend.pages.rating")
        ->with('dh',$dh)
        ->with('cuahang',$cuahang)
        ->with('ctdh',$ctdh);
    }
    public function luuDanhGia(Request $request)
    {
      DB::table('danhgia')->insert( 
          ['sp_ma' => $request->sp_ma, 'chth_ma' => $request->sp_ma, 'dh_ma' => $request->dh_ma, 
          'dg_soDiem'=> $request->rate,'dg_noiDung'=> $request->dg_noidung, 'dg_trangThai'=>1,'dg_thoiGian'=> Carbon::now()]);
        return "thành công thêm đánh giá";    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
