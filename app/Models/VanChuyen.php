<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VanChuyen extends Model
{
    use HasFactory;
    protected $table ='vanchuyen';
    protected $fillable =['dh_ma','tt_ma','vc_ngay','created_at','updated_at'];
    protected $guarded =['dh_ma','tt_ma'];

    protected $primarykey =['dh_ma','tt_ma'];

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
