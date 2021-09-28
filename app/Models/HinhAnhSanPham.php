<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhSanPham extends Model
{
    use HasFactory;
    protected $table ='hinhanhsanpham';
    protected $fillable =['hasp_ten','sp_ma','created_at','updated_at'];
    protected $guarded = ['hasp_ma'];

    protected $primarykey=['hasp_ma'];

   
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
