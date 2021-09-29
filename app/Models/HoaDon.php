<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table ='hoadon';
    protected $fillable =['hd_giaTri','hd_ngayLap','dh_ma','created_at','updated_at'];
    protected $guarded =['hd_ma'];

    protected $primarykey=['hd_ma'];
    protected $dates=['dh_ngayLap','created_at','updated_at'];
    protected $dateForm='Y-m-d H:i:s';
}
