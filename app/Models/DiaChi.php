<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChi extends Model
{
    use HasFactory;
    protected $table ='diachi';
    protected $fillable =['dc_ten','kh_ma','created_at','updated_at'];
    protected $guarded =['dc_ma'];

    protected $primaryKey='dc_ma';
    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
    public function khachhang(){
        return $this->belongsTo('App\Model\KhachHang','kh_ma','kh_ma');
    }
}
