<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VaiTro;
use App\Models\PhuongXa;
use App\Models\QuanHuyen;
use App\Models\TinhTp;
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){     
        $dsVaiTro = VaiTro::orderBy('vt_ten')->get();
        
        $dsPhuongXa = PhuongXa::orderBy('px_ten')->get();
        $dsQuanHuyen = QuanHuyen::orderBy('qh_ten')->get();
        $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
        return view('auth.register1')
        ->with('dsVaiTro',$dsVaiTro)
        ->with('dsPhuongXa',$dsPhuongXa)
        ->with('dsTinhTp',$dsTinhTp)
        ->with('dsQuanHuyen',$dsQuanHuyen);   
      
        
    }
}
