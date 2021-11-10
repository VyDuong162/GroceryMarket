@extends('frontend.layouts.master')
@section('title')
Shoping cart
@endsection

@section('custom-css')
<style>
    .main-gambo-model {
 
    background-image:none;
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
                        <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Địa chỉ của tôi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container"  ng-controller="diachiController">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="left-side-tabs">
                    <div class="dashboard-left-links">
                        <a href="dashboard_overview.html" class="user-item"><i class="uil uil-apps"></i>Bảng điều khiển</a>
                        <a href="my-orders" class="user-item "><i class="uil uil-box"></i>Đơn hàng của tôi</a>
                        <a href="dashboard_my_rewards.html" class="user-item"><i class="uil uil-gift"></i>Khuyến mãi của tôi
                        </a>
                        <a href="dashboard_my_wallet.html" class="user-item"><i class="uil uil-wallet"></i>Ví của tôi
                        </a>
                        <a href="my-wishlist" class="user-item "><i class="uil uil-heart"></i>Sản phẩm yêu thích</a>
                        <a href="my-address" class="user-item active"><i class="uil uil-location-point"></i>Địa chỉ</a>
                        <a href="sign_in.html" class="user-item"><i class="uil uil-exit"></i>Đăng xuất</a>
                    </div>
                </div>
            </div>
            <div id="address_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
                <div class="modal-dialog category-area" role="document">
                    <div class="category-area-inner">
                        <div class="modal-header">
                            <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                                <i class="uil uil-multiply"></i>
                            </button>
                        </div>
                        <div class="category-model-content modal-content">
                            <div class="cate-header">
                                <h4><% frmtitle %></h4>
                            </div>
                            <div class="add-address-form">
                                <div class="checout-address-step">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form name="frmDiaChi" class="">
                                                <div class="address-fieldset">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Nhập địa chỉ cụ thể</label>
                                                                <input id="dc_ten" name="dc_ten" type="text" class="form-control" ng-model="diachi.dc_ten" placeholder="Nhập đầy đủ: số nhà - đường/(phường xã)- quận/huyện- tỉnh/tp" ng-required="true" ng-minlength="5" ng-maxlength="100" ng-class="frmDiaChi.dc_ten.$touched?frmDiaChi.dc_ten.$invalid?'form-control is-invalid':'form-control is-valid':'form-control'">
                                                                <div class="invalid-feedback">
                                                                    <span class="error" ng-show="frmDiaChi.dc_ten.$error.required">Vui lòng nhập địa chỉ cụ thể</span>
                                                                    <span class="error" ng-show="frmDiaChi.dc_ten.$error.minlength">Địa chỉ phải >= 5 ký tự</span>
                                                                    <span class="error" ng-show="frmDiaChi.dc_ten.$error.maxlength">Địa Chỉ phải <= 100 ký tự</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 mt-3">
                                                            <div class="form-group mb-0">
                                                                <div class="address-btns">
                                                                    <button class="save-btn14 hover-btn" ng-disabled="frmDiaChi.$invalid" ng-click="save(state,id)">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tab">
                                <h4><i class="uil uil-location-point"></i>Địa chỉ</h4>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="pdpt-bg">
                                <div class="pdpt-title">
                                    <h4>Địa chỉ của tôi</h4>
                                </div>
                                <div class="address-body">
                                    <a href="#" class="add-address hover-btn" data-toggle="modal" data-target="#address_model" ng-click="modal('add')">Thêm mới</a>
                                    @if($soluong > 0)
                                    @foreach($dsDiaChi as $dc)
                                    <div class="address-item">
                                        <div class="address-icon1">
                                            <i class="uil uil-home-alt"></i>
                                        </div>
                                        <div class="address-dt-all">
                                            <p>{{ $dc->dc_ten }}</p>
                                            <ul class="action-btns">
                                                <li><a href="#" ng-click="modal('edit',{{$dc->dc_ma}})" data-toggle="modal" data-target="#address_model" class="action-btn"><i class="uil uil-edit"></i></a></li>
                                                @if($loop->index > 0)
                                                <li><a href="#" class="action-btn" ng-click="confirmDelete({{$dc->dc_ma}})"><i class="uil uil-trash-alt"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="{{ asset('js/frontendController.js') }}"></script>
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
    app.controller('diachiController', function($scope, $http) {
       
        $scope.modal = function(state,id){
            $scope.state = state;
            switch (state){
                case "add":
                    $scope.frmtitle = "Thêm mới địa chỉ";
                    break;
                case "edit":
                    $scope.frmtitle = "Chỉnh sửa địa chỉ";
                    $scope.id = id;
                    $http({
                    method:'GET',
                    url: "{{url('my-address/edit/')}}/"+id,
                    }).then(function successCallback(response) {
                        console.log(response.data);
                        $scope.diachi = response.data;
                    }, function errorCallback(response) {
                        console.log("xảy ra lỗi");
                    });
                    break;
                default:
                    break;
            }
     
        }
        $scope.save = function(state,id){
            if(state =="add"){
                var data = $.param($scope.diachi);
                $http({
                    method:'POST',
                    url: "{{ route('frontend.myaddress.store') }}",
                    data:data,
                    headers :{'Content-type':'application/x-www-form-urlencoded'}
                }).then(function successCallback(response) {
                    console.log(response);
                    window.location.reload();
                }, function errorCallback(response) {
                    console.log("xảy ra lỗi");
                });
                
            }
            if(state =="edit"){
                var data = $.param($scope.diachi);
                $http({
                    method:'POST',
                    url: "{{ url('my-address/update/') }}/"+id,
                    data:data,
                    headers :{'Content-type':'application/x-www-form-urlencoded'}
                }).then(function successCallback(response) {
                    console.log(response);
                    window.location.reload();
                }, function errorCallback(response) {
                    console.log("xảy ra lỗi");
                });
                
            }
        }
        $scope.confirmDelete = function(id){
            Swal.fire({
                title: 'Bạn có chắn xóa địa chỉ này không?',
                text: "không thể phục hồi lại",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý'
                }).then((result) => {
                if (result.isConfirmed) {
                        $http({
                        method: 'GET',
                        url: "{{ url('my-address/delete/') }}/" + id,
                    }).then(function successCallback(response) {
                        window.location.reload();
                    }, function errorCallback(response) {
                        console.log('Có lỗi xảy ra!');
                    });
                }
                
            });
        }
    });
</script>

@endsection