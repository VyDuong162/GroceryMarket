<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /* use AuthenticatesUsers{
        logout as performLogout;
    } */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
 //   protected $redirectTo = '/home'; //Sau khi đăng nhập thành công, sẽ tự động trỏ về trang /home/
    protected function redirectTo()
    {
        if (Auth::user()->vt_ma ==1 || Auth::user()->vt_ma ==2) {
            return '/admin';
        }
        return '/home';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     /**
     * Hàm trả về tên cột dùng để tìm `Tên đăng nhập`.
     * Thông thường là cột `username` hoặc cột `email`
     */
    public function username(){
        return 'kh_taiKhoan';
    }  

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $cred = $request->only($this->username(), 'kh_matKhau');
        return $cred;
    }

    /**
     * Hàm dùng để Kiểm tra tính hợp lệ của dữ liệu (VALIDATE) khi Xác thực tài khoản
     */
    protected function validateLogin(Request $request)
    {
		Session::put('user', DB::table('khachhang')->where('kh_taiKhoan', $request['kh_taiKhoan'])->get());
        $request->session()->regenerate();
        $this->validate($request, [
            $this->username() => 'required|string', // tên tài khoản bắt buộc nhập
            'kh_matKhau' => 'required|string',      // mật khẩu bắt buộc nhập
        ]);
        
        $remember_me = $request->has('kh_ghinhodangnhap') ? true : false;
        if($remember_me){
            Cookie::queue('users',$request->kh_taiKhoan,1440);
            Cookie::queue('pwd',$request->kh_matKhau,1440);
        }
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('kh_ghinhodangnhap')
        );
      
    }
    public function logout(){
        // Auth::logout();
      	Auth::logoutCurrentDevice(); // use this instead of Auth::logout()
        
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/index');
    }
   
}
