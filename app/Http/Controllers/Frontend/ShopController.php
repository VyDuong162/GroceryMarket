<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CuaHangTapHoa;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\TinhTp;
use App\Models\YeuThich;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dsCuaHang = $this->searchShop($request);
        if(Auth::check()){
            $kh_ma = Auth::user()->kh_ma;
            $dsYeuThich = YeuThich::where('kh_ma','=',$kh_ma)->get('sp_ma');
            $soluong = $dsYeuThich->count('sp_ma');
        }else{
            $soluong = 0;
        }
       return view('frontend.pages.shop')
        ->with('dsCuaHang',$dsCuaHang)
        ->with('soluong',$soluong);
    }
    private function searchShop(Request $request){
        $query =CuaHangTapHoa::all();
        $ttp_ma = $request->get('ttp_ma');
        if($ttp_ma!=null){
            $query = CuaHangTapHoa::leftjoin('phuongxa','cuahangtaphoa.px_ma','=','phuongxa.px_ma')
                                        ->leftjoin('quanhuyen','phuongxa.qh_ma','=','quanhuyen.qh_ma')
                                        ->leftjoin('tinhtp','quanhuyen.ttp_ma','=','tinhtp.ttp_ma')
                                        ->where('cuahangtaphoa.chth_trangThai','<',3)
                                        ->where('tinhtp.ttp_ma','=', $ttp_ma)->get();
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
