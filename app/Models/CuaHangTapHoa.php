<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CuaHangTapHoa extends Model
{
    use HasFactory;
    protected $table ='cuahangtaphoa';
    protected $fillable =['chth_ten','kh_ma','chth_anhDaiDien','chth_email','chth_diachi','chth_taiKhoanNganHang','px_ma','chth_moTa','chth_trangThai','created_at','updated_at'];
    protected $guarded =['chth_ma'];

    protected $primaryKey ='chth_ma';

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
    public function gettencuahang(){
        return  $this->attributes['chth_ten'];
    }
    public function khachhang(){
        return $this->belongsTo('App\Models\khachhang','kh_ma','kh_ma');
    }
    public function phoneNumber($number) {
        return "".substr($number, 0, 3)." ".substr($number, 3, 3)." ".substr($number,6);
    }
    public function laydiachi($px_ma){
        $diachi = PhuongXa::select(DB::raw('CONCAT(px_ten ,", ",qh_ten ,", ",ttp_ten) as diachi'))
                            ->JOIN('quanhuyen','phuongxa.qh_ma','=','quanhuyen.qh_ma')
                            ->JOIN('tinhtp','quanhuyen.ttp_ma','=','tinhtp.ttp_ma') 
                            ->where('phuongxa.px_ma','=',$px_ma)
                            ->get('diachi');
      
        return $diachi;
    }
    public function laytp($px_ma){
        $tp = PhuongXa::select('ttp_ten')
                            ->JOIN('quanhuyen','phuongxa.qh_ma','=','quanhuyen.qh_ma')
                            ->JOIN('tinhtp','quanhuyen.ttp_ma','=','tinhtp.ttp_ma') 
                            ->where('phuongxa.px_ma','=',$px_ma)
                            ->first();
      
        return $tp;
    }
    public function layqh($px_ma){
        $qh = PhuongXa::select('*')
                            ->JOIN('quanhuyen','phuongxa.qh_ma','=','quanhuyen.qh_ma')
                            ->JOIN('tinhtp','quanhuyen.ttp_ma','=','tinhtp.ttp_ma') 
                            ->where('phuongxa.px_ma','=',$px_ma)
                            ->first();
      
        return $qh;
    }
    public function phuongxa(){
        return $this->belongsTo('App\Models\phuongxa','px_ma','px_ma');
    }
    public function dongiamathang(){
        return $this->hasMany('App\Models\DonGia_MatHang','chth_ma','chth_ma');
    }
    public function chitietdonhang(){
        return $this->hasMany('App\Models\DonGia_MatHang','chth_ma','chth_ma');
    }
    public function danhgias(){
        return $this->hasMany('App\Models\DanhGia','chth_ma','chth_ma');
    }
    public function yeuthichs(){
        return $this->hasMany('App\Models\YeuThich','chth_ma','chth_ma');
    }
}
