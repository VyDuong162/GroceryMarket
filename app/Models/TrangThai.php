<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    use HasFactory;
    protected $table ='trangthai';
    protected $fillable =['tt_ten','created_at','updated_at'];
    protected $guarded =['tt_ma'];

    protected $primaryKey ='tt_ma';

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';
    public function vanchuyen(){
        return $this->hasMany('App\Model\VanChuyen','tt_ma','tt_ma');
    }
}
