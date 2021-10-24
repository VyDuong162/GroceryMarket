<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CuaHangTapHoa;
use App\Models\DiaChi;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\PhuongXa;
use App\Models\QuanHuyen;
use App\Models\TinhTp;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',KhachHang::class);
        $dsKhachHang = KhachHang::Where('kh_trangThai','<','3')->orderby('created_at')->get();
        $dsVaiTro = VaiTro::all();
        return view('backend.khachhang.index')
        ->with('dsVaiTro',$dsVaiTro)
        ->with('dsKhachHang',$dsKhachHang);
    }
    public function getQuanHuyen( Request $request )
	{
            if($request->ajax()){
                if(empty($request->qh_ma)){
                    $qh = QuanHuyen::where('ttp_ma',$request->ttp_ma)->orderBy('qh_ten')->get();
                return response()->json($qh);
                }else{
                    $px = PhuongXa::where('qh_ma',$request->qh_ma)->orderBy('px_ten')->get();
                    return response()->json($px);
                }
                
            }   
           
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',KhachHang::class);
        $dsVaiTro = VaiTro::orderBy('vt_ten')->get();
        
        $dsPhuongXa = PhuongXa::orderBy('px_ten')->get();
        $dsQuanHuyen = QuanHuyen::orderBy('qh_ten')->get();
        $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
        return view('backend.khachhang.create')
        ->with('dsVaiTro',$dsVaiTro)
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
        $this->authorize('create',KhachHang::class);
        $validator = Validator::make($request->all(),[
            'kh_hoTen' => 'required | max:100',
            'kh_ngaySinh' => 'required',
            'kh_gioiTinh' => 'required',
            'kh_soDienThoai' => 'required | max:10',
            'kh_email' => 'required',
            'kh_taiKhoan' => 'required |unique:kh_taiKhoan| max:100',
            'kh_matKhau' => 'required | max:100',
            'dc_ten' => 'required | max:100',
            'vt_ma' => 'required '
        ]);

        if($validator->fails()){
            return redirect(route('admin.khachhang.create'))
            ->withErrors($validator)
            ->withInput();
        }else{
            $kh = new KhachHang();
            $kh->kh_hoTen = $request->kh_hoTen;
            $kh->kh_ngaySinh = $request->kh_ngaySinh;
            $kh->kh_gioiTinh = $request->kh_gioiTinh;
            $kh->kh_soDienThoai = $request->kh_soDienThoai;
            $kh->kh_email = $request->kh_email;
            $kh->kh_taiKhoan = $request->kh_taiKhoan;
            $kh->kh_matKhau =  Hash::make($request->kh_matKhau);
            $kh->px_ma = $request->px_ma;
            $kh->vt_ma = $request->vt_ma;
            $kh->created_at = Carbon::now();
            $kh->kh_trangThai = 1;
            $kh->save();

            $kh_dc = new DiaChi();
            $kh_dc->dc_ten = $request->dc_ten;
            $kh_dc->kh_ma = $kh->kh_ma; 
            $kh_dc->created_at = Carbon::now();
            $kh_dc->save();
            return redirect(route('admin.khachhang.create'))
            ->with('alert-info', 'Khách hàng được tạo thành công với ID: ' . $kh->kh_ma);
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
        $this->authorize('view',KhachHang::class);
        $kh = KhachHang::find($id);
        $cuahang = CuaHangTapHoa::where('kh_ma',$id)->get();
        $tencuahang =CuaHangTapHoa::where('kh_ma',$id)->get('chth_ten');
        $dh = DonHang::where('kh_ma',$id)->get();
        $demdh = $dh->count();
        $demcuahang = $cuahang->count();
           
        return view('backend.khachhang.show')
        ->with('kh',$kh)
        ->with('demdh', $demdh)
        ->with('demcuahang',$demcuahang)
        ->with('tencuahang',$tencuahang)
        ->with('cuahang',$cuahang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update',KhachHang::class);
        $kh = KhachHang::where('kh_ma',$id)->first();
        $pxid = $kh->px_ma;
        $px = PhuongXa::where('px_ma',$pxid)->get();
        $qhid = $px[0]['qh_ma'];
        $qh = QuanHuyen::where('qh_ma',$qhid)->get();
        $ttp = TinhTp::where('ttp_ma',$qh[0]['ttp_ma'])->first();
        $diachi =DiaChi::where('kh_ma',$id)->orderBy('created_at')->first(); 
        $dsVaiTro = VaiTro::orderBy('vt_ten')->get();
        $dsPhuongXa = PhuongXa::orderBy('px_ten')->get();
        $dsQuanHuyen = QuanHuyen::orderBy('qh_ten')->get();
        $dsTinhTp = TinhTp::orderBy('ttp_ten')->get();
        return view('backend.khachhang.edit')
        ->with('kh',$kh)
        ->with('px',$px)
        ->with('qh',$qh)
        ->with('ttp',$ttp)
        ->with('dsVaiTro',$dsVaiTro)
        ->with('dsPhuongXa',$dsPhuongXa)
        ->with('dsTinhTp',$dsTinhTp)
        ->with('diachi',$diachi)
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
        $this->authorize('update',KhachHang::class);
        $validator = Validator::make($request->all(),[
            'kh_hoTen' => 'required | max:100',
            'kh_ngaySinh' => 'required',
            'kh_gioiTinh' => 'required',
            'kh_soDienThoai' => 'required | max:10',
            'kh_email' => 'required',
            'kh_taiKhoan' => 'unique:kh_taiKhoan| max:100',
            'kh_matKhau' => 'max:100',
            'dc_ten' => 'required | max:100',
            'vt_ma' => 'required '
        ]);

        if($validator->fails()){
            return redirect(route('admin.khachhang.edit',$id))
            ->withErrors($validator)
            ->withInput();
        }else{
            $kh = KhachHang::where('kh_ma', $id)->first();
            $kh->kh_hoTen = $request->kh_hoTen;
            $kh->kh_ngaySinh = $request->filled('kh_ngaySinh') ?Carbon::createFromFormat('d/m/Y', $request->get('kh_ngaySinh')) : $kh->ngaySinh;
            $kh->kh_gioiTinh = $request->kh_gioiTinh;
            $kh->kh_soDienThoai = $request->kh_soDienThoai;
            $kh->kh_email = $request->kh_email;
            $kh->kh_matKhau = $request->kh_matKhau ? Hash::make($request->kh_matKhau):$kh->kh_matKhau;
            $kh->px_ma = $request->px_ma;
            $kh->vt_ma = $request->vt_ma;
            $kh->updated_at = Carbon::now();
            $kh->kh_trangThai = 1;
            $kh->save();
            $kh_dc = DiaChi::where('kh_ma', $id)->orderBy('created_at')->first();
            if(!empty($kh_dc)){
            $kh_dc->dc_ten = $request->dc_ten;
            $kh_dc->updated_at = Carbon::now();
            $kh_dc->save();
            }else{
                $kh_dcmoi = new DiaChi();
                $kh_dcmoi->dc_ten = $request->dc_ten;
                $kh_dcmoi->created_at = Carbon::now();
                $kh_dcmoi->save();
            }
            return redirect(route('admin.khachhang.edit',$kh->kh_ma))
            ->with('alert-info', 'Khách hàng sửa đổi thành công với ID: ' . $kh->kh_ma);
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
        $this->authorize('delete',KhachHang::class);
        $kh= KhachHang::where('kh_ma',$id)->first();
        $kh-> delete();
    }
    public function BulkAction(Request $request)
    {
        $this->authorize('update',KhachHang::class);
       $action=$request->action;
       $datetime = Carbon::now();
       $ids = $request->get('ids'); 
       if($action != 0){
           if($action == 1){
               $setupdate = KhachHang::whereIn('kh_ma',$ids)->update(['kh_trangThai' => '1','updated_at' => $datetime ]);
           }elseif($action == 2){
               $setupdate = KhachHang::whereIn('kh_ma',$ids)->update(['kh_trangThai' => '2','updated_at' => $datetime]);
           }elseif($action == 3){
               $setupdate = KhachHang::whereIn('kh_ma',$ids)->update(['kh_trangThai' => '3','updated_at' => $datetime]);
           }    
       }
       //return redirect(route('admin.sanpham.index'))->with('alert-info','Xóa thành công sản phẩm với ID_SP:'.$ids);

    }
}
