<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTiet_DonHang extends Model
{
    use HasFactory;
    protected $table ='chitiet_donhang';
    protected $fillable =['dh_ma','sp_ma','ctdh_soLuong','ctdh_giaBan','created_at','updated_at'];
    protected $guarded =['dh_ma','sp_ma'];
    
    protected $prmarykey=['dh_ma','sp_ma'];
    public $timestamps = false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
