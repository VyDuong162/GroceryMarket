<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\KhachHang;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\DiaChi;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'kh_hoTen' =>'required|min:5|max:100',
            'kh_ngaySinh' =>'required',
            'kh_soDienThoai' =>'required|max:10',
            'kh_email' =>'required|email',
            'ttp_ma' =>'required',
            'qh_ma' =>'required',
            'px_ma' =>'required',
            'dc_ten' =>'required|min:5|max:100',
            'kh_taiKhoan' =>'required|min:5|max:100|unique:khachhang',
            'kh_matKhau' =>'required|min:5|max:100',
            'kh_matKhau1' =>'required|min:5|max:100',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $kh = new KhachHang();
        $kh->kh_hoTen = $data['kh_hoTen'];
        $kh->kh_gioiTinh = $data['kh_gioiTinh'];
        $kh->kh_ngaySinh = date('Y-m-d', strtotime($data['kh_ngaySinh']));
        $kh->kh_soDienThoai = $data['kh_soDienThoai'];
        $kh->kh_email = $data['kh_email'];
        $kh->px_ma = $data['px_ma'];
        $kh->vt_ma = 3;
        $kh->kh_taiKhoan = $data['kh_taiKhoan'];
        $kh->kh_trangThai = 1;
        $kh->kh_matKhau = Hash::make($data['kh_matKhau']);
        $kh->created_at = Carbon::now();
        $kh->save();
        $dc = new DiaChi();
        $dc->kh_ma = $kh->kh_ma;
        $dc->dc_ten = $data['dc_ten'];
        $dc->created_at = Carbon::now();
        $dc->save();
        return $kh;
    }
}
