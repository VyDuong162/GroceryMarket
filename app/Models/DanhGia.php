<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;
    protected $table ='danhgia';
    protected $fillable =['sp_ma','chth_ma','dg_soDiem','dg_noiDung','dg_thoiGian','dg_trangThai'];
    protected $guarded =['dg_ma'];

    protected $primarykey =['dg_ma'];
    public $timestamps = false;
    protected $dates =['dg_thoiGian'];
    protected $dateFormat ='d-m-Y H:i:s';
    
}
