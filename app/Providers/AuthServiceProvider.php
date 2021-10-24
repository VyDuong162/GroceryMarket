<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use  App\Http\Controllers\Auth\CustomUserProvider;
use App\Models\CuaHangTapHoa;
use App\Models\KhachHang;
use App\Models\SanPham;
use App\Policies\CuaHangTapHoaPolicy;
use App\Policies\KhachHangPolicy;
use App\Policies\SanPhamPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
         CuaHangTapHoa::class =>CuaHangTapHoaPolicy::class,
         KhachHang::class =>KhachHangPolicy::class,
         SanPham::class =>SanPhamPolicy::class,
         DonHang::class =>DonHangPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin',function($user){
            return $user->vt_ma ===1;
        });
          // Sử dụng CustomUserProvider để xác thực tài khoản
        $this->app->auth->provider('custom', function ($app, array $config) {
            return new CustomUserProvider($app['hash'], $config['model']);
        });
    }
}
