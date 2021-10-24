<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CuaHangTapHoa;
use App\Models\DonGia_MatHang;
use App\Models\KhachHang;
use App\Models\TinhTp;
use App\Models\PhuongXa;
use App\Models\QuanHuyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class CuaHangTapHoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', CuaHangTapHoa::class);
        if(Auth::user()->vt_ma ==2){
            $kh_ma = Auth::user()->kh_ma;
            $dsCuaHang = CuaHangTapHoa::Where('kh_ma',$kh_ma)
                                        ->Where('chth_trangThai','<','3')
                                        ->get();
        }else{
            $dsCuaHang = CuaHangTapHoa::Where('chth_trangThai','<','3')->get();
        }
        return view('backend.cuahangtaphoa.index')
        ->with('dsCuaHang',$dsCuaHang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', CuaHangTapHoa::class);
        $dsKhachHang = KhachHang::where('vt_ma',2)->orderBy('kh_hoTen')->get();
        $dsPhuongXa = PhuongXa::orderBy('px_ten')->get();
        $dsQuanHuyen = QuanHuyen::orderBy('qh_ten')->get();
        $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
        return view('backend.cuahangtaphoa.create')
        ->with('dsKhachHang',$dsKhachHang)
        ->with('dsPhuongXa',$dsPhuongXa)
        ->with('dsTinhTp',$dsTinhTp)
        ->with('dsQuanHuyen',$dsQuanHuyen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', CuaHangTapHoa::class);
        $validator = Validator::make($request->all(),
            [
                'kh_ma' => 'required',
                'chth_ten' => 'required | max:100',
                'chth_anhDaiDien' =>'required',
                'chth_soDienThoai' =>'required',
                'chth_email' => 'required ',
                'chth_diaChi' =>'required | max:100',
                'chth_anhDaiDien' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
                'chth_taiKhoanNganHang' =>'required | min:10 | max:10',
                'px_ma'=>'required',
                'chth_moTa' =>'max:1000',
            ]
        );
        if($validator->fails()){
            return redirect(route('admin.cuahangtaphoa.create'))
            ->withErrors($validator)
            ->withInput();
        }else{
            $chth = new CuaHangTapHoa();
            $chth->kh_ma = $request->kh_ma;
            $chth->chth_ten = $request->chth_ten;
            $chth->chth_soDienThoai = $request->chth_soDienThoai;
            $chth->chth_email = $request->chth_email;
            $chth->chth_diaChi = $request-> chth_diaChi;
            $chth->chth_taiKhoanNganHang = $request->chth_taiKhoanNganHang;
            $chth->px_ma = $request->px_ma;
            $chth->chth_moTa = $request->chth_moTa;
            if ($request->hasFile('chth_anhDaiDien')) {
                $file = $request->chth_anhDaiDien;
                $chth->chth_anhDaiDien = date('YmdHis')."." . $file->getClientOriginalName();
                $fileSaved = $file->storeAs('public/avatarshop',$chth->chth_anhDaiDien);
            }
            $chth->created_at = Carbon::now();
            $chth->save();
            return redirect(route('admin.cuahangtaphoa.create'))
            ->with('alert-info','Thêm mới cửa hàng thành công với ID: '.$chth->chth_ma);
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
        $this->authorize('view', CuaHangTapHoa::class);
        $chth = CuaHangTapHoa::find($id);
        $kh_ma = $chth->kh_ma;
        $kh =KhachHang::where('kh_ma',$kh_ma)->first();
        $dsPhuongXa = PhuongXa::orderBy('px_ten')->get();
        $dsQuanHuyen = QuanHuyen::orderBy('qh_ten')->get();
        $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
        return view('backend.cuahangtaphoa.show')
        ->with('chth',$chth)
        ->with('kh',$kh)
        ->with('dsPhuongXa',$dsPhuongXa)
        ->with('dsTinhTp',$dsTinhTp)
        ->with('dsQuanHuyen',$dsQuanHuyen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', CuaHangTapHoa::class);
        $chth = CuaHangTapHoa::where('chth_ma',$id)->first();
        $pxid = $chth->px_ma;
        $dsKhachHang = KhachHang::where('vt_ma',2)->orderBy('kh_hoTen')->get();  
      
        $px = PhuongXa::where('px_ma',$pxid)->get();
        $qhid = $px[0]['qh_ma'];
        $qh = QuanHuyen::where('qh_ma',$qhid)->get();
        $ttp = TinhTp::where('ttp_ma',$qh[0]['ttp_ma'])->first();
        $dsPhuongXa = PhuongXa::orderBy('px_ten')->get();
        $dsQuanHuyen = QuanHuyen::orderBy('qh_ten')->get();
        $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
        return view('backend.cuahangtaphoa.edit')
        ->with('chth',$chth)
        ->with('px',$px)
        ->with('qh',$qh)
        ->with('ttp',$ttp)
        ->with('dsKhachHang',$dsKhachHang)
        ->with('dsPhuongXa',$dsPhuongXa)
        ->with('dsTinhTp',$dsTinhTp)
        ->with('dsQuanHuyen',$dsQuanHuyen);
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
        $this->authorize('update', CuaHangTapHoa::class);
        $validator = Validator::make($request->all(),
        [
            'kh_ma' => '',
            'chth_ten' => '| max:100',
            'chth_anhDaiDien' =>'',
            'chth_soDienThoai' =>'',
            'chth_email' => '',
            'chth_diaChi' =>' max:100',
            'chth_taiKhoanNganHang' =>' min:10 | max:10',
            'px_ma'=>'',
            'chth_moTa' =>'max:1000',
        ]
    );
    if($validator->fails()){
        return redirect(route('admin.cuahangtaphoa.edit',$id))
        ->withErrors($validator)
        ->withInput();
    }else{
        $chth = CuaHangTapHoa::where('chth_ma',$id)->first();
        $chth->kh_ma = $request->kh_ma;
        $chth->chth_ten = $request->chth_ten;
        $chth->chth_soDienThoai = $request->chth_soDienThoai? $request->chth_soDienThoai :  $chth->chth_soDienThoai ;
        $chth->chth_email = $request->chth_email;
        $chth->chth_diaChi = $request-> chth_diaChi;
        $chth->chth_taiKhoanNganHang = $request->chth_taiKhoanNganHang ? $request->chth_taiKhoanNganHang: $chth->chth_taiKhoanNganHang;
        $chth->px_ma = $request->px_ma;
        $chth->chth_moTa = $request->chth_moTa;
        if ($request->hasFile('chth_anhDaiDien')) {
            Storage::delete('public/avatarshop/' . $chth->chth_anhDaiDien);
            $file = $request->chth_anhDaiDien;
            $chth->chth_anhDaiDien = date('YmdHis')."." . $file->getClientOriginalName();
            $fileSaved = $file->storeAs('public/avatarshop',date('YmdHis') . "." . $chth->chth_anhDaiDien);
        }
        $chth->updated_at = Carbon::now();
        $chth->save();
        return redirect(route('admin.cuahangtaphoa.edit',$chth->chth_ma))
        ->with('alert-info','Chỉnh sửa cửa hàng thành công với ID: '.$id);
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
        $this->authorize('delete', CuaHangTapHoa::class);
        $chth = CuaHangTapHoa::find($id);
        if(!file_exists('public/avatarshop/'.$chth->chth_anhDaiDien)){
            Storage::delete('public/avatarshop/' . $chth->chth_anhDaiDien);
        }
        $chth->delete();
    }
    public function BulkAction(Request $request)
    {
       $this->authorize('update', CuaHangTapHoa::class);
       $action=$request->action;
       $datetime = Carbon::now();
       $ids = $request->get('ids'); 
       if($action != 0){
           if($action == 1){
               $setupdate = CuaHangTapHoa::whereIn('chth_ma',$ids)->update(['chth_trangThai' => '1','updated_at' => $datetime ]);
           }elseif($action == 2){
               $setupdate = CuaHangTapHoa::whereIn('chth_ma',$ids)->update(['chth_trangThai' => '2','updated_at' => $datetime]);
           }elseif($action == 3){
               $setupdate = CuaHangTapHoa::whereIn('chth_ma',$ids)->update(['chth_trangThai' => '3','updated_at' => $datetime]);
           }    
       }
    }
    public function SanPhamCuaHang($id){
        $this->authorize('view', CuaHangTapHoa::class);
        $dsSanPham = DonGia_MatHang::leftjoin('sanpham','dongia_mathang.sp_ma','=','sanpham.sp_ma')
                                    ->leftjoin('cuahangtaphoa','dongia_mathang.chth_ma','=','cuahangtaphoa.chth_ma')
                                    ->where('cuahangtaphoa.chth_ma','=',$id)
                                    ->get();
        return view('backend.cuahangtaphoa.showproduct')
        ->with('dsSanPham',$dsSanPham)
        ->with('chth_ma',$id);
    }
    public function Search( Request $request){
        $this->authorize('view', CuaHangTapHoa::class);
        $status = $request->get('status');
        $chth_ma =$request->chth_ma;
        $dulieu = DonGia_MatHang::leftjoin('sanpham','dongia_mathang.sp_ma','=','sanpham.sp_ma')
                                ->leftjoin('cuahangtaphoa','dongia_mathang.chth_ma','=','cuahangtaphoa.chth_ma')
                                ->where('cuahangtaphoa.chth_ma','=',$chth_ma)
                                ->where('sanpham.sp_trangThai','=',$status)
                                ->orderBy('sanpham.sp_ma', 'asc')->get();
       
        //$dssanpham = DB::table("sanpham")->whereIn('sp_ma',$dulieu)->get();
        return  view('backend.cuahangtaphoa.showproduct')->with('dsSanPham',$dulieu)
        ->with('chth_ma',$chth_ma)
        ->with('status',$status);
    }
    public function UpdatePrice(Request $request){
        $this->authorize('update', CuaHangTapHoa::class);
        $dgmh = DonGia_MatHang::where('sp_ma',$request->sp_ma)->first();
        $dgmh->dgmh_gia = $request->dgmh_gia ? $request->dgmh_gia:$dgmh->dgmh_gia;
        $dgmh->updated_at = Carbon::now();
        $dgmh->save();
       Session::flash('alert-info','Cập nhật giá thành công mã sản phẩm '.$request->sp_ma);
       return redirect(route('sanpham.cuahangtaphoa',$dgmh->chth_ma));
    }
}
