<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table ='sanpham';
    protected $fillable =['sp_ten','lsp_ma','nsx_ma','dvt_ma','sp_anhDaiDien',
    'sp_thanhPhan','sp_cachDung','sp_khoiLuong','sp_baoQuan','sp_doiTuongDung','sp_ghiChu','sp_moTaNgan','created_at','updated_at'];
    protected $guarded=['sp_ma'];
    
    protected $primarykey =['sp_ma'];
    
    public $incrementing = false;
    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
}
