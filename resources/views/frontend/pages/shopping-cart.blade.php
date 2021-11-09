@extends('frontend.layouts.master')
@section('title')
Shoping cart
@endsection

@section('custom-css')
@endsection

@section('main-content')
<div class="section145">
    <div class="container">
        <ngcart-cart template-url="{{ asset('vendors/ngCart/template/ngCart/cart.html') }}"></ngcart-cart>
       
    </div>
</div>


@endsection

@section('custom-scripts')
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
@endsection