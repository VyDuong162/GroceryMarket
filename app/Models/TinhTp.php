<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhTp extends Model
{
    use HasFactory;
    protected $table ='tinhtp';
    protected $fillable =['ttp_ten','created_at','updated_at'];
    protected $guarded = ['ttp_ma'];

    protected $primaryKey='ttp_ma';
   
    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
