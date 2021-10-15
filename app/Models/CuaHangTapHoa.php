<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuaHangTapHoa extends Model
{
    use HasFactory;
    protected $table ='cuahangtaphoa';
    protected $fillable =['chth_ten','kh_ma','chth_anhDaiDien','chth_email','chth_diachi','chth_taiKhoanNganHang','px_ma','chth_moTa','created_at','updated_at'];
    protected $guarded =['chth_ma'];

    protected $primaryKey =['chth_ma'];

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
    public function gettencuahang(){
        return  $this->attributes['chth_ten'];
    }
    public function khachhang(){
        return $this->belongsTo('App\Model\khachhang','kh_ma','kh_ma');
    }
    public function phuongxa(){
        return $this->belongsTo('App\Model\phuongxa','px_ma','px_ma');
    }
    public function dongiamathang(){
        return $this->hasMany('App\Model\DonGia_MatHang','chth_ma','chth_ma');
    }
    public function chitietdonhang(){
        return $this->hasMany('App\Model\DonGia_MatHang','chth_ma','chth_ma');
    }
    public function danhgias(){
        return $this->hasMany('App\Model\DanhGia','chth_ma','chth_ma');
    }
    public function yeuthichs(){
        return $this->hasMany('App\Model\YeuThich','chth_ma','chth_ma');
    }
}
