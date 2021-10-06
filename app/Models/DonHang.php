<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'dh_taoMoi';
    const     UPDATED_AT    = 'dh_capNhat';
    protected $table ='donhang';
    protected $fillable =['kh_ma','chth_ma','dh_diaChi','dh_giaTri','dh_soDienThoai','dh_email','dh_trangThai','dh_taoMoi','dh_capNhat'];
    
    protected $guarded = ['dh_ma'];

    protected $primarykey=['dh_ma'];

    protected $dates =['dh_taoMoi','dh_capNhat'];
    protected $dateFormat ='Y-m-d H:i:s';
    public function khachhang(){
        return $this->belongsTo('App\Model\KhachHang','kh_ma','kh_ma');
    }
    public function cuahangtaphoa(){
        return $this->belongsTo('App\Model\CuaHangTapHoa','chth_ma','chth_ma');
    }
    public function danhgias(){
        return $this->hasMany('App\Model\DanhGia','dh_ma','dh_ma');
    }
    public function hoadon(){
        return $this->hasOne('App\Model\HoaDon','hd_ma','hd_ma');
    }
    public function vanchuyen(){
        return $this->hasMany('App\Model\VanChuyen','dh_ma','dh_ma');
    }
}
