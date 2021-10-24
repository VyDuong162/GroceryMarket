<?php

namespace App\Policies;

use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Auth\Access\HandlesAuthorization;

class SanPhamPolicy
{
    use HandlesAuthorization;
    public function before($user){
        if($user->vt_ma==1){
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(KhachHang $khachHang)
    {
        return $khachHang->vt_ma==2;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(KhachHang $khachHang)
    {
        return $khachHang->vt_ma==2;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(KhachHang $khachHang)
    {
        return $khachHang->vt_ma==2;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(KhachHang $khachHang)
    {
        return $khachHang->vt_ma==2;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(KhachHang $khachHang)
    {
        return $khachHang->vt_ma==2;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(KhachHang $khachHang, SanPham $sanPham)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(KhachHang $khachHang, SanPham $sanPham)
    {
        //
    }
}
