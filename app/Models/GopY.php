<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GopY extends Model
{
    use HasFactory;
    protected $table ='gopy';
    protected $fillable = ['kh_ma','chth_ma','gy_thoiGian','gy_noiDung','gy_noiDung','gy_trangThai','created_at','updated_at'];
    protected $guarded = ['gy_ma'];

    protected $primarykey =['gy_ma'];

    protected $timestamps = false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
