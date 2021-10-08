@extends('backend.layouts.master')

@section('title')

@endsection

@section('custom-css')
@endsection
@section('content')
<h2 class="mt-30 page-title">Shops</h2>
<ol class="breadcrumb mb-30">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="shops.html">Shops</a></li>
    <li class="breadcrumb-item active">Shop view</li>
</ol>
<div class="row">
    <div class="col-lg-5 col-md-6">
        <div class="card card-static-2 mb-30">
            <div class="card-body-table">
                <div class="shopowner-content-left text-center pd-20">
                    <div class="shop_img">
                        <img src="images/product/img-1.jpg" alt="">
                    </div>
                    <ul class="product-dt-purchases">
                        <li>
                            <div class="product-status">
                                Orders <span class="badge-item-2 badge-status">10</span>
                            </div>
                        </li>
                        <li>
                            <div class="product-status">
                                Shop <span class="badge-item-2 badge-status">2</span>
                            </div>
                        </li>
                    </ul>
                    <div class="shopowner-dts">
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Price</span>
                            <span class="right-dt">$15</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Status</span>
                            <span class="right-dt">Active</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Created</span>
                            <span class="right-dt">5 May 2020, 03.45 PM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
@endsection