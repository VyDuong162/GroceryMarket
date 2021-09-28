<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    use HasFactory;
    protected $table ='donvitinh';
    protected $fillable =['dvt_ten','created_at','updated_at'];
    protected $guarded = ['dvt_ma'];
    protected $primarykey ='dvt_ma';

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
