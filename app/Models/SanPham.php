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
    
    protected $primaryKey ='sp_ma';
    
    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';

    public function loaisanpham(){
        return $this->belongsTo('App\Models\LoaiSanPham','lsp_ma','lsp_ma');
    }
    public function nhasanxuat(){
        return $this->belongsTo('App\Models\NhaSanXuat','nsx_ma','nsx_ma');
    }
    public function hinhanhsanpham(){
        return $this->hasMany('App\Models\HinhAnhSanPham','sp_ma','sp_ma');
    }
    public function dongiamathang(){
        return $this->belongsTo('App\Models\DonGia_MatHang','sp_ma','sp_ma');
    }
    public function chitietdonhang(){
        return $this->hasMany('App\Models\ChiTiet_DonHang','sp_ma','sp_ma');
    }
    public function danhgias(){
        return $this->hasMany('App\Models\DanhGia','sp_ma','sp_ma');
    }
    public function yeuthichs(){
        return $this->hasMany('App\Models\YeuThich','sp_ma','sp_ma');
    }
}
