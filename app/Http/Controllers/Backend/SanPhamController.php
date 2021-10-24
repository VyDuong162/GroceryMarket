<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DonGia_MatHang;
use App\Models\HinhAnhSanPham;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use App\Models\CuaHangTapHoa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',SanPham::class);
        if(Auth::user()->vt_ma==2){
            $kh_ma =Auth::user()->kh_ma;
            $dsSanPham = SanPham::Leftjoin('dongia_mathang','sanpham.sp_ma','=','dongia_mathang.sp_ma')
                                ->Leftjoin('cuahangtaphoa','cuahangtaphoa.chth_ma','=','dongia_mathang.chth_ma')
                                ->where('cuahangtaphoa.kh_ma','=',$kh_ma)
                                ->where('sanpham.sp_trangThai','<','3')
                                ->orderby('sanpham.created_at','desc')->get();
        }
        else{
            $dsSanPham = SanPham::Where('sp_trangThai','<','3')->orderby('created_at')->get();
        }
        
        
        return view('backend.sanpham.index')
            ->with('dsSanPham', $dsSanPham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',SanPham::class);
        if(Auth::user()->vt_ma==2){
            $kh_ma = Auth::user()->kh_ma;
            $dsCuaHang = CuaHangTapHoa::Where('kh_ma',$kh_ma)
                                        ->Where('chth_trangThai','<','3')
                                        ->get();
        }else{
            $dsCuaHang = CuaHangTapHoa::Where('chth_trangThai','<','3')->get();
        }
        $dsLoaiSanPham = LoaiSanPham::all();
        $dsNhaSanXuat = NhaSanXuat::all();
        return view('backend.sanpham.create')
            ->with('dsLoaiSanPham', $dsLoaiSanPham)
            ->with('dsCuaHang', $dsCuaHang)
            ->with('dsNhaSanXuat', $dsNhaSanXuat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',SanPham::class);
        $validator = Validator::make($request->all(), [
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
            if ($request->hasFile('sp_anhDaiDien')) {
                $file = $request->sp_anhDaiDien;
                $sp->sp_anhDaiDien = $file->getClientOriginalName();
                $fileSaved = $file->storeAs('public/products', $sp->sp_anhDaiDien);
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
            $sp->created_at = Carbon::now();
            $sp->save();
            if ($request->hasFile('hasp_hinhAnh')) {
                $files = $request->hasp_hinhAnh;
                foreach ($request->hasp_hinhAnh as $index  => $file) {
                    $file->storeAs('public/products', date('YmdHis') . "." . $file->getClientOriginalName());
                    $ha = new HinhAnhSanPham();
                    $ha->hasp_ma = ($index + 1);
                    $ha->sp_ma = $sp->sp_ma;
                    $ha->hasp_hinhAnh = date('YmdHis') . "." . $file->getClientOriginalName();
                    $ha->save();
                }
            }
            $dgmh = new DonGia_MatHang();
            $dgmh->chth_ma = $request->chth_ma;
            $dgmh->dgmh_gia = $request->dgmh_gia ? $request->dgmh_gia:'';
            $dgmh->sp_ma = $sp->sp_ma;
            $dgmh->dgmh_ngayCapNhat = Carbon::now();
            $dgmh->created_at = Carbon::now();
            $dgmh->save();
            return redirect(route('admin.sanpham.create'))
                ->with('alert-info', 'Sản phẩm được tạo thành công với ID: ' . $sp->sp_ma);
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
        $this->authorize('view',SanPham::class);
        $sp = SanPham::find($id);
        $dh = $sp->chitietdonhang()->get();
        $shop = $sp->dongiamathang()->first();
        $row=$sp->dongiamathang()->get();
        if(count($row) > 1){
        $gia = $sp->dongiamathang()->last();
        }else{
            $gia = $sp->dongiamathang()->first();
        }
        $dsCuaHang = CuaHangTapHoa::Where('chth_trangThai','<','3')->get();
        $dsNhaSanXuat = NhaSanXuat::all();
        $dsLoaiSanPham = LoaiSanPham::all();
        return view('backend.sanpham.show')
        ->with('sp',$sp)
        ->with('dsNhaSanXuat',$dsNhaSanXuat)
        ->with('dh',$dh)
        ->with('shop',$shop)
        ->with('gia',$gia)
        ->with('dsLoaiSanPham',$dsLoaiSanPham)
        ->with('dsCuaHang', $dsCuaHang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update',SanPham::class);
        $sp = SanPham::where('sp_ma', $id)->first();
        if(Auth::user()->vt_ma==2){
            $kh_ma = Auth::user()->kh_ma;
            $dsCuaHang = CuaHangTapHoa::Where('kh_ma',$kh_ma)
                                        ->Where('chth_trangThai','<','3')
                                        ->get();
        }else{
            $dsCuaHang = CuaHangTapHoa::Where('chth_trangThai','<','3')->get();
        }
        $dgmh = DonGia_MatHang::where('sp_ma', $id)->first();
        $dsLoaiSanPham = LoaiSanPham::all();
        $dsNhaSanXuat = NhaSanXuat::all();
        return view('backend.sanpham.edit')
            ->with('sp', $sp)
            ->with('dgmh',$dgmh)
            ->with('dsLoaiSanPham', $dsLoaiSanPham)
            ->with('dsNhaSanXuat', $dsNhaSanXuat)
            ->with('dsCuaHang', $dsCuaHang);
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
        $this->authorize('update',SanPham::class);
        $validator = Validator::make($request->all(), [
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
            $sp = SanPham::where('sp_ma', $id)->first();
            $sp->sp_ten = $request->sp_ten;
            $sp->lsp_ma = $request->lsp_ma;
            $sp->nsx_ma = $request->nsx_ma;
            if ($request->hasFile('sp_anhDaiDien')) {
                Storage::delete('public/products/' . $sp->sp_anhDaiDien);
                $file = $request->sp_anhDaiDien;
                $sp->sp_anhDaiDien = $file->getClientOriginalName();
                $fileSaved = $file->storeAs('public/products', $sp->sp_anhDaiDien);
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
            $sp->updated_at = Carbon::now();
            if ($request->hasFile('hasp_hinhAnh')) {
                foreach ($sp->hinhanhsanpham()->get() as $hinhAnh) {
                    Storage::delete('public/products/' . $hinhAnh->hasp_hinhAnh);
                    $hinhAnh->delete();
                }
                $files = $request->hasp_hinhAnh;
                foreach ($request->hasp_hinhAnh as $index => $file) {
                    $file->storeAs('public/products' ,date('YmdHis') . "." . $file->getClientOriginalName());
                    $ha = new HinhAnhSanPham();
                    $ha->hasp_ma = ($index + 1);
                    $ha->sp_ma = $sp->sp_ma;
                    $ha->hasp_hinhAnh = date('YmdHis') . "." . $file->getClientOriginalName();
                    $ha->save();
                }
            }
            $dgmh = DonGia_MatHang::where('sp_ma',$id)->first();
            $dgmh->chth_ma = $request->chth_ma?$request->chth_ma: $dgmh->chth_ma;
            $dgmh->dgmh_gia = $request->dgmh_gia ? $request->dgmh_gia:$dgmh->dgmh_gia;
            $dgmh->sp_ma = $sp->sp_ma;
            $dgmh->updated_at = Carbon::now();
            $dgmh->save();
            $sp->save();
            return redirect(route('admin.sanpham.edit', $sp->sp_ma))
                ->with('alert-info', 'Sản phẩm cập nhật thành công với ID: ' . $sp->sp_ma);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',SanPham::class);
           $row = DB::table("sanpham")->where('sp_ma', $id)->update(['sp_trangThai' => '3']);
           
            //return redirect(route('admin.sanpham.index'))->with('alert-info','Xóa thành công sản phẩm với ID_SP:'.$id);
       
    }
    public function Search( Request $request){
        $this->authorize('view',SanPham::class);
        $status = $request->get('status');
        $search = $request->get('search');
        $dulieu = SanPham::leftjoin('loaisanpham', 'sanpham.lsp_ma', '=', 'loaisanpham.lsp_ma')
                                    ->leftjoin('nhasanxuat', 'sanpham.nsx_ma', '=', 'nhasanxuat.nsx_ma')
                                    ->where('sp_trangThai','=',$status)
                                    ->where(
                                        function($query) use ($search){
                                            return $query->where('sp_ten','like','%'.$search.'%')
                                                ->orWhere('nsx_ten','like','%'.$search.'%')
                                                ->orWhere('lsp_ten','like','%'.$search.'%')
                                                ;
                                        }
                                    )
                                    ->orderBy('sp_ma', 'asc')->get();
      
        //$dssanpham = DB::table("sanpham")->whereIn('sp_ma',$dulieu)->get();
        return  view('backend.sanpham.index')->with('dsSanPham',$dulieu)
        ->with('status',$status)
        ->with('search',$search);
    }
    public function BulkAction(Request $request)
     {
        $this->authorize('update',SanPham::class);
        $action=$request->action;
        $ids = $request->get('ids'); 
        if($action != 0){
            if($action == 1){
                $setupdate = SanPham::whereIn('sp_ma',$ids)->update(['sp_trangThai' => '1']);
            }elseif($action == 2){
                $setupdate = SanPham::whereIn('sp_ma',$ids)->update(['sp_trangThai' => '2']);
            }elseif($action == 3){
                $setupdate = SanPham::whereIn('sp_ma',$ids)->update(['sp_trangThai' => '3']);
            }    
           // return redirect(route('admin.sanpham.index'));
        }
        //return redirect(route('admin.sanpham.index'))->with('alert-info','Xóa thành công sản phẩm với ID_SP:'.$ids);

     }
    
}
