<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    use HasFactory;
    protected $table ='nhasanxuat';
    protected $fillable =['nsx_ten','created_at','updated_at'];
    protected $guarded = ['nsx_ma'];

    protected $primaryKey='nsx_ma';
    
    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
    public function sanphams(){
        return $this->hasMany('App\Models\SanPham','nsx_ma','nsx_ma');
    }
}
