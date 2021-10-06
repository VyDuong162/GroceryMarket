<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuongXa extends Model
{
    use HasFactory;
    protected $table ='phuongxa';
    protected $fillable =['px_ten','qh_ma','created_at','updated_at'];
    protected $guarded = ['px_ma'];

    protected $primarykey=['px_ma'];

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';

    public function quanhuyen(){
        return $this->belongsTo('App\Model\QuanHuyen','qh_ma','qh_ma');
    }
}
