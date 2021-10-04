<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonGia_MatHang extends Model
{
    use HasFactory;
    protected $table ='dongia_mathang';
    protected $fillable =['chth_ma','sp_ma','dgmh_gia','dgmh_ghiChu','dgmh_ngayCapNhat','created_at','updated_at'];
    protected $guarded =['chth_ma','sp_ma','dgmh_ngayCapNhat'];
    
    protected $prmarykey=['chth_ma','sp_ma','dgmh_ngayCapNhat'];
    public $timestamps = false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';

}
