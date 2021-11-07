<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    use HasFactory;
    protected $table ='yeuthich';
    protected $fillable =['sp_ma','chth_ma','kh_ma'];
    protected $guarded ='ty_ma';

    protected $primaryKey ='ty_ma';
    public function sanpham(){
        return $this->belongsTo('App\Models\SanPham','sp_ma','sp_ma');
    }
    public function dongia($sp_ma){
        $gia = SanPham::leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
                        ->whereIn('sanpham.sp_ma','=',$sp_ma)
                        ->get('dgmh_gia');
        return $gia->dgmh_gia;
    }
    public function cuahangtaphoa(){
        return $this->belongsTo('App\Models\CuaHangTapHoa','chth_ma','chth_ma');
    }
    public function khachhang(){
        return $this->belongsTo('App\Models\KhachHang','kh_ma','kh_ma');
    }
}
