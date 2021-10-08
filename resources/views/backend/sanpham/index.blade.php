@extends('backend.layouts.master')

@section('title')
Sản phẩm
@endsection

@section('custom-css')
<style>
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-style: none !important;
    }

    .action-btns {
        display: revert;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-30 page-title">Sản phẩm</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Sản Phẩm</li>
    </ol>
    <div class="row justify-content-between">
        <div class="col-lg-12">
            <a href="{{ route('admin.sanpham.create') }}" class="add-btn hover-btn">Thêm mới</a>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="bulk-section mt-30">
                <div class="input-group">
                    <select id="action" name="action" class="form-control">
                        <option selected>Bulk Actions</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                        <option value="3">Delete</option>
                    </select>
                    <div class="input-group-append">
                        <button class="status-btn hover-btn" type="submit">Apply</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6">
            <div class="bulk-section mt-30">
                <div class="search-by-name-input">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <div class="input-group">
                    <select id="categeory" name="categeory" class="form-control">
                        <option selected>Active</option>
                        <option value="1">Inactive</option>
                    </select>
                    <div class="input-group-append">
                        <button class="status-btn hover-btn" type="submit">Search Area</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card card-static-2 mt-30 mb-30">
                <div class="card-title-2">
                    <h4>All Areas</h4>
                </div>
                <div class="card-body-table">
                    <div class="table-responsive">
                        <table class="table ucp-table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:60px">ID</th>
                                    <th style="width:100px">Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dsSanPham as $sp)
                                <tr>
                                    <td>{{ $sp->sp_ma }}</td>
                                    <td>
                                        @if(!file_exists('storage/products/'.$sp->sp_anhDaiDien))
                                        <div class="cate-img-5">
                                            <img src="{{ asset('themes/gambo/images/product/big-1.jpg') }}" height="100px" alt="hinhdaidien">
                                        </div>
                                        @else
                                        <div class="cate-img-5">
                                            <img src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" width="100px" alt="hinhdaidien" class="list-img">
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $sp->sp_ten}}</td>
                                    <td>{{$sp->loaisanpham->lsp_ten}}</td>
                                    <td>{{$sp->created_at}}</td>
                                    <td>
                                        @if($sp->sp_trangThai == 1)
                                        <span class="badge-item badge-status"> Còn hoạt động</span>
                                        @else
                                        <span class="badge-item badge-status"> Không hoạt động</span>
                                        @endif
                                    </td>
                                    <td class="action-btns">
                                        <a href="{{ route('admin.view.show',['id'=>$sp->sp_ma]) }}" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.view.edit',['id'=>$sp->sp_ma]) }}" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $dsSanPham->links('vendor.pagination.bootstrap-4') }}
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