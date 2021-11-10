@extends('frontend.layouts.master')
@section('title')
Shoping cart
@endsection

@section('custom-css')
<style>
.text_trangthai{
     font-size: 12px!important;
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
                    <a href="sign_in.html" class="user-item"><i class="uil uil-exit"></i>Đăng xuất</a>
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

                                        <a ng-if="dh.dh_trangThai >= 4" ng-click="print(dh.dh_ma)" class="btn-print" style="float: left;" title="Print"><i class="fas fa-print"></i></a>

                                    </td>
                                </tr>

                            </tbody>
                        </table>

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
                                                    <h6><b>Ngày đặt:</b><%locngay( dh.dh_taoMoi)%>  <br><b>Ghi chú đơn hàng ngày giao:</b><% dh.dh_ghiChu %><br><br>
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
                                                                                <img src="storage/products/<% ct.sp_anhDaiDien %>" height="50px" alt="hinhdaidien"><br>
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
                                                        <div class="progress"><div class="progress-bar"></div></div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                        </div>
                                                        <div class="bs-wizard-step" ng-class="dh.dh_trangThai >= 0 ?'complete':'disabled'">
                                                        <div class="text-center bs-wizard-stepnum text_trangthai">Chờ xác nhận</div>
                                                        <div class="progress"><div class="progress-bar"></div></div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                        </div>                                                     
                                                        <div class="bs-wizard-step " ng-class="dh.dh_trangThai >= 2 ?'complete':'disabled'">
                                                        <div class="text-center bs-wizard-stepnum text_trangthai">Đang xử lý</div>
                                                        <div class="progress"><div class="progress-bar"></div></div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                        </div>
                                                        <div class="bs-wizard-step " ng-class="dh.dh_trangThai >= 3 ?'complete':'disabled'">
                                                        <div class="text-center bs-wizard-stepnum text_trangthai">Đang giao</div>
                                                        <div class="progress"><div class="progress-bar"></div></div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                        </div>
                                                        <div class="bs-wizard-step " ng-class="dh.dh_trangThai >= 4 ? 'complete':'disabled'">
                                                        <div class="text-center bs-wizard-stepnum text_trangthai">Đã giao</div>
                                                        <div class="progress"><div class="progress-bar"></div></div>
                                                        <a href="#" class="bs-wizard-dot"></a>
                                                        </div>
                                                        <div class="bs-wizard-step" ng-class="dh.dh_trangThai >= 5 ?'complete':'disabled'">
                                                        <div class="text-center bs-wizard-stepnum text_trangthai">Chờ đánh giá</div>
                                                        <div class="progress"><div class="progress-bar"></div></div>
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
                                                            <a href="#"  ng-if="dh.dh_trangThai >= 4" class="bill-btn5 hover-btn">View Bill</a>
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
        $scope.trangthai= function(dh_trangThai,tt){
            console.log(dh_trangThai,tt);
            if(dh_trangThai > tt )
                return 'complete';
            else if(dh_trangThai ==tt)
                return 'active';
            else
                return 'disabled';
        }
        $scope.locngay = function(date){
            $scope.ngay = moment(date).utc().format('DD/MM/YYYY HH:mm:ss');
            return $scope.ngay;
        }
    });
</script>
@endsection