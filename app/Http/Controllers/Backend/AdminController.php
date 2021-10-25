<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboards(){        
        if(Auth::check()){
            if(Auth::user()->vt_ma==1 || Auth::user()->vt_ma==2){
                return view('backend.dashboards');
            }else{
                return redirect(route('home'))->with('alert-warning','Người dùng không có quyền truy cập');
            }
            
        }else{
            return redirect(route('home'));
        }
        
    }
}
