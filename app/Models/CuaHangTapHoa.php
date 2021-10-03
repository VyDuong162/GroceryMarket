<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuaHangTapHoa extends Model
{
    use HasFactory;
    protected $table ='cuahangtaphoa';
    protected $fillable =['chth_ten','kh_ma','chth_anhDaiDien','chth_email','chth_diachi','chth_taiKhoanNganHang','px_ma','chth_moTa','created_at','updated_at'];
    protected $guarded =['chth_ma'];

    protected $primarykey =['chth_ma'];

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
