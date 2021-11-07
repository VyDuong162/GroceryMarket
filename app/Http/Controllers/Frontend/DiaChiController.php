<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DiaChi;
use Carbon\Carbon;
class DiaChiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if(Auth::check()){
            $kh_ma = Auth::user()->kh_ma;
            $dsDiaChi = DiaChi::where('kh_ma','=',$kh_ma)->get();
            $soluong = $dsDiaChi->count('sp_ma');
            return view('frontend.pages.my-address')
            ->with('soluong',$soluong)
            ->with('dsDiaChi',$dsDiaChi);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dc = new DiaChi();
        $dc->kh_ma = Auth::user()->kh_ma;
        $dc->dc_ten = $request->dc_ten;
        $dc->created_at = Carbon::now();
        $dc->save();
        return "thêm địa chỉ thành công";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return  DiaChi::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dc =  DiaChi::find($id);
        $dc->dc_ten = $request->dc_ten;
        
        $dc->updated_at = Carbon::now();
        $dc->save();
        return "Chỉnh sửa thành công";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dc =  DiaChi::find($id);
     
        $dc->delete();
        return "Xóa thành công";
    }
}
