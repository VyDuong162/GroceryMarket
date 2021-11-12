<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\VaiTro;
use App\Models\PhuongXa;
use App\Models\QuanHuyen;
use App\Models\TinhTp;
use App\Http\Requests\RegisterRequest;
use App\Models\DiaChi;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){     
        $dsVaiTro = VaiTro::orderBy('vt_ten')->get();
        
        $dsPhuongXa = PhuongXa::orderBy('px_ten')->get();
        $dsQuanHuyen = QuanHuyen::orderBy('qh_ten')->get();
        $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
        return view('auth.register')
        ->with('dsVaiTro',$dsVaiTro)
        ->with('dsPhuongXa',$dsPhuongXa)
        ->with('dsTinhTp',$dsTinhTp)
        ->with('dsQuanHuyen',$dsQuanHuyen);   
    }
    public function store(RegisterRequest $request){
       
        $kh = new KhachHang();
        $kh->kh_hoTen = $request->kh_hoTen;
        $kh->kh_gioiTinh = $request->kh_gioiTinh;
        $kh->kh_ngaySinh = date('Y-m-d', strtotime($request->kh_ngaySinh));
        $kh->kh_soDienThoai = $request->kh_soDienThoai;
        $kh->kh_email = $request->kh_email;
        $kh->px_ma = $request->px_ma;
        $kh->vt_ma = 3;
        $kh->kh_taiKhoan = $request->kh_taiKhoan;
        $kh->kh_trangThai = 1;
        $kh->kh_matKhau = Hash::make($request->kh_matKhau);
        $kh->created_at = Carbon::now();
        $kh->save();
        $dc = new DiaChi();
        $dc->kh_ma = $kh->kh_ma;
        $dc->dc_ten = $request->dc_ten;
        $dc->created_at = Carbon::now();
        $dc->save();
        Auth::attempt(['kh_taiKhoan'=>$request->kh_taiKhoan, 'kh_matKhau'=>$request->kh_matKhau]);
        return redirect()->route('login')->with('alert-info','Đăng ký thành công mời bạn đăng nhập!');
    }
    protected function registered(Request $request, $user)
    {
        return Auth::loginUsingId($user->id);
    }
}
