@extends('frontend.layouts.master')
@section('title')
Shoping cart
@endsection

@section('custom-css')
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="clearfix">
                    <h1 class="float-start display-3 me-4">401</h1>
                    <h4 class="pt-3">Xin lỗi! Không thể truy cập.</h4>
                    <p class="text-medium-emphasis">Bạn không có quyền truy cập trang này!!</p>
                </div>
                <div class="input-group"><span class="input-group-text">
                       Bạn có thể trở về <a href="{{ route('frontend.index') }}" style="margin-left: 10px; margin-right: 10px;"> <i class="fas fa-home "></i> Trang chủ </a> tìm kiếm sản phẩm
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
<script>
    app.controller('locationController', function($scope, $http) {
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
            window.location.href = "{{ route('frontend.shop') }}?ttp_ma=" + tp_ma;
        }
    });
</script>
@endsection