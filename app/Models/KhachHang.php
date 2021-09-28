<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $table ='khachhang';
    protected $fillable =['kh_hoTen','kh_gioiTinh','kh_ngaySinh','kh_soDienThoai','kh_email','kh_taiKhoan','vt_ma','created_at','updated_at'];
    protected $hidden = [ 'kh_matKhau'];
    protected $guarded = ['kh_ma'];

    protected $primarykey=['kh_ma'];

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
