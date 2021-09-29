<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuongThucThanhToan extends Model
{
    use HasFactory;
    protected $table ='phuongthucthanhtoan';
    protected $fillable =['pttt_ten','created_at','updated_at'];
    protected $guarded =['pttt_ma'];

    protected $primarykey =['pttt_ma'];

    protected $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
