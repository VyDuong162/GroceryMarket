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
.container .text{
  font-size: 25px;
  color: #fe7;
  font-weight: 500;
}
.container .edit{
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 16px;
  color: #fe7;
  font-weight: 500;
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
            <div class="col-lg-3 col-md-4">
                <div class="left-side-tabs">
                    <div class="dashboard-left-links">
                        <a href="dashboard_overview.html" class="user-item"><i class="uil uil-apps"></i>Bảng điều khiển</a>
                        <a href="my-orders" class="user-item active"><i class="uil uil-box"></i>Đơn hàng của tôi</a>
                        <a href="dashboard_my_rewards.html" class="user-item"><i class="uil uil-gift"></i>Khuyến mãi của tôi
                        </a>
                        <a href="dashboard_my_wallet.html" class="user-item"><i class="uil uil-wallet"></i>Ví của tôi
                        </a>
                        <a href="my-wishlist" class="user-item"><i class="uil uil-heart"></i>Sản phẩm yêu thích</a>
                        <a href="my-address" class="user-item"><i class="uil uil-location-point"></i>Địa chỉ</a>
                        <a href="javascript:$('#logout-form').submit();" class="user-item"><i class="uil uil-exit"></i>Đăng xuất</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8" ng-controller="donhangController">
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tab">
                                <h4><i class="uil uil-box"></i>Đơn hàng</h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="track-order">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h4>Theo dõi đơn hàng</h4>
                                    </div>
                                    <div class="col-md-6 " style="text-align: end;">
                                        <button type="submit" class="btn btn-secondary" ng-click="dhtrangthai('all')">Xem lịch sử đơn hàng</button>
                                    </div>
                                </div>
                                <div class="bs-wizard" style="border-bottom:0;">
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Chờ xác nhận</div>
                                        <input type="radio" id="trangthai0" name="trangthai" ng-model="trangthai" value="0" hidden>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="javascript:void(0)" ng-click="dhtrangthai(0)" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Hủy</div>
                                        <input type="radio" id="trangthai1" name="trangthai" ng-model="trangthai" value="1" hidden>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="javascript:void(0)" ng-click="dhtrangthai(1)" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Đang xử lý</div>
                                        <input type="radio" id="trangthai2" name="trangthai" ng-model="trangthai" value="2" hidden>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="javascript:void(0)" ng-click="dhtrangthai(2)" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Đang vận chuyển</div>
                                        <input type="radio" id="trangthai3" name="trangthai" ng-model="trangthai" value="3" hidden>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="javascript:void(0)" ng-click="dhtrangthai(3)" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Đã giao</div>
                                        <input type="radio" id="trangthai4" name="trangthai" ng-model="trangthai" value="4" hidden>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="javascript:void(0)" ng-click="dhtrangthai(4)" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Chờ đánh giá</div>
                                        <input type="radio" id="trangthai5" name="trangthai" ng-model="trangthai" value="5" hidden>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="javascript:void(0)" ng-click="dhtrangthai(5)" class="bs-wizard-dot"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="donhangTable" class="table ucp-table table-hover" ng-show="show">
                            <thead>
                                <tr>
                                    <th style="width:30px">Mã ĐH</th>
                                    <th>Ngày đặt</th>
                                    <th>Trị giá</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>

                                <tr ng-repeat="dh in dsDonHang track by dh.dh_ma">
                                    <td ng-if="dh.dh_ma < 10">DH000<% dh.dh_ma %></td>
                                    <td ng-if="dh.dh_ma >= 10 && dh.dh_ma < 100">DH00<% dh.dh_ma %></td>

                                    <td><%locngay( dh.dh_taoMoi)%></td>
                                    <td><% dh.dh_giaTri | currency:"":0 %> <small>đ</small></td>
                                    <td><% dh.dh_diaChi %></td>
                                    <td><% dh.dh_ghiChu %></td>
                                    <td>

                                        <span ng-if="dh.dh_trangThai == 0" class="badge-item badge-status">Chờ xác nhận</span>

                                        <span ng-if="dh.dh_trangThai == 1" class="badge-item badge-danger">Đã hủy</span>

                                        <span ng-if="dh.dh_trangThai == 2" class="badge-item badge-warning">Đang Xử lý</span>

                                        <span ng-if="dh.dh_trangThai == 3" class="badge-item badge-status">Đang giao</span>

                                        <span ng-if="dh.dh_trangThai == 4" class="badge-item badge-status">Đã giao</span>

                                        <span ng-if="dh.dh_trangThai == 5" class="badge-item badge-secondary">Chờ đánh giá</span>

                                        <span ng-if="dh.dh_trangThai == 6" class="badge-item badge-success">Hoàn thành</span>

                                    </td>
                                    <td class="action-btns">

                                        <a ng-click="orderdetail(dh.dh_ma)" class="view-shop-btn" title="View" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-eye"></i></a>
                                        <button type="submit" ng-if="dh.dh_trangThai == 0" class="edit-btn btn-delete" ng-click="cancel(dh.dh_ma)" title="Hủy"><i class="fas fa-trash-alt"></i></button>
                                        <a ng-if="dh.dh_trangThai >= 4" ng-click="print(dh.dh_ma)" class="btn-print" style="margin-right: 1rem; float: left;" title="Print"><i class="fas fa-print"></i></a>
                                        <a ng-if="dh.dh_trangThai == 5" ng-click="listproductrating(dh.dh_ma)" class="btn-print" style="margin-right: 1rem; margin-top: 1rem; float: left;" title="Đánh giá"><i class="fa fa-star"></i></a>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="rating col-md-12 mt-3" ng-show="star_rating">
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
                                        <tr ng-repeat="ct in ctdh">
                                            <th scope="row"><% $index+1 %></th>

                                            <td ng-if="layanh('storage/products/'+ct.sp_anhDaiDien)==false">
                                                <img src="{{ asset('themes/gambo/images/product/big-1.jpg') }}" height="100px" alt="hinhdaidien">
                                                <span><% ct.sp_ten %></span>
                                            </td>
                                            <td ng-if="layanh('storage/products/'+ct.sp_anhDaiDien)">
                                                <img src="storage/products/<% ct.sp_anhDaiDien %>" height="50px" alt="hinhdaidien"><br>
                                                <span><% ct.sp_ten %></span>
                                            </td>
                                            <td>
                                            <button type="button" ng-click="rating(dh.dh_ma,ct.sp_anhDaiDien,ct.sp_ten,ct.sp_ma,cuahang.chth_ma)" class="btn btn-primary" title="Đánh giá" data-toggle="modal" data-target="#DanhGiaModal">Đánh giá</button>
                                            </td>
                                        </tr>
                                      
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
                                    <div class="modal-body" ng-show="star_rating">
                                    <div class="container">
                                        <div class="post">
                                            <div class="text">Cảm ơn bạn đã đánh giá</div>
                                            <div class="edit"><i class="fas fa-edit"></i></div>
                                        </div>
                                        <form name="frmDanhGia" id="frmDanhGia" > 
                                            @csrf 
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4" ng-if="layanh('storage/products/'+ sp_anhDaiDien )==false">
                                                    <img src="{{ asset('themes/gambo/images/product/big-1.jpg') }}" height="120px" alt="hinhdaidien">
                                                        <span><% sp_ten %></span>
                                                    </div>
                                                    <div class="col-md-4" ng-if="layanh('storage/products/'+ sp_anhDaiDien )">
                                                    <img src="storage/products/<% sp_anhDaiDien %>" height="120px" alt="hinhdaidien"><br>
                                                        <span><% sp_ten %></span>
                                                    </div>
                                                
                                                    <div class="col-md-8">
                                                        <div class="star-rating">
                                                                <input type="radio" name="rate" id="rate-5" value="5">
                                                                <label for="rate-5" class="fas fa-star"></label>
                                                                <input type="radio" name="rate" id="rate-4" value="4">
                                                                <label for="rate-4" class="fas fa-star"></label>
                                                                <input type="radio" name="rate" id="rate-3" value="3">
                                                                <label for="rate-3" class="fas fa-star"></label>
                                                                <input type="radio" name="rate" id="rate-2" value="2">
                                                                <label for="rate-2" class="fas fa-star"></label>
                                                                <input type="radio" name="rate" id="rate-1" value="1">
                                                                <label for="rate-1" class="fas fa-star"></label>
                                                                <input type="hidden" name="sp_ma" value="<% sp_ma %>">
                                                                <input type="hidden" name="dh_ma" value="<% dh_ma %>">
                                                                <input type="hidden" name="chth_ma" value="<% chth_ma %>">
                                                             
                                                            <textarea name="dg_noidung" id="dg_noidung" cols="30" rows="5"></textarea>
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
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng <span ng-if="dh.dh_ma < 10">DH000<% dh.dh_ma %></span>
                                            <span ng-if="dh.dh_ma >= 10 && dh.dh_ma < 100">DH00<% dh.dh_ma %></span>
                                        </h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" ng-show="detail">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="pdpt-bg m-0">
                                                <div class="pdpt-title">
                                                    <h6><b>Ngày đặt:</b><%locngay( dh.dh_taoMoi)%> <br><b>Ghi chú đơn hàng ngày giao:</b><% dh.dh_ghiChu %><br><br>
                                                        <b>Thông tin giao hàng:</b> <br><% dh.kh_hoTen %> - số điện thoại:<% dh.dh_soDienThoai %> <br> <%dh.dh_diaChi%>

                                                    </h6>

                                                </div>
                                                <div class="order-body10">
                                                    <ul class="order-dtsll">
                                                        <li>
                                                            <div class="order-dt47">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr class="text-center">
                                                                            <th scope="col">STT</th>
                                                                            <th scope="col">Sản phẩm</th>
                                                                            <th scope="col">Số lượng</th>
                                                                            <th scope="col">Đơn giá</th>
                                                                            <th scope="col">Thành tiền</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="ct in ctdh">
                                                                            <th scope="row"><% $index+1 %></th>

                                                                            <td ng-if="layanh('storage/products/'+ct.sp_anhDaiDien)==false">
                                                                                <img src="{{ asset('themes/gambo/images/product/big-1.jpg') }}" height="100px" alt="hinhdaidien">
                                                                                <span><% ct.sp_ten %></span>
                                                                            </td>
                                                                            <td ng-if="layanh('storage/products/'+ct.sp_anhDaiDien)">
                                                                                <img src="storage/products/<% ct.sp_anhDaiDien %>" height="100px" alt="hinhdaidien"><br>
                                                                                <span><% ct.sp_ten %></span>
                                                                            </td>
                                                                            <td><% ct.ctdh_soLuong %></td>
                                                                            <td><% ct.ctdh_giaBan | currency:"":0 %>đ</td>
                                                                            <td><% (ct.ctdh_soLuong * ct.ctdh_giaBan) | currency:"":0 %>đ</td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="total-dt">
                                                        <div class="total-checkout-group">
                                                            <div class="cart-total-dil">
                                                                <h4>Tổng tạm</h4>
                                                                <span><% dh.dh_giaTri| currency:"":0 %>đ</span>
                                                            </div>
                                                            <div class="cart-total-dil pt-3">
                                                                <h4>Phí vận chuyển</h4>
                                                                <span>0đ</span>
                                                            </div>
                                                        </div>
                                                        <div class="main-total-cart">
                                                            <h2>Tổng tiền</h2>
                                                            <span><% (dh.dh_giaTri+0) | currency:"":0  %>đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="track-order">
                                                        <h4>Trạng thái đơn hàng </h4>
                                                        <div class="bs-wizard" style="border-bottom:0;">
                                                            <div class="bs-wizard-step" ng-class="dh.dh_trangThai == 1 ?'complete':'disabled'">
                                                                <div class="text-center bs-wizard-stepnum text_trangthai">Hủy</div>
                                                                <div class="progress">
                                                                    <div class="progress-bar"></div>
                                                                </div>
                                                                <a href="#" class="bs-wizard-dot"></a>
                                                            </div>
                                                            <div class="bs-wizard-step" ng-class="dh.dh_trangThai >= 0 ?'complete':'disabled'">
                                                                <div class="text-center bs-wizard-stepnum text_trangthai">Chờ xác nhận</div>
                                                                <div class="progress">
                                                                    <div class="progress-bar"></div>
                                                                </div>
                                                                <a href="#" class="bs-wizard-dot"></a>
                                                            </div>
                                                            <div class="bs-wizard-step " ng-class="dh.dh_trangThai >= 2 ?'complete':'disabled'">
                                                                <div class="text-center bs-wizard-stepnum text_trangthai">Đang xử lý</div>
                                                                <div class="progress">
                                                                    <div class="progress-bar"></div>
                                                                </div>
                                                                <a href="#" class="bs-wizard-dot"></a>
                                                            </div>
                                                            <div class="bs-wizard-step " ng-class="dh.dh_trangThai >= 3 ?'complete':'disabled'">
                                                                <div class="text-center bs-wizard-stepnum text_trangthai">Đang giao</div>
                                                                <div class="progress">
                                                                    <div class="progress-bar"></div>
                                                                </div>
                                                                <a href="#" class="bs-wizard-dot"></a>
                                                            </div>
                                                            <div class="bs-wizard-step " ng-class="dh.dh_trangThai >= 4 ? 'complete':'disabled'">
                                                                <div class="text-center bs-wizard-stepnum text_trangthai">Đã giao</div>
                                                                <div class="progress">
                                                                    <div class="progress-bar"></div>
                                                                </div>
                                                                <a href="#" class="bs-wizard-dot"></a>
                                                            </div>
                                                            <div class="bs-wizard-step" ng-class="dh.dh_trangThai >= 5 ?'complete':'disabled'">
                                                                <div class="text-center bs-wizard-stepnum text_trangthai">Chờ đánh giá</div>
                                                                <div class="progress">
                                                                    <div class="progress-bar"></div>
                                                                </div>
                                                                <a href="#" class="bs-wizard-dot"></a>
                                                            </div>
                                                        </div>
                                                        <div class="alert-offer">
                                                            <img src="images/ribbon.svg" alt="">

                                                        </div>
                                                        <div class="call-bill">
                                                            <div class="delivery-man">
                                                                Liên hệ cửa hàng: - <a href="#"><i class="uil uil-phone"></i><%cuahang.chth_soDienThoai%></a>
                                                            </div>
                                                            <div class="order-bill-slip">
                                                                <a href="#" ng-if="dh.dh_trangThai >= 4" class="bill-btn5 hover-btn">View Bill</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
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
           
            $('#frmDanhGia').submit(function(e) {
            e.preventDefault();
           
            var index = $('input[name="rate"]:checked').val();
       
            var sp_ma = $('input[name="sp_ma"]').val();
            var chth_ma = $('input[name="chth_ma"]').val();
            var dh_ma = $('input[name="dh_ma"]').val();
            var _token=$('input[name="_token"]').val();
            $.ajax({
                method: "POST",
                url: "{{ route('frontend.luuDanhGia') }}",
                data: {
                    index:index,
                    sp_ma :sp_ma,
                    chth_ma:chth_ma,
                    dh_ma:dh_ma,
                    _token:_token
                }, 
                success: function(data)
                {
                    alert("thành công"); 
                }
                });

            });
        })
       
    </script>
    <script>
        app.controller('donhangController', function($scope, $http) {
            $scope.show = false;
            $scope.detail = false;
            $scope.dhtrangthai = function(dh_trangThai) {
                $http({
                    method: 'GET',
                    url: "{{ route('frontend.myorders') }}?dh_trangThai=" + dh_trangThai,
                }).then(function successCallback(response) {
                    console.log(response.data);
                    $scope.dsDonHang = response.data;
                    $scope.show = true;
                }, function errorCallback(response) {
                    console.log('thất bại');
                });
            };
            $scope.orderdetail = function(dh_ma) {
                $http({
                    method: 'GET',
                    url: "{{ route('frontend.orderdetail') }}?dh_ma=" + dh_ma,
                }).then(function successCallback(response) {
                    console.log(response.data.dh);
                    $scope.dh = response.data.dh;
                    $scope.cuahang = response.data.cuahang;
                    $scope.ctdh = response.data.ctdh;
                    $scope.detail = true;
                }, function errorCallback(response) {
                    console.log('thất bại');
                });
            }
            $scope.listproductrating = function(dh_ma) {
                $http({
                    method: 'GET',
                    url: "{{ route('frontend.orderdetailrating') }}?dh_ma=" + dh_ma,
                }).then(function successCallback(response) {
                   
                    $scope.dh = response.data.dh;
                    $scope.cuahang = response.data.cuahang;
                    $scope.ctdh = response.data.ctdh;
                    $scope.star_rating = true;
                }, function errorCallback(response) {
                    console.log('thất bại');
                });
            }
            $scope.rating = function(dh_ma,sp_anhDaiDien,sp_ten,sp_ma,chth_ma) {
                $scope.star_rating = true;
                $scope.dh_ma=dh_ma;
                $scope.sp_anhDaiDien=sp_anhDaiDien;
                $scope.sp_ten=sp_ten;
                $scope.sp_ma=sp_ma;
                $scope.chth_ma=chth_ma;
              
            }

            $scope.cancel = function(dh_ma) {
                Swal.fire({
                    title: 'Bạn có chắn muốn hủy đơn hàng ?',
                    text: "Hủy đơn hàng không thể phục hồi lại",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $http({
                            method: 'GET',
                            url: "{{ route('frontend.orderdestroy') }}?dh_ma=" + dh_ma,
                        }).then(function successCallback(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Hủy thành công',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            window.location.reload();
                        }, function errorCallback(response) {
                            console.log('Có lỗi xảy ra!');
                        });
                    }

                });

            }
            $scope.layanh = function(url) {
                $scope.http = new XMLHttpRequest();
               
                $scope.http.open('HEAD', url, false);
                $scope.http.send();
              
                if ($scope.http.status == 200) {
                    return true;
                } else {
                    return false;
                }
            }
            $scope.trangthai = function(dh_trangThai, tt) {
                console.log(dh_trangThai, tt);
                if (dh_trangThai > tt)
                    return 'complete';
                else if (dh_trangThai == tt)
                    return 'active';
                else
                    return 'disabled';
            }
            $scope.locngay = function(date) {
                $scope.ngay = moment(date).utc().format('DD/MM/YYYY HH:mm:ss');
                return $scope.ngay;
            }
        });
    </script>
    @endsection