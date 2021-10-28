<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanHuyen;
use App\Models\PhuongXa;
use App\Models\DonHang;
use App\Models\LoaiSanPham;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
      //  dd($id);
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
    public function baoCaoDonHangGanDay(request $request)
    {
        if($request->vt_ma==2){
            $paremeter =[
                'kh_ma' => $request->kh_ma,
                
            ];
            $sql =<<<EOT
            SELECT *
            FROM donhang dh
            Join cuahangtaphoa chth on dh.chth_ma =chth.chth_ma
            WHERE 
                chth.kh_ma =:kh_ma
            AND
            dh.dh_taoMoi  BETWEEN DATE_SUB(now(),INTERVAL 2 DAY) AND NOW();
EOT;        
            $result = DB::select($sql,$paremeter);
        }else{
            $result = DB::select('SELECT *
            FROM donhang 
            WHERE 
            dh_taoMoi  BETWEEN DATE_SUB(now(),INTERVAL 2 DAY) AND NOW();');
        }
     
        return response()->json(array(
            'code'=> 200,
            'result' => $result,
        ));
    }
    public function thongKeTongSanPham(Request $request){
        
        if($request->vt_ma==2){
            $paremeter =[
                'kh_ma' => $request->kh_ma,
                
            ];
            $sql =<<<EOT
            SELECT COUNT(*) AS soLuong
                    FROM sanpham sp
                    Join dongia_mathang  dgmh on sp.sp_ma =dgmh.sp_ma 
                    Join cuahangtaphoa chth on chth.chth_ma = dgmh.chth_ma
                    WHERE
                    chth.kh_ma = :kh_ma AND
                    sp.sp_trangThai = 1
EOT;        
            $result = DB::select($sql,$paremeter);
        }else{
            $result = DB::select('SELECT COUNT(*) AS soLuong
            FROM sanpham sp
            WHERE
                sp.sp_trangThai = 1');
        }
       
        return response()->json(array(
            'code' => 200,
            'result' =>$result,
        ));
    }
    public function thongKeTongCuaHang(Request $request){
        if($request->vt_ma==2){
            $paremeter =[
                'kh_ma' => $request->kh_ma,
                
            ];
            $sql =<<<EOT
            SELECT COUNT(*) AS soLuong
            FROM cuahangtaphoa ch
            WHERE
                ch.chth_trangThai = 1 AND
                ch.kh_ma=:kh_ma
EOT;        
            $result = DB::select($sql,$paremeter);
        }else{
        $result = DB::select('SELECT COUNT(*) AS soLuong
                                FROM cuahangtaphoa ch
                                WHERE
                                    ch.chth_trangThai = 1');
        }
        return response()->json(array(
            'code' => 200,
            'result' =>$result,
        ));
    }
    public function thongKeTongDoanhThuHomNay(Request $request){
        if($request->vt_ma==2){
            $paremeter =[
                'kh_ma' => $request->kh_ma,
                
            ];
            $sql =<<<EOT
            SELECT SUM(hd.hd_giaTri) as tong
                    FROM hoadon hd
                    JOIN donhang dh ON dh.dh_ma = hd.dh_ma
                    JOIN cuahangtaphoa chth ON chth.chth_ma = dh.chth_ma
                    WHERE
                    chth.kh_ma =:kh_ma AND
                    DATE(hd.hd_ngayLap) = CURDATE()
EOT;        
            $result = DB::select($sql,$paremeter);
        }else{
            $result = DB::select('SELECT SUM(hd.hd_giaTri) as tong
            FROM hoadon hd
            WHERE
            DATE(hd.hd_ngayLap) = CURDATE();');
        }
        return response()->json(array(
            'code' => 200,
            'result' =>$result,
        ));
    }
    public function thongKeDonHangChoThanhToan(Request $request){
        if($request->vt_ma==2){
            $paremeter=[
                'kh_ma' => $request->kh_ma,
            ];
            $sql =<<<EOT
            SELECT COUNT(*) AS soLuong
            FROM donhang dh
            JOIN cuahangtaphoa chth on dh.chth_ma = chth.chth_ma
            WHERE
                dh.dh_trangThai = 0
                AND
                chth.kh_ma =:kh_ma
EOT;
            $result=DB::select($sql,$paremeter);
        }else{
        $result = DB::select('SELECT COUNT(*) AS soLuong
                            FROM donhang dh
                            WHERE
                                dh.dh_trangThai = 0');
        }
        
        return response()->json(array(
            'code' => 200,
            'result' =>$result,
        ));
    }
    public function thongKeDonHangDaHuy(Request $request){
        if($request->vt_ma==2){
            $paremeter=[
                'kh_ma' => $request->kh_ma,
            ];
            $sql =<<<EOT
            SELECT COUNT(*) AS soLuong
            FROM donhang dh
            JOIN cuahangtaphoa chth on dh.chth_ma = chth.chth_ma
            WHERE
                dh.dh_trangThai = 1
                AND
                chth.kh_ma =:kh_ma
EOT;
            $result=DB::select($sql,$paremeter);
        }else{
        $result = DB::select('SELECT COUNT(*) AS soLuong
                            FROM donhang dh
                            WHERE
                                dh.dh_trangThai = 1');
        }
        return response()->json(array(
            'code' => 200,
            'result' =>$result,
        ));
    }
    public function thongKeDonHangDangXuLy(Request $request){
        if($request->vt_ma==2){
            $paremeter=[
                'kh_ma' => $request->kh_ma,
            ];
            $sql =<<<EOT
            SELECT COUNT(*) AS soLuong
            FROM donhang dh
            JOIN cuahangtaphoa chth on dh.chth_ma = chth.chth_ma
            WHERE
                dh.dh_trangThai = 2
                AND
                chth.kh_ma =:kh_ma
EOT;
            $result=DB::select($sql,$paremeter);
        }else{
        $result = DB::select('SELECT COUNT(*) AS soLuong
                            FROM donhang dh
                            WHERE
                                dh.dh_trangThai = 2');
        }
        return response()->json(array(
            'code' => 200,
            'result' =>$result,
        ));
    }
    public function thongKeDonHangDaGiao(Request $request){
        if($request->vt_ma==2){
            $paremeter=[
                'kh_ma' => $request->kh_ma,
            ];
            $sql =<<<EOT
            SELECT COUNT(*) AS soLuong
            FROM donhang dh
            JOIN cuahangtaphoa chth on dh.chth_ma = chth.chth_ma
            WHERE
                dh.dh_trangThai = 4
                AND
                chth.kh_ma =:kh_ma
EOT;
            $result=DB::select($sql,$paremeter);
        }else{
        $result = DB::select('SELECT COUNT(*) AS soLuong
                            FROM donhang dh
                            WHERE
                                dh.dh_trangThai = 4');
        }
        return response()->json(array(
            'code' => 200,
            'result' =>$result,
        ));
    }
    public function baoCaoDonHang(Request $request){
        $paremeter =[
            'tuNgay' => $request->tuNgay,
            'denNgay' => $request->denNgay,
        ];
        if($request->vt_ma==2){
            $kh_ma = $request->kh_ma;
            $sql =<<<EOT
            SELECT DATE_FORMAT(dh.dh_taoMoi,'%d/%m/%Y') as ngay,COUNT(*) as soLuong,SUM(dh.dh_giaTri) AS tongTien
            FROM donhang dh
            JOIN cuahangtaphoa chth on dh.chth_ma = chth.chth_ma
            WHERE  chth.kh_ma ={$kh_ma}
            AND dh.dh_taoMoi BETWEEN :tuNgay AND :denNgay
            GROUP BY  DATE_FORMAT(dh.dh_taoMoi,'%d/%m/%Y')
EOT;        
        }else{
            $sql =<<<EOT
            SELECT DATE_FORMAT(dh.dh_taoMoi,'%d/%m/%Y') as ngay,COUNT(*) as soLuong,SUM(dh.dh_giaTri) AS tongTien
            FROM donhang dh
            WHERE dh.dh_taoMoi BETWEEN :tuNgay AND :denNgay
            GROUP BY  DATE_FORMAT(dh.dh_taoMoi,'%d/%m/%Y')
EOT;        
        }
      
        $data = DB::select($sql,$paremeter);
        return response()->json(array(
            'code'=>200,
            'data'=>$data,
        ));
    }
    public function thongke_top_sanphamnoibat(){
        
    }
    public function getloaisanpham(){
        $result = DB::table('loaisanpham')->orderBy('lsp_ten')->get();
        return response()->json(array(
            'code'=>200,
            'result'=>$result,
        ));
    }
}
