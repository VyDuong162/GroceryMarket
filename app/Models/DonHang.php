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
    protected $fillable =['kh_ma','chth_ma','dh_diaChi','dh_giaTri','dh_soDienThoai','dh_email','dh_trangThai','pttt_ma','dh_taoMoi','dh_capNhat'];
    
    protected $guarded = 'dh_ma';

    protected $primaryKey='dh_ma';
    public $timestamps =false;
    protected $dates =['dh_taoMoi','dh_capNhat'];
    protected $dateFormat ='Y-m-d H:i:s';
    public function khachhang(){
        return $this->belongsTo('App\Models\KhachHang','kh_ma','kh_ma');
    }
    public function phuongthucthanhtoan(){
        return $this->belongsTo('App\Models\PhuongThucThanhToan','pttt_ma','pttt_ma');
    }
    public function phoneNumber($number) {
        return "".substr($number, 0, 3)." ".substr($number, 3, 3)." ".substr($number,6);
    }
    public function cuahangtaphoa(){
        return $this->belongsTo('App\Models\CuaHangTapHoa','chth_ma','chth_ma');
    }
    public function danhgias(){
        return $this->hasMany('App\Models\DanhGia','dh_ma','dh_ma');
    }
    public function hoadon(){
        return $this->hasOne('App\Models\HoaDon','dh_ma','dh_ma');
    }
    public function chitietdh(){
        return $this->hasMany('App\Models\ChiTiet_DonHang','dh_ma','dh_ma');
    }
    public function vanchuyen(){
        return $this->hasMany('App\Models\VanChuyen','dh_ma','dh_ma');
    }
}
