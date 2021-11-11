@extends('print.layouts.paper')

@section('title')
In hóa đơn
@endsection
@section('paper-size')
A5
@endsection
@section('custom-css')

<style>
    * {
        font-size: 13px;
        font-family: DejaVu Sans, sans-serif;
    }

    td {
        vertical-align: top;
        line-height: 14px;
    }

    table {
        page-break-inside: auto
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto
    }

    thead {
        display: table-header-group
    }

    tfoot {
        display: table-footer-group
    }

    .page-break {
        page-break-after: always;
    }
</style>
<script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection
@section('paper-class')
A4
@endsection
@section('content')
<section class="sheet padding-10mm" style="margin:auto;">
    <!-- thông báo -->
    <table border="0" width="100%" cellspacing="0">
        <tbody>
            <tr align="center">
                <h3 align="center">Chân thành cảm ơn quý khách đã đặt hàng tại TapHoaOnline24G</h3>
            </tr><br>   
            <tr>
                <td align="center"><img src="{{asset('themes/gambo/images/avatar/default_chth.jpg')}}" width="100px" alt="logo"></td>
                <td align="center" style="color:red; text-transform: uppercase;">
                    
                    <h1>Hóa đơn giá trị gia tăng</h1>
                    <small>Ngày {{$hd->hd_ngayLap->addHours(24)->day}} tháng {{$hd->hd_ngayLap->addHours(24)->month}} năm {{$hd->hd_ngayLap->addHours(24)->year}}</small> <br>
                    <small>(Hóa đơn điện tử )</small>
                </td>
                <td>
                    Mẫu số: <b>GTKH01/01</b><br>
                    Ký số: <b>BC/01</b><br>
                    số: <b style="color:brown;">111233</b>
                </td>
            </tr>   
        </tbody>
    </table>
        <!-- Thông tin hóa đơn -->
        <p><i><u><h4 style="font-size:16px;">Thông tin hóa đơn</h4></u></i></p>
        <table border="0" width="50%" cellspacing="0">
            <tbody>
                <tr>
                    <td><b>Số hóa đơn:</b> #{{$hd->hd_ma}}</td>
                </tr>
                <tr>
                    <td><b>Ngày lập: </b>{{ $hd->hd_ngayLap->addHours(24)->format('d-m-Y H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <p><i><u><h4 style="font-size:16px;">Thông tin đơn hàng</h4></u></i></p>
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td><b>Ngày đặt:</b> {{$dh->dh_taoMoi}}</td> 
                </tr>
               
                <tr>
                   <td align="left">
                   <br>
                        <b>Thông tin cửa hàng:</b> <br><br>

                        <b>Tại cửa hàng :</b>{{$dh->cuahangtaphoa->chth_ten}} <br><br>

                        <b>SDT          :</b>{{ $cuahang->phoneNumber($cuahang->chth_soDienThoai) }} <br><br>

                        <b>Email        :</b>{{ $cuahang->chth_email }} <br><br>

                        <b>Địa chỉ      :</b>{{ $cuahang->chth_diaChi }} <br><br>
                        <b>Mã số thuế   :</b>1234566754
                   </td>
                  
                   <td align="left">
                      
                            <b>Thông tin khách hàng:</b> <br><br>
                            <b>Họ tên  :</b> {{$dh->khachhang->kh_hoTen}} <br><br>
                            <b>SDT     :</b> {{$dh->phoneNumber($dh->dh_soDienThoai)}} <br><br>
                            <b>Email   :</b>{{$dh->phoneNumber($dh->dh_email)}} <br><br>
                            <b>Địa chỉ :</b> {{$dh->dh_diaChi}}
                   </td>
                </tr>
                <tr>
                    <td></td>
                   <td><b>Hình thức thanh toán:</b>{{ $dh->phuongthucthanhtoan->pttt_ten }}</td>  <br>
                </tr>
            </tbody>
        </table>
        <hr>
        <?php $phi = 0 ?>
        <p><i><u><h4 style="font-size:16px;">Chi tiết đơn hàng</h4></u></i></p>
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th style="width:10px">STT</th>
                    <th>Sản phẩm</th>
                    <th style="width:150px" class="center">Giá</th>
                    <th style="width:150px" class="center">Số lượng</th>
                    <th style="width:100px" class="center">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php $tong = 0 ?>
                @if(!empty($ctdh))
                @foreach($ctdh as $sp)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <a href="#" target="_blank">{{ $sp->sanpham->sp_ten }}</a>
                    </td>
                    <td class="center">{{ number_format($sp->ctdh_giaBan,'0',',','.')}} <small>đ</small></td>
                    <td class="center">{{ $sp->ctdh_soLuong }}</td>
                    <?php $tong += $sp->ctdh_giaBan * $sp->ctdh_soLuong ?>
                    <td class="center">{{ number_format(($sp->ctdh_giaBan * $sp->ctdh_soLuong),'0',',','.' ) }} <small>đ</small></td>
                </tr>
                @endforeach
                @endif
                <tr >
                    <td colspan="4"><b>Tổng tạm:</b></td>
                    <td>{{ number_format($tong,'0',',','.') }} <small>đ</small></td>
                </tr>
                <tr >
                    <td colspan="4"><b>Phí vận chuyển:</b></td>
                    <td>{{ number_format($phi,'0',',','.') }} <small>đ</small></td>
                </tr>
                <tr >
                    <td colspan="4"><b>tổng tiền:</b></td>
                    <td>{{ number_format($hd->hd_giaTri,'0',',','.') }} <small>đ</small></td>
                </tr>
            </tbody>
        </table>
        <!-- Thông tin Footer -->
        <br />
        <table border="0" width="100%"  cellspacing="0">
            <tbody>
                <tr>
                    <td> 
                        <b>Người mua hàng</b><br><br>
                        {{$dh->khachhang->kh_hoTen}}
                       
                    </td>
                    <td> <b>Người bán hàng</b> <br><br>
                        {{$dh->cuahangtaphoa->chth_ten}}
                       
                    </td>
                </tr> 
                <tr align="center">
                    <td >
                    <br>
                        <small>Xin cám ơn Quý khách đã ủng hộ Cửa hàng, Chúc Quý khách An Khang, Thịnh Vượng!</small>
                    </td>
                </tr>
            </tbody>
        </table>
   
</section>

@endsection