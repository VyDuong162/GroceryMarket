<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'hd_ngayLap';
    const     UPDATED_AT    = 'hd_capNhat';
    protected $table ='hoadon';
    protected $fillable =['hd_giaTri','hd_ngayLap','dh_ma','hd_capNhat'];
    protected $guarded =['hd_ma'];

    protected $primaryKey='hd_ma';
    protected $dates=['dh_ngayLap','hd_capNhat'];
    protected $dateFormat='Y-m-d H:i:s';

    public function donhang(){
        return $this->belongsTo('App\Model\DonHang','dh_ma','dh_ma');
    }
}
