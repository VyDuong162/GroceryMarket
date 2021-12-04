@extends('frontend.layouts.master')
@section('title')
Shoping cart
@endsection

@section('custom-css')
<style>
    .text_trangthai {
        font-size: 12px !important;
    }

    textarea {
        border: 1px solid black !important;
    }
    .container .post{
  display: none;
}
.hidden{
    display: none;
}
.container .text{
    font-size: 20px;
    color: #198754;
    font-weight: bolder;
}
.container .edit{
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 16px;
  color: green;
  font-weight: 400;
  cursor: pointer;
}
.container .edit:hover{
  text-decoration: underline;
}
.container .star-rating input{
  display: none;
}
.star-rating label{
  font-size: 20px;
  color: #444;
  padding: 10px;
  float: right;
  transition: all 0.2s ease;
}
input:not(:checked) ~ label:hover,
input:not(:checked) ~ label:hover ~ label{
  color: #fd4;
}
input:checked ~ label{
  color: #fd4;
}
input#rate-5:checked ~ label{
  color: #fe7;
  text-shadow: 0 0 20px #952;
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
                        <li class="breadcrumb-item active" aria-current="page">Đơn hàng của tôi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container">
        <div class="row">
             @include('frontend.layouts.partials.dasboards-customer')
            <div class="col-lg-9 col-md-8" ng-controller="danhgiaController">
                        <div class="rating col-md-12 mt-3">
                            <h3>Đánh giá</h3> 
                            <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">STT</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Đánh giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ctdh as $index => $ct)
                                       
                                        <tr >
                                            <th scope="row">{{ $index+1 }}  </th>
                                            <td>
                                                @if(!file_exists('storage/products/'.$ct->sp_anhDaiDien))
                                          
                                                <img src="{{ asset('themes/gambo/images/product/big-1.jpg') }}" height="100px" alt="hinhdaidien">
                                                <span>{{ $ct->sp_ten }}  </span>
                                          
                                            @else
                                            <img src="{{ asset('storage/products/'.$ct->sp_anhDaiDien) }}" height="50px" alt="hinhdaidien"><br>
                                                <span>{{ $ct->sp_ten }} </span>
                                            @endif
                                          </td>
                                            <td>
                                            <button type="button" ng-click="rating('{{$dh->dh_ma}}','{{$ct->sp_anhDaiDien}}','{{$ct->sp_ten}}','{{$ct->sp_ma}}','{{$cuahang->chth_ma}}')" class="btn btn-primary" title="Đánh giá" data-toggle="modal" data-target="#DanhGiaModal">Đánh giá</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>              
                        </div>
                        <!-- Đánh giá -->
                        <div class="modal fade" id="DanhGiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="container">
                                        <div class="post">
                                            <div class="text">Cảm ơn bạn đã đánh giá</div>
                                            <div class="edit"><i class="fas fa-info-circle"></i></div>
                                        </div>
                                        <form name="frmDanhGia" id="frmDanhGia" ng-submit="createRating()" class="form" novalidate> 
                                            <div class="col-md-12">
                                                <div class="row">        
                                                    <div class="col-md-4">
                                                    
                                                    <img src="/storage/products/<%sp_anhDaiDien%>" height="120px" alt="hinhdaidien"><br>
                                                        <span><% sp_ten %></span>
                                                    </div>
                                                
                                                    <div class="col-md-8">
                                                        
                                                        <div class="star-rating">
                                                                <input type="radio" name="rate" id="rate-5" value="5" ng-model="danhgia.rate">
                                                                <label for="rate-5" class="fas fa-star"></label>
                                                                <input type="radio" name="rate" id="rate-4" value="4" ng-model="danhgia.rate">
                                                                <label for="rate-4" class="fas fa-star"></label>
                                                                <input type="radio" name="rate" id="rate-3" value="3" ng-model="danhgia.rate">
                                                                <label for="rate-3" class="fas fa-star"></label>
                                                                <input type="radio" name="rate" id="rate-2" value="2" ng-model="danhgia.rate">
                                                                <label for="rate-2" class="fas fa-star"></label>
                                                                <input type="radio" name="rate" id="rate-1" value="1" ng-model="danhgia.rate">
                                                                <label for="rate-1" class="fas fa-star"></label>
                                                                
                                                                <input type="text" name="sp_ma" ng-model="danhgia.sp_ma"  value="{{ old('danhgia.sp_ma','<% sp_ma %>') }}">
                                                                <input type="text" name="dh_ma" ng-model="danhgia.dh_ma" value="{{ old('danhgia.sp_ma','<% dh_ma %>') }}">
                                                                <input type="text" name="chth_ma" ng-model="danhgia.chth_ma" value="{{ old('danhgia.sp_ma','<% chth_ma %>') }}" >
                                                            <textarea name="dg_noidung" id="dg_noidung" ng-model="danhgia.dg_noidung" cols="30" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    </div>
    @endsection

    @section('custom-scripts')
    <script src="{{ asset('js/frontendController.js') }}"></script>
    <script>
        const btn = document.querySelector("button");
      const post = document.querySelector(".post");
      const widget = document.querySelector(".star-rating");
      const editBtn = document.querySelector(".edit");
      btn.onclick = ()=>{
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = ()=>{
          widget.style.display = "block";
          post.style.display = "none";
        }
        return false;
      }
        function remove_background(sp_ma){
            for(var count=1; count <=5; count++){
                $('#'+sp_ma+'-'+count).css('color','#ccc');
            }
        }
        //hover chuột
        $(document).on('mouseenter', '.rating', function(){
            var index = $(this).data("index");
            var sp_ma = $(this).data("sp_ma");
            remove_background(sp_ma);
            for(var count=1; count <=index; count++){
                $('#'+sp_ma+'-'+count).css('color','#ffcc00');
            }
        });
        $(document).on('mouseleave', '.rating', function(){
            var index = $(this).data("index");
            var sp_ma = $(this).data("sp_ma");
            remove_background(sp_ma);
            for(var count=1; count <=index; count++){
                $('#'+sp_ma+'-'+count).css('color','#ffcc00');
            }
        });
        $(document).on('click', '.rating', function(){
            var index = $(this).data("index");
            var sp_ma = $(this).data("sp_ma");
            
            remove_background(sp_ma);
            for(var count=1; count <=index; count++){
                $('#'+sp_ma+'-'+count).css('color','#ffcc00');
            }
        });
        $(document).ready(function(){
           
            $('#frm').submit(function(e) {
            e.preventDefault();
       
            var index = $('input[name="rate"]:checked').val();
       
            var sp_ma = $('input[name="sp_ma"]').val();
            var chth_ma = $('input[name="chth_ma"]').val();
            var dh_ma = $('input[name="dh_ma"]').val();
            var _token=$('input[name="_token"]').val();
            $.ajax({
                method: "POST",
                url: "{{ route('frontend.luuDanhGia') }}",
               
                datajson:{
                    index:index,
                    sp_ma :sp_ma,
                    chth_ma:chth_ma,
                    dh_ma:dh_ma,
                    _token:_token
                },
                success: function(data)
                {
                    post.style.display = "block"; 
                    $('.form').addClass("hidden");
                   
                }
                });
            });
        })
       
    </script>
    <script>
        app.controller('danhgiaController', function($scope, $http) {
           
            $scope.rating = function(dh_ma,sp_anhDaiDien,sp_ten,sp_ma,chth_ma) {
                $scope.dh_ma=dh_ma;
                $scope.sp_anhDaiDien=sp_anhDaiDien;
                $scope.sp_ten=sp_ten;
                $scope.sp_ma=sp_ma;
                $scope.chth_ma=chth_ma;
                $scope.danhgia ={dh_ma:dh_ma ,sp_ma:sp_ma,chth_ma:chth_ma};
            }
            $scope.createRating =function(){
             
                var data = $.param($scope.danhgia);
                console.log(data);
                $http({
                    method:"POST",
                    url: "{{ route('frontend.luuDanhGia') }}",
                    data:data,
                    headers :{'Content-type':'application/x-www-form-urlencoded'}
                }).then(function successCallback(response) {
                    console.log(response);
                    post.style.display = "block"; 
                    $('.form').addClass("hidden");
                    window.location.reload();
                }, function errorCallback(response) {
                    console.log("xảy ra lỗi",response);
                });
              
            }
        });
    </script>
@endsection