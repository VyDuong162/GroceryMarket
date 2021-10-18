<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ChiTiet_DonHang;
use App\Models\CuaHangTapHoa;
use App\Models\DonHang;
use Carbon\Carbon;
use App\Models\HoaDon;
use PDF;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsDonHang = DonHang::all();
        return view('backend.donhang.index')
        ->with('dsDonHang',$dsDonHang);
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
        $dh =DonHang::find($id);
        $chth = $dh->chth_ma;
        $cuahang = CuaHangTapHoa::where('chth_ma', $chth)->first();
        $ctdh = ChiTiet_DonHang::where('dh_ma',$id)->get();
        return view('backend.donhang.show')
        ->with('dh',$dh)
        ->with('cuahang',$cuahang)
        ->with('ctdh',$ctdh);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dh =DonHang::find($id);
        $chth = $dh->chth_ma;
        $cuahang = CuaHangTapHoa::where('chth_ma', $chth)->first();
        $ctdh = ChiTiet_DonHang::where('dh_ma',$id)->get();
        return view('backend.donhang.edit')
        ->with('dh',$dh)
        ->with('cuahang',$cuahang)
        ->with('ctdh',$ctdh);
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
        $dh = DonHang::where('dh_ma',$id)->first();
        if($dh->dh_ma < 10) {
            $dh_ma = '000' . $dh->dh_ma ;
        }
       
        elseif($dh->dh_ma > 10 && $dh->dh_ma < 100) {
            $dh_ma = '00' . $dh->dh_ma;
        } 
        if($request->dh_trangThai!=null){
            $dh->dh_trangThai = $request->dh_trangThai;
            $dh->dh_capNhat =Carbon::now();
            $dh->save();
            return redirect(route('admin.donhang.index'))->with('alert-info','Đơn hàng DH'. $dh_ma . ' cập nhật trạng thái thành công!');
        }
        return redirect(route('admin.donhang.index'))->with('alert-info','Đơn hàng DH'. $dh_ma . ' chưa cập nhật trạng thái!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dh = DonHang::find($id);
        $dh->delete();
    }
    public function BulkAction(Request $request)
    {
       $action=$request->action;
       $datetime = Carbon::now();
       $ids = $request->get('ids'); 
       if($action >= 0){
            if($action==0){
                $setupdate = DonHang::whereIn('dh_ma',$ids)->update(['dh_trangThai' => '0','dh_capNhat' => $datetime ]);
            }
           elseif($action == 1){
               $setupdate = DonHang::whereIn('dh_ma',$ids)->update(['dh_trangThai' => '1','dh_capNhat' => $datetime ]);
           }elseif($action == 2){
               $setupdate = DonHang::whereIn('dh_ma',$ids)->update(['dh_trangThai' => '2','dh_capNhat' => $datetime]);
           }elseif($action == 3){
               $setupdate = DonHang::whereIn('dh_ma',$ids)->update(['dh_trangThai' => '3','dh_capNhat' => $datetime]);
           }elseif($action == 4){
            $setupdate = DonHang::whereIn('dh_ma',$ids)->update(['dh_trangThai' => '5','dh_capNhat' => $datetime]);
            }    
        return redirect(route('admin.sanpham.index'));   
       }
       //return redirect(route('admin.sanpham.index'))->with('alert-info','Xóa thành công sản phẩm với ID_SP:'.$ids);

    }
    public function pdf($id){
        $dh =DonHang::find($id);
        $hd =HoaDon::where('dh_ma',$id)->first();
      
        $chth = $dh->chth_ma;
        $cuahang = CuaHangTapHoa::where('chth_ma', $chth)->first();
        $ctdh = ChiTiet_DonHang::where('dh_ma',$id)->get();
        $data =[
            'dh' =>$dh,
            'hd' =>$hd,
            'cuahang'=>$cuahang,
            'ctdh'=>$ctdh
        ];
        return view('backend.donhang.inhoadon')
        ->with('dh',$dh)
        ->with('hd',$hd)
        ->with('cuahang',$cuahang)
        ->with('ctdh',$ctdh);
        $pdf = PDF::loadView('backend.hoadon.pdf',$data);
        return $pdf->download('HoaDon'.$id.'.pdf');
    }
}
