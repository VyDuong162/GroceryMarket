<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    use HasFactory;
    protected $table ='yeuthich';
    protected $fillable =['sp_ma','chth_ma','kh_ma'];
    protected $guarded =['ty_ma'];

    protected $primaryKey =['ty_ma'];
    
}
