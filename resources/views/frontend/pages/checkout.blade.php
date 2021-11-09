@extends('frontend.layouts.master')
@section('title')
Shoping cart
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{asset('themes/gambo/css/step-wizard.css') }}" type="text/css">
<link href="{{ asset('vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
<style>
    .checout-address-step .form-control {
        font-size: auto;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #2b2f4c;
        border: auto;
        position: relative;
        padding: auto;
    }

    .error {
        color: red;
    }
</style>
@endsection

@section('main-content')
<div class="gambo-Breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="all-product-grid">
    <div class="container" ng-controller="checkoutController" >
        
        <form id="frmCheckout" name="frmCheckout" ng-submit="thanhtoan()" novalidate>
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div id="checkout_wizard" class="checkout accordion left-chck145">
                        <div class="checkout-step">
                            <div class="checkout-card" id="headingTwo">
                                <span class="checkout-step-number">1</span>
                                <h4 class="checkout-step-title">
                                    <button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Địa chỉ giao hàng</button>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#checkout_wizard">
                                <div class="checkout-step-body">
                                    <div class="checout-address-step">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="product-radio">
                                                        <ul class="product-now" ng-init="dh.address='Nhà'">
                                                            <li style="width:100px">
                                                                <input type="radio" id="ad1" value="Nhà" name="address"  ng-model="dh.address" ng-checked="true">
                                                                <label for="ad1">Nhà</label>
                                                            </li>
                                                            <li style="width:100px">
                                                                <input type="radio" id="ad2" value="Văn phòng" name="address"  ng-model="dh.address">
                                                                <label for="ad2">Văn phòng</label>
                                                            </li>
                                                            <li style="width:100px">
                                                                <input type="radio" id="ad3" value="Địa điểm khác"  name="address" ng-model="dh.address">
                                                                <label for="ad3">Địa điểm khác</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="address-fieldset">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <!-- họ tên khách hàng -->
                                                            <div class="form-group">
                                                                <label class="control-label">Họ tên khách hàng:</label>
                                                                <input type="text" id="kh_hoTen" name="kh_hoTen" ng-model="dh.kh_hoTen" value="{{ !empty($thongtinkh)? old('dh.kh_hoTen',$thongtinkh->kh_hoTen):'' }}" placeholder="họ tên khách hàng" class="form-control input-md" ng-minlength="10" ng-maxlength="100" ng-required=true ng-class="frmCheckout.kh_hoTen.$touched?frmCheckout.kh_hoTen.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                <div class="invalid-feedback">
                                                                    <span class="error" ng-show="frmCheckout.kh_hoTen.$error.required">Vui lòng nhập họ tên</span>
                                                                    <span class="error" ng-show="frmCheckout.kh_hoTen.$error.minlength">Họ tên phải > 10 ký tự</span>
                                                                    <span class="error" ng-show="frmCheckout.kh_hoTen.$error.maxlength">Họ tên phải <= 100 ký tự</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- sdt -->
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Số điện thoại</label>
                                                                <input id="kh_soDienThoai" name="kh_soDienThoai" type="text" ng-model="dh.kh_soDienThoai" value="{{ !empty($thongtinkh)? old('dh.kh_soDienThoai',$thongtinkh->kh_soDienThoai):'' }}" placeholder="Nhập số điện thoại" class="form-control input-md" ng-minlength="10" ng-maxlength="10" ng-required=true ng-class="frmCheckout.kh_soDienThoai.$touched?frmCheckout.kh_soDienThoai.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                <div class="invalid-feedback">
                                                                    <span class="error" ng-show="frmCheckout.kh_soDienThoai.$error.required">Vui lòng nhập số điện thoại</span>
                                                                    <span class="error" ng-show="frmCheckout.kh_soDienThoai.$error.minlength">Số điện thoại phải = 10 ký tự</span>
                                                                    <span class="error" ng-show="frmCheckout.kh_soDienThoai.$error.maxlength">Số điện thoại phải = 100 ký tự</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Địa chỉ email (nếu có)</label>
                                                                <input id="kh_email" class="form-control" name="kh_email" type="email" ng-model="dh.kh_email" value="{{ !empty($thongtinkh)? old('dh.kh_email',$thongtinkh->kh_email):'' }}" placeholder="Nhập địa chỉ email" class="form-control input-md" ng-maxlength="100" ng-email=true ng-class="frmCheckout.kh_email.$touched?frmCheckout.kh_email.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                <div class="invalid-feedback">
                                                                    <span class="error" ng-show="frmCheckout.kh_email.$error.email">Email không đúng định dạng</span>
                                                                    <span class="error" ng-show="frmCheckout.kh_email.$error.maxlength">Email phải <= 100 ký tự</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        @if(!empty(Session::has('user')) && $diachi!='')
                                                        <div class="row col-lg-12" ng-controller="tinhtpController">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Địa chỉ cụ thể</label>
                                                                    <select name="dh_diaChi" id="dh_diaChi" class="form-control" ng-model="dh.kh_diaChi"  ng-required="true" ng-class="frmCheckout.dh_diaChi.$touched?frmCheckout.dh_diaChi.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                        <option value="">chọn địa chỉ giao</option>
                                                                        @foreach($diachi as $index => $dc)
                                                                            @if($index == 0)
                                                                            <option value="{{ $dc->dc_ma }}" ng-selected="selected">{{ $dc->dc_ten }}</option>
                                                                            @else
                                                                            <option value="{{ $dc->dc_ma }}">{{ $dc->dc_ten }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                        <div class="invalid-feedback">
                                                                            <span class="error" ng-show="frmCheckout.dh_diaChi.$error.required">Vui lòng chọn địa chỉ</span>
                                                                        </div>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="row col-lg-12" ng-controller="tinhtpController">
                                                            <div class="col-lg-4 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Tỉnh/Thành phố</label>
                                                                    <select name="ttp_id" id="ttp_id" class="form-control" ng-model="dh.selectttp" ng-change="ontpchange($event.target.value)" ng-required="true" ng-class="frmCheckout.ttp_id.$touched?frmCheckout.ttp_id.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                        <option value="">Chọn tỉnh/Tp</option>
                                                                        <option ng-repeat="ttp in dsTinhTp" value="<% ttp.ttp_ma %>"><% ttp.ttp_ten %></option>
                                                                        <div class="invalid-feedback">
                                                                            <span class="error" ng-show="frmCheckout.ttp_id.$error.required">Vui lòng chọn thành phố</span>
                                                                        </div>
                                                                    </select>

                                                                </div>

                                                            </div>
                                                            <div class="col-lg-4 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Quận/huyện</label>
                                                                    <select name="qh_id" id="qh_id" class="form-control" ng-model="dh.selectqh" ng-change="onqhchange($event.target.value)" ng-required="true" ng-class="frmCheckout.qh_id.$touched?frmCheckout.qh_id.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                        <option value="">Chọn quận huyện</option>
                                                                        <option ng-repeat="qh in dsQuanHuyen" value="<% qh.qh_ma %>"><% qh.qh_ten %></option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        <span class="error" ng-show="frmCheckout.qh_id.$error.required">Vui lòng chọn quận huyện</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Phường/xã</label>
                                                                    <select name="px_ma" id="px_ma" class="form-control" ng-model="dh.px_ma" ng-required="true" ng-class="frmCheckout.px_ma.$touched?frmCheckout.px_ma.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                        <option value="">Chọn phường xã</option>
                                                                        <option ng-repeat="px in dsPhuongXa" value="<% px.px_ma %>"><% px.px_ten %></option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        <span class="error" ng-show="frmCheckout.px_ma.$error.required">Vui lòng chọn phường xã</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Địa chỉ cụ thể</label>
                                                                <input id="dh_diaChi" name="dh_diaChi" type="text" class="form-control" ng-model="dh.kh_diaChi" placeholder="Nhập đầy đủ: số nhà - đường/(phường xã)- quận/huyện- tỉnh/tp" ng-required="true" ng-minlength="5" ng-maxlength="100" ng-class="frmCheckout.dh_diaChi.$touched?frmCheckout.dh_diaChi.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                <div class="invalid-feedback">
                                                                    <span class="error" ng-show="frmCheckout.dh_diaChi.$error.required">Vui lòng nhập địa chỉ cụ thể</span>
                                                                    <span class="error" ng-show="frmCheckout.dh_diaChi.$error.minlength">Địa chỉ phải >= 5 ký tự</span>
                                                                    <span class="error" ng-show="frmCheckout.dh_diaChi.$error.maxlength">Địa Chỉ phải <= 100 ký tự</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @endif
                                                       
                                                    </div>
                                                </div>
                                                <div class="checkout-step-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Chọn ngày và giờ giao</label>
                                                                <div class="date-slider-group">
                                                                    <div class="owl-carousel date-slider owl-theme">
                                                                        <div class="item">
                                                                            <div class="date-now" >
                                                                                <label for="ngaygiao">Ngày</label>
                                                                                <input type="text" id="ngaygiao" name="ngaygiao" ng-model="dh.ngaygiao" ng-required="true" ng-class="frmCheckout.ngaygiao.$touched?frmCheckout.ngaygiao.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                                <span class="error" ng-show="frmCheckout.ngaygiao.$error.required">Vui lòng nhập ngày giao</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="time-radio">
                                                                    <div class="ui form">
                                                                        <div class="grouped fields">

                                                                            <div class="field">
                                                                                <label for="thoigian">Thời gian</label>
                                                                                <select name="giogiao" id="giogiao" ng-model="dh.giogiao" ng-required="true" ng-class="frmCheckout.giogiao.$touched?frmCheckout.giogiao.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                                    <option value="">Chọn thời gian</option>
                                                                                    <option value="8.00AM - 10.00AM" ng-selected="selected">8.00AM - 12.00AM</option>
                                                                                    <option value="12.00PM - 2.00PM">12.00PM - 2.00PM</option>
                                                                                    <option value="2.00PM - 4.00PM">2.00PM - 4.00PM</option>
                                                                                    <option value="4.00PM - 6.00PM">4.00PM - 6.00PM</option>
                                                                                </select>
                                                                                <div class="invalid-feedback">
                                                                                    <span class="error" ng-show="frmCheckout.giogiao.$error.required">Vui lòng chọn thời gian</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="collapsed next-btn16 hover-btn" role="button" data-toggle="collapse" href="#collapseFour">Chọn phương thức thanh toán</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-step">
                            <div class="checkout-card" id="headingFour">
                                <span class="checkout-step-number">2</span>
                                <h4 class="checkout-step-title">
                                    <button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Thanh toán</button>
                                </h4>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#checkout_wizard">
                                <div class="checkout-step-body">
                                    <div class="payment_method-checkout">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="rpt100">
                                                    <ul class="radio--group-inline-container_1" ng-init="dh.paymentmethod=3">
                                                        <li>
                                                            <div class="radio-item_1">
                                                                <input type="radio" id="paymentmethod1" value="3" name="paymentmethod" ng-checked="true" ng-model="dh.paymentmethod">
                                                                <label for="paymentmethod1" class="radio-label_1">Thanh toán trực tiệp</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="radio-item_1">
                                                                <input type="radio" id="paymentmethod2" value="1" name="paymentmethod" ng-model="dh.paymentmethod">
                                                                <label for="paymentmethod2" class="radio-label_1">Thanh toán online</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="form-group return-departure-dts" data-method="3">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pymnt_title">
                                                                <h4>Thanh toán trực tiếp</h4>
                                                                <p>Bạn sẽ trả tiền khi nhận được hàng</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group return-departure-dts" data-method="1">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pymnt_title mb-4">
                                                                <h4>Thanh toán online</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mt-1">
                                                                <label class="control-label">Họ tên người chủ thẻ</label>
                                                                <div class="ui search focus">
                                                                    <div class="ui left icon input swdh11 swdh19">
                                                                        <input class="prompt srch_explore" type="text" name="holdername"  id="holder[name]"  maxlength="64" placeholder="Holder Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mt-1">
                                                                <label class="control-label">Mã thẻ</label>
                                                                <div class="ui search focus">
                                                                    <div class="ui left icon input swdh11 swdh19">
                                                                        <input class="prompt srch_explore" type="text" name="cardnumber" id="card[number]"  maxlength="64" placeholder="Card Number">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--    <div class="col-lg-4">
                                                            <div class="form-group mt-1">
                                                                <label class="control-label">Expiration
                                                                    Month*</label>
                                                                <select class="ui fluid search dropdown form-dropdown" name="card[expire-month]">
                                                                    <option value="">Month</option>
                                                                    <option value="1">January</option>
                                                                    <option value="2">February</option>
                                                                    <option value="3">March</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">May</option>
                                                                    <option value="6">June</option>
                                                                    <option value="7">July</option>
                                                                    <option value="8">August</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group mt-1">
                                                                <label class="control-label">Expiration
                                                                    Year*</label>
                                                                <div class="ui search focus">
                                                                    <div class="ui left icon input swdh11 swdh19">
                                                                        <input class="prompt srch_explore" type="text" name="card[expire-year]" maxlength="4" placeholder="Year">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group mt-1">
                                                                <label class="control-label">CVV*</label>
                                                                <div class="ui search focus">
                                                                    <div class="ui left icon input swdh11 swdh19">
                                                                        <input class="prompt srch_explore" name="card[cvc]" maxlength="3" placeholder="CVV">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                              <!--   <ngcart-checkout service="http" settings="{ url:'order' }" template-url="{{ asset('vendors/ngCart/template/ngCart/checkout.html') }}">
                                                    <button class="next-btn16 hover-btn" ng-disabled="frmCheckout.$invalid">Đặt hàng</button>
                                                </ngcart-checkout> -->
                                                <button class="next-btn16 hover-btn" type="submit"  ng-disabled="frmCheckout.$invalid">Đặt hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <ngcart-cart template-url="{{ asset('vendors/ngCart/template/ngCart/cart-checkout.html') }}"></ngcart-cart>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('custom-scripts')
<script src="{{ asset('vendors/momentjs/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/daterangepicker/daterangepicker.min.js') }}"></script>
<script>
         app.controller('locationController',function($scope,$http){
                    $http({
                    method: 'GET',
                    url: "{{ route('api.tinhtp') }}",
                    }).then(function successCallback(response) {
                        console.log(response);
                        $scope.dsTinhTp = response.data.result;
                    }, function errorCallback(response) {
                        console.log('thất bại');
                    });
                    $scope.timcuahangtheotp = function(tp_ma) {
        window.location.href="{{ route('frontend.shop') }}?ttp_ma="+tp_ma;
         }
                });
    </script>
<script>
    
    app.controller('tinhtpController', function($scope, $http) {
        $http({
            method: 'GET',
            url: "{{ route('api.tinhtp') }}",
        }).then(function successCallback(response) {
            console.log(response.data.result);
            $scope.dsTinhTp = response.data.result;
        }, function errorCallback(response) {
            console.log('thất bại');
        });
        $scope.ontpchange = function() {
            $scope.value = $scope.dh.selectttp;
            $http({
                method: 'GET',
                url: "{{ route('api.quanhuyen') }}?id=" + $scope.value,
            }).then(function successCallback(response) {
                console.log(response.data.result);
                $scope.dsQuanHuyen = response.data.result;
            }, function errorCallback(response) {
                console.log('thất bại');
            });
        }
        $scope.onqhchange = function() {
            $scope.value = $scope.dh.selectqh;
            $http({
                method: 'GET',
                url: "{{ route('api.phuongxa') }}?id=" + $scope.value,
            }).then(function successCallback(response) {
                console.log(response.data.result);
                $scope.dsPhuongXa = response.data.result;
            }, function errorCallback(response) {
                console.log('thất bại');
            });

        }
    });
   
    app.controller('checkoutController', function($scope, $http,ngCart) {
        
        sessionStorage.setItem("kh_ma", "{{ Session::has('user') }}");
       if(sessionStorage.getItem("kh_ma")==''){
        console.log("rỗng");
       }else{
        $scope.dh={kh_hoTen:'{{ $thongtinkh->kh_hoTen }}',kh_soDienThoai:'{{ $thongtinkh->kh_soDienThoai }}',kh_email:'{{ $thongtinkh->kh_email }}',ngaygiao:moment().format("DD-MM-YYYY"),paymentmethod:3,address:"Nhà"};  
           
       }
      
        $scope.thanhtoan = function() {
           // var data = $.param($scope.dh);
            $http({
                method: 'POST',
                url: "{{ route('frontend.order') }}",
                data: {
                    datakh:$scope.dh,
                    datagh:ngCart.toObject()
                },
                header: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function successCallback(response) {
                Swal.fire({  
                     position: 'top-end',   
                     icon: 'success',   
                     title: 'Đơn hàng của bạn đặt thành công!',   
                     showConfirmButton: false,   
                     timer: 2000 });  
                ngCart.empty(); 
                window.location.href ="{{route('home')}}";
            }, function errorCallback(response) {
                console.log('thất bại');
            });
        }


    });
    $(document).ready(function() {
        $('#ngaygiao').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            startDate:  moment().format("DD-MM-YYYY"),
            minDate: moment().format("DD-MM-YYYY"),
            maxDate: moment().add(15, 'days'),
            "locale": {
                "format": "DD/MM/YYYY",
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12",
                ]
            },

        });
    });
</script>
@endsection