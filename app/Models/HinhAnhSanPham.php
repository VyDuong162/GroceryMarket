<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasCompositePrimaryKey;
class HinhAnhSanPham extends Model
{
    use HasFactory;
    use HasCompositePrimaryKey;
    protected $table ='hinhanhsanpham';
    protected $fillable =['hasp_hinhAnh','created_at','updated_at'];
    protected $guarded = ['hasp_ma','sp_ma'];

    protected $primaryKey=['hasp_ma','sp_ma'];

    public    $incrementing = false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';

    public function sanpham(){
        return $this->belongsTo('App\Models\SanPham','sp_ma','sp_ma');
    }
}
