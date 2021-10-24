@extends('backend.layouts.master')

@section('title')
Đơn hàng - Chỉnh sửa trạng thái
@endsection

@section('custom-css')
<style>
    .col-md-6 {
        float: right;
    }

    .is-invalid {
        color: red !important;
    }

    .product-imgs img {
        height: 100px;
    }
</style>
@endsection

@section('content')
<h2 class="page-title">Đơn hàng</h2>
<ol class="breadcrumb mb-30">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.donhang.index') }}">Đơn hàng</a></li>
    <li class="breadcrumb-item active">Chỉnh sửa đơn hàng</li>
</ol>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-static-2 mb-30">
            <div class="card-title-2">
                <h2 class="title1458">Đơn hàng</h2>
                @if($dh->dh_ma < 10) <?php $dh_ma = '000' . $dh->dh_ma ?> 
                @elseif($dh->dh_ma > 10 && $dh->dh_ma < 100) <?php $dh_ma = '00' . $dh->dh_ma ?> 
                @endif <span class="order-id">Mã đơn hàng #DH{{ $dh_ma }}</span>
            </div>
            <div class="invoice-content">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="ordr-date">
                            <b>Ngày Đặt :</b>{{$dh->dh_taoMoi}} <br>
                            <b>Tại cửa hàng :</b>{{$dh->cuahangtaphoa->chth_ten}} <br>
                            <b>SDT :</b>{{ $cuahang->phoneNumber($cuahang->chth_soDienThoai) }}<br>
                            <b>Email :</b>{{ $cuahang->chth_email }} <br>
                            <b>Địa chỉ :</b>{{ $cuahang->chth_diaChi }}
                        </div>

                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="ordr-date right-text">
                            <b>Thông Tin khách hàng :</b><br>
                            {{$dh->khachhang->kh_hoTen}}<br>
                            {{$dh->phoneNumber($dh->dh_soDienThoai)}}<br>
                            {{$dh->phoneNumber($dh->dh_email)}}<br>
                            {{$dh->dh_diaChi}}<br>
                        </div>
                    </div>
                    <?php $phi=1000 ?>
                    <div class="col-lg-7 pt-3"><hr>
                        <b>Phương thức thanh toán:</b>{{ $dh->phuongthucthanhtoan->pttt_ten }} <br>
                        <b>Thời gian giao dự kiến:</b>{{ $dh->dh_taoMoi->addHours(24)->format('d/m/Y') }} <br>
                        <b>Phí vận chuyển:</b>    {{ number_format($phi,'0',',','.') }} <small>đ</small>
                    </div>
                    <div class="col-lg-5 right-text">
                        <div class="select-status">
                            <label for="status">Trạng thái đơn hàng hiện tại*</label>
                            <div class="status-active">
                                @if($dh->dh_trangThai == 0)
                                    <span class="badge-item badge-status">Chờ xác nhận</span>
                                    @elseif($dh->dh_trangThai == 1)
                                    <span class="badge-item badge-danger">Đã hủy</span>
                                    @elseif($dh->dh_trangThai == 2)
                                    <span class="badge-item badge-warning">Đang Xử lý</span>
                                    @elseif($dh->dh_trangThai == 3)
                                    <span class="badge-item badge-status">Đang giao</span>
                                    @elseif($dh->dh_trangThai == 4)
                                    <span class="badge-item badge-status">Đã giao</span>
                                    @elseif($dh->dh_trangThai == 5)
                                    <span class="badge-item badge-secondary">Chờ đánh giá</span>
                                    @elseif($dh->dh_trangThai == 6)
                                    <span class="badge-item badge-success">Hoàn thành</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-static-2 mb-30 mt-30">
                            <div class="card-title-2">
                                <h4>Chi tiết đơn hàng</h4>
                            </div>
                            <div class="card-body-table">
                                <div class="table-responsive">
                                    <table class="table ucp-table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width:130px">#</th>
                                                <th>Sản phẩm</th>
                                                <th style="width:150px" class="text-center">Giá</th>
                                                <th style="width:150px" class="text-center">Số lượng</th>
                                                <th style="width:100px" class="text-center">Thành tiền</th>
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
                                                <td class="text-center">{{ number_format($sp->ctdh_giaBan,'0',',','.')  }} <small>đ</small></td>
                                                <td class="text-center">{{ $sp->ctdh_soLuong }}</td>
                                                <?php $tong += $sp->ctdh_giaBan * $sp->ctdh_soLuong ?>
                                                <td class="text-center">{{ number_format(($sp->ctdh_giaBan * $sp->ctdh_soLuong),'0',',','.' ) }} <small>đ</small></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7"></div>
                    <div class="col-lg-5">
                        <div class="order-total-dt">
                            <div class="order-total-left-text">
                                Tạm tổng tiền
                            </div>
                            <div class="order-total-right-text">
                                {{ number_format($tong,'0',',','.') }} <small>đ</small>
                            </div>
                        </div>
                        <div class="order-total-dt">
                            <div class="order-total-left-text">
                                Phí vận chuyển
                            </div>
                            <div class="order-total-right-text">
                                {{ number_format($phi,'0',',','.') }}<small>đ</small>
                            </div>
                        </div>
                        <div class="order-total-dt">
                            <div class="order-total-left-text fsz-18">
                                Tổng tiền
                            </div>
                            <div class="order-total-right-text fsz-18">
                                {{ number_format($tong + $phi,'0',',','.') }}<small>đ</small>
                            </div>
                        </div>
                    </div>
                        <form name="frmEdit" id="frmEdit" method="post" action="{{ route('admin.donhang.update',$dh->dh_ma) }}">
                            <input type="hidden" name="_method" value="PUT" />
                            @csrf
                            <div class="select-status p-0 m-0" >
                                <label for="status">Trạng thái đơn hàng*</label>
                                <div class="input-group">
                                    <select id="dh_trangThai" name="dh_trangThai" class="custom-select">
                                        <option value="">Vui lòng chọn trạng thái đơn hàng</option>
                                        <option selected value="0">Chờ xác nhận</option>
                                        <option value="1">Hủy</option>
                                        <option value="2">Đang xử lý</option>
                                        <option value="3">Đang giao</option>
                                        <option value="4">Đã giao</option>
                                        <option value="5">Chờ đánh giá</option>
                                        <option value="6">Hoàn thành</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="status-btn hover-btn" type="submit">Lưu dữ liệu</button>
                                    </div>
                        </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('custom-scripts')
<script>
    $("#frmEdit").validate({
        rules: {
            dh_trangThai: "required"

        },
        messages: {
            dh_trangThai: "Vui lòng chọn trạng thái"

        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class lỗi
            error.addClass("is-invalid");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }

            // icon classes hợp lệ.
            if (!element.next("span")[0]) {
                $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
            }
        },
        success: function(label, element) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!$(element).next("span")[0]) {
                $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
            $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
            $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
        }
    });
</script>
@endsection