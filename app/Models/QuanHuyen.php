<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    use HasFactory;
    protected $table ='quanhuyen';
    protected $fillable =['qh_ten','ttp_ma','created_at','updated_at'];
    protected $guarded = ['qh_ma'];

    protected $primaryKey='qh_ma';

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';

    public function tinhtp(){
        return $this->belongsTo('App\Models\TinhTp','tp_ma','tp_ma');
    }
   
}
