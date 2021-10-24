<?php

namespace App\Policies;

use App\Models\KhachHang;
use Illuminate\Auth\Access\HandlesAuthorization;

class KhachHangPolicy
{
    use HandlesAuthorization;
    public function before($user){
        if($user->vt_ma ==1){
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
        return $khachHang->kh_ma==1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(KhachHang $khachHang)
    {
        return $khachHang->kh_ma==2;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(KhachHang $khachHang)
    { 
        
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(KhachHang $khachHang)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(KhachHang $khachHang)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(KhachHang $khachHang)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(KhachHang $khachHang)
    {
        //
    }
}
