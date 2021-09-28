<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    use HasFactory;
    protected $table ='vaitro';
    protected $fillable =['vt_ten','created_at','updated_at'];
    protected $guarded = ['vt_ma'];

    protected $primarykey=['vt_ma'];

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
