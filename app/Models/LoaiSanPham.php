<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
    protected $table ='loaisanpham';
    protected $fillable =['lsp_ten','created_at','updated_at'];
    protected $guarded = ['lsp_ma'];

    protected $primarykey=['lsp_ma'];

    public $timestamps =false;
    protected $dates =['created_at','updated_at'];
    protected $dateFormat ='Y-m-d H:i:s';
    
    public function sanphams(){
        return $this->hasMany('App\Models\SanPham','lsp_ma','lsp_ma');
    }
}
