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

    public function loaisanpham(){
        return $this->belongsTo('App\Model\LoaiSanPham','lsp_ma','lsp_ma');
    }
    public function nhasanxuat(){
        return $this->belongsTo('App\Model\NhaSanXuat','nsx_ma','nsx_ma');
    }
    public function hinhanhsanpham(){
        return $this->hasMany('App\Model\HinhAnhSanPham','sp_ma','sp_ma');
    }
    public function dongiamathang(){
        return $this->hasMany('App\Model\DonGia_MatHang','sp_ma','sp_ma');
    }
    public function chitietdonhang(){
        return $this->hasMany('App\Model\ChiTiet_DonHang','sp_ma','sp_ma');
    }
    public function danhgias(){
        return $this->hasMany('App\Model\DanhGia','sp_ma','sp_ma');
    }
    public function yeuthichs(){
        return $this->hasMany('App\Model\YeuThich','sp_ma','sp_ma');
    }
}
