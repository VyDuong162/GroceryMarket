<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ChiTiet_DonHang;
use App\Models\DiaChi;
use App\Models\DonGia_MatHang;
use App\Models\DonHang;
use App\Models\KhachHang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.shopping-cart');
    }
    public function checkout()
    {
        if(Auth::check()){
            $kh_ma =Auth::user()->kh_ma; 
            $thongtinkh =KhachHang::find($kh_ma);
            $diachi =DiaChi::where('kh_ma',$kh_ma)->orderBy('created_at')->get();
            return view('frontend.pages.checkout')
                ->with('thongtinkh',$thongtinkh)
                ->with('diachi',$diachi);
        }else{
            $thongtinkh = new KhachHang();
            $thongtinkh->kh_hoTen = '';
            $thongtinkh->kh_soDienThoai = '';
            $thongtinkh->kh_email = '';
            return view('frontend.pages.checkout')
                ->with('thongtinkh',$thongtinkh);
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
        
        if(Auth::check()){
            $kh_ma=Auth::user()->kh_ma;
            $arr = collect([]);   
            foreach($request->datagh['items'] as $index => $item){
                $arr->push($item['id']);
            }
            $ct = DonGia_MatHang::whereIn('sp_ma',$arr)->distinct()->get('chth_ma');  
             //lay cua hang tap hoa
            
             foreach($ct as $index => $ch){
                $dh = new DonHang();
                $dh->kh_ma = $kh_ma;
                $dh->chth_ma = $ch->chth_ma;
                $dc=DiaChi::where('dc_ma',$request->datakh['kh_diaChi'])->get('dc_ten');
                $dh->dh_diaChi = $dc[0]['dc_ten']; 
                $dh->dh_soDienThoai=$request->datakh['kh_soDienThoai'];
                
                if(!empty($request->datakh['kh_email'])){
                    $dh->dh_email = $request->datakh['kh_email'];
                }    
              
                $dh->dh_trangThai = 0;           
                $dh->dh_ghiChu = $request->datakh['ngaygiao']. ' - '.$request->datakh['giogiao'];
                $dh->pttt_ma = $request->datakh['paymentmethod'];
                $dh->save();
                $giatri =0;
                foreach($request->datagh['items'] as $index => $item){
                    $dg = DonGia_MatHang::where('sp_ma',$item['id'])->get('chth_ma'); 
                    if(!empty($dg) && ($dg[0]['chth_ma'] == $ch->chth_ma)){
                        $ctdh = new ChiTiet_DonHang();
                        $ctdh->dh_ma = $dh->dh_ma;
                        $ctdh->sp_ma = $item['id'];
                        $ctdh->ctdh_soLuong = $item['quantity'];
                        $ctdh->ctdh_giaBan = $item['price'];  
                        $ctdh->created_at = Carbon::now();
                        $ctdh->save();                   
                        $giatri = $giatri+($item['price']*$item['quantity']);     
                    }
                }
                $dh->dh_giaTri=$giatri;
                $dh->save();
            } 
            return "hoàn thành đặt hàng";
        }else{
            $kh = new KhachHang();
            $kh->kh_hoTen = $request->datakh['kh_hoTen'];
            $kh->kh_soDienThoai = $request->datakh['kh_soDienThoai'];
            if(!empty($request->datakh['kh_email'])){
                $kh->kh_email = $request->datakh['kh_email'];
            }     
            $kh->px_ma = $request->datakh['px_ma'];
            $kh->vt_ma = 3;
            $kh->kh_trangThai=1;
            $kh->created_at = Carbon::now();
            $kh->save();
            $arr = collect([]);   
            foreach($request->datagh['items'] as $index => $item){
                $arr->push($item['id']);
            }
            $ct = DonGia_MatHang::whereIn('sp_ma',$arr)->distinct()->get('chth_ma');  
           
            //lay cua hang tap hoa
            foreach($ct as $index => $ch){
                $dh = new DonHang();
                $dh->kh_ma = $kh->kh_ma;
                $dh->chth_ma = $ch->chth_ma;
             
                $dh->dh_diaChi = $request->datakh['kh_diaChi']; 
                $dh->dh_soDienThoai=$request->datakh['kh_soDienThoai'];
                if(!empty($request->datakh['kh_email'])){
                    $dh->dh_email = $request->datakh['kh_email'];
                }    
              
                $dh->dh_trangThai = 0;           
                $dh->dh_ghiChu = $request->datakh['ngaygiao']. ' - '.$request->datakh['giogiao'];
                $dh->pttt_ma = $request->datakh['paymentmethod'];
                $dh->save();
                $giatri =0;
                foreach($request->datagh['items'] as $index => $item){
                    $dg = DonGia_MatHang::where('sp_ma',$item['id'])->get('chth_ma'); 
                    if(!empty($dg) && ($dg[0]['chth_ma'] == $ch->chth_ma)){
                        $ctdh = new ChiTiet_DonHang();
                        $ctdh->dh_ma = $dh->dh_ma;
                        $ctdh->sp_ma = $item['id'];
                        $ctdh->ctdh_soLuong = $item['quantity'];
                        $ctdh->ctdh_giaBan = $item['price'];  
                        $ctdh->created_at = Carbon::now();
                        $ctdh->save();                   
                        $giatri = $giatri+($item['price']*$item['quantity']);     
                    }
                }
                $dh->dh_giaTri=$giatri;
                $dh->save();
            } 
            return "hoàn thành đặt hàng";
        
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
