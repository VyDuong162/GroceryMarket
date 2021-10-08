<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HinhAnhSanPham;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Session;
class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsSanPham = SanPham::paginate(10);
        return view('backend.sanpham.index')
        ->with('dsSanPham',$dsSanPham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsLoaiSanPham = LoaiSanPham::all();
        $dsNhaSanXuat = NhaSanXuat::all();
        return view('backend.sanpham.create')
        ->with('dsLoaiSanPham',$dsLoaiSanPham)
        ->with('dsNhaSanXuat',$dsNhaSanXuat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'sp_ten'       => 'required|max:255',
            'lsp_ma'      => 'required',
            'nsx_ma'    => 'required',
            'sp_anhDaiDien' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'sp_thanhPhan' => 'max:1000',
            'sp_cachDung' => 'max:1000',
            'sp_khoiLuong' => 'max:100',
            'sp_baoQuan' => 'max:100',
            'sp_doiTuongDung' => 'max:100',
            'sp_ghiChu' => 'max:100',
            'sp_moTaNgan' => 'max:1000',
            'sp_hanDung' => 'max:100',
            'sp_trangThai' => 'required',  
            'hasp_hinhAnh.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect(route('admin.sanpham.create'))
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $sp = new SanPham();
            $sp->sp_ten = $request->sp_ten;
            $sp->lsp_ma = $request->lsp_ma;
            $sp->nsx_ma = $request->nsx_ma;
            if($request->hasFile('sp_anhDaiDien')){
                $file = $request->sp_anhDaiDien;
                $sp->sp_anhDaiDien = $file->getClientOriginalName();
                $fileSaved = $file ->storeAs('public/products',$sp->sp_anhDaiDien);
            }
            
            $sp->sp_thanhPhan = $request->sp_thanhPhan;
            $sp->sp_cachDung = $request->sp_cachDung;
            $sp->sp_khoiLuong = $request->sp_khoiLuong;
            $sp->sp_baoQuan = $request->sp_baoQuan;
            $sp->sp_doiTuongDung = $request->sp_doiTuongDung;
            $sp->sp_ghiChu = $request->sp_ghiChu;
            $sp->sp_moTaNgan = $request->sp_moTaNgan;
            $sp->sp_hanDung = $request->sp_hanDung;
            $sp->sp_trangThai = $request->sp_trangThai;
            $sp->created_at= Carbon::now();
            $sp->save();
            if($request->hasFile('hasp_hinhAnh')){
                $files = $request->hasp_hinhAnh;     
                foreach($request->hasp_hinhAnh as $index  => $file){
                    $file->storeAs('public/products',date('YmdHis').".".$file->getClientOriginalName());
                    $ha = new HinhAnhSanPham();
                    $ha->sp_ma = $sp->id;
                    $ha->hasp_hinhAnh = date('YmdHis').".".$file->getClientOriginalName();   
                    $ha->save();   
                }
            }
           
            return redirect(route('admin.sanpham.create'))
                    ->with('alert-info', 'Sản phẩm được tạo thành công với ID: ' . $sp->id);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
