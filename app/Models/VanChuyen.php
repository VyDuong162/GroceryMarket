<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasCompositePrimaryKey;
class VanChuyen extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;
    protected $table ='vanchuyen';
    protected $fillable =['vc_ngay','created_at','updated_at'];
    protected $guarded =['dh_ma','tt_ma'];

    protected $primaryKey =['dh_ma','tt_ma'];
  
    public $timestamps =false;
    public $incrementing = false;
    protected $dates =['vc_ngay','created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
