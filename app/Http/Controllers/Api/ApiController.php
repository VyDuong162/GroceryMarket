<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanHuyen;
use App\Models\PhuongXa;
use Illuminate\Support\Facades\DB;
class ApiController extends Controller
{
   public function getThongTinKhachHang(){
       $result = DB::select('SELECT * FROM khachhang where khachhang.vt_ma =2 orderBy khachhang.kh_hoTen');
        return response()->json(array(
            'code'=> 200,
            'result' => $result,
        ));
    }
    public function getSanPhamCuaHang($id){
        dd($id);
        $result = DB::select('SELECT b.*,a.*
        FROM dongia_mathang a 
        JOIN sanpham b  ON  a.sp_ma = b.sp_ma
        JOIN cuahangtaphoa c ON a.chth_ma = c.chth_ma 
        WHERE
            c.chth_ma={$id}
        ORDER BY b.created_at');
        return response()->json(array(
            'code'=>200,
            'result'=>$result,
        ));
        
    }
}
