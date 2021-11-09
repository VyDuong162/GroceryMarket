<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasCompositePrimaryKey;
class DonGia_MatHang extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;
    protected $table ='dongia_mathang';
    protected $fillable =['dgmh_gia','dgmh_ghiChu','dgmh_ngayCapNhat','created_at','updated_at'];
    protected $guarded =['chth_ma','sp_ma','dgmh_ngayCapNhat'];
    
    protected $primaryKey=['chth_ma','sp_ma','dgmh_ngayCapNhat'];
    public $timestamps = false;
    public    $incrementing = false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
    public function sanpham(){
        return $this->belongsTo('App\Models\SanPham','sp_ma','sp_ma');
    }
    public function cuahangtaphoa(){
        return $this->belongsTo('App\Models\CuaHangTapHoa','chth_ma','chth_ma');
    }
}
