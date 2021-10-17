@extends('backend.layouts.master')

@section('title')
Dashboard
@endsection

@section('custom-css')
<link href="{{ asset('vendors/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
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
<h2 class="mt-30 page-title">Sản phẩm</h2>
<ol class="breadcrumb mb-30">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.sanpham.index') }}">Sản phẩm</a></li>
    <li class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
</ol>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-static-2 mb-30">
            <div class="card-title-2">
                <h4>Chỉnh sửa sản phẩm</h4>
            </div>
            <div class="card-body-table">
                <div class="news-content-right pd-20">
                    <form name="frmEdit" id="frmEdit" method="post" action="{{ route('admin.sanpham.update',$sp->sp_ma) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT" />
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Cửa hàng tập hóa</label>
                            <select disabled id="chth_ma" name="chth_ma" class="form-control">
                                @foreach($dsCuaHang as $ch)
                               
                                @if($ch->chth_ma == $ch->chth_ma)
                                        <option value="{{ $ch->chth_ma }}" selected>{{ $ch->chth_ten }}</option>
                                        @else
                                        <option value="{{ $ch->chth_ma }}">{{ $ch->chth_ten }}</option>
                                        @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="sp_ten" id="sp_ten" class="form-control" value="{{ old('sp_ten',$sp->sp_ten) }}" placeholder="ví dụ:Cà phê sữa VinaCafé Gold Original 800g">
                        </div>
                        <div class="col-lg-12 col-md-12 p-0">
                            <div class="col-md-6 col-xs-12 p-0">
                                <div class="form-group">
                                    <label class="form-label">Loại sản phẩm</label>
                                    <select id="lsp_ma" name="lsp_ma" class="form-control">
                                        @foreach($dsLoaiSanPham as $lsp)
                                        @if($lsp->lsp_ma == $sp->lsp_ma)
                                        <option value="{{ $lsp->lsp_ma }}" selected>{{ $lsp->lsp_ten }}</option>
                                        @else
                                        <option value="{{ $lsp->lsp_ma }}"> {{ $lsp->lsp_ten }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 p-0">
                                <div class="form-group">
                                    <label class="form-label">Nhà sản xuất</label>
                                    <select id="nsx_ma" name="nsx_ma" class="form-control">
                                        @foreach($dsNhaSanXuat as $nsx)
                                        @if($nsx->nsx_ma == $sp->nsx_ma)
                                        <option value="{{ $nsx->nsx_ma }}" selected>{{ $nsx->nsx_ten }}</option>
                                        @else
                                        <option value="{{ $nsx->nsx_ma }}">{{ $nsx->nsx_ten }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Đơn giá sản phẩm</label>
                            <input class="form-control" name="dgmh_gia" id="dgmh_gia" value="{{ old('dgmh_gia',$dgmh->dgmh_gia) }}">                
                        </div>
                        <div class="form-group">
                            <label class="form-label">Thành phần</label>
                            <textarea class="form-control" name="sp_thanhPhan" id="sp_thanhPhan" cols="20" rows="10">
                            {{ old('sp_thanhPhan',$sp->sp_thanhPhan) }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cách dùng</label>
                            <input type="text" name="sp_cachDung" id="sp_cachDung" class="form-control"  placeholder="Nhập cách dùng sản phẩm" value="{{ old('sp_cachDung',$sp->sp_cachDung) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Khối lượng</label>
                            <input type="text" name="sp_khoiLuong" id="sp_khoiLuong" class="form-control" placeholder="Nhập khối lượng sản phẩm" value="{{ old('sp_khoiLuong',$sp->sp_khoiLuong) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Bảo quản</label>
                            <input type="text" name="sp_baoQuan" id="sp_baoQuan" class="form-control" placeholder="Nhập cách bảo quản sản phẩm" value="{{ old('sp_baoQuan',$sp->sp_baoQuan) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Hạn dùng</label>
                            <input type="text" name="sp_hanDung" id="sp_hanDung" class="form-control" placeholder="Nhập hạn dùng sản phẩm: ví dụ 6 tháng..." value="{{ old('sp_hanDung',$sp->sp_hanDung) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Đối tượng dùng</label>
                            <input type="text" name="sp_doiTuongDung" id="sp_doiTuongDung" class="form-control" placeholder="ví dụ dành cho trẻ trên 5 tuổi" value="{{ old('sp_doiTuongDung',$sp->sp_doiTuongDung) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ghi Chú</label>
                            <input type="text" name="sp_ghiChu" id="sp_ghiChu" class="form-control" placeholder="Nhập lưu ý (nếu có)" value="{{ old('sp_ghiChu',$sp->sp_ghiChu) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Trạng thái </label>
                            <select id="sp_trangThai" name="sp_trangThai" class="form-control">
                                <option value="1" {{ old('sp_trangThai') == 1 ? "selected" : "" }}>Hoạt động</option>
                                <option value="2" {{ old('sp_trangThai') == 2 ? "selected" : "" }}>Không hoạt động</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mô tả ngắn</label>
                            <textarea class="form-control" name="sp_moTaNgan" id="sp_moTaNgan" cols="20" rows="10">
                            {{ old('sp_moTaNgan',$sp->sp_moTaNgan) }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Hình ảnh đại diện</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="sp_anhDaiDien" id="sp_anhDaiDien" aria-describedby="sp_anhDaiDien">
                                    <label class="custom-file-label" for="sp_anhDaiDien">Choose Image</label>
                                </div>
                            </div>
                            <div class="product-img p-0 m-0">
                                    @if(file_exists('storage/products/' . $sp->sp_anhDaiDien))
                                        <img id="preview-img-sp_anhDaiDien" src="{{ asset('storage/products/' . $sp->sp_anhDaiDien) }}" alt="" height="100px">
                                    @endif
                                <br>
                                <img id="preview-img-sp_anhDaiDien" src="#" alt="" height="100px">
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <label class="form-label">Hình ảnh liên quan</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="hasp_hinhAnh" name="hasp_hinhAnh[]" aria-describedby="hasp_hinhAnh" multiple>
                                    <label class="custom-file-label" for="hasp_hinhAnh">Choose Image</label>
                                </div>
                            </div>
                            <div class="product-imgs">
                                @foreach($sp->hinhanhsanpham()->get() as $hasp)
                                    @if(file_exists('storage/products/' . $hasp->hasp_hinhAnh))
                                        <img src="{{ asset('storage/products/' . $hasp->hasp_hinhAnh) }}" alt="" height="100px">
                                    @endif
                                @endforeach <br>
                            </div>
                        </div>
                        <button class="save-btn hover-btn" type="submit">Lưu dữ liệu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('custom-scripts')
<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendors/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendors/input-mask/bindings/inputmask.binding.js') }}"></script>
<script>
    const reader = new FileReader();
    const fileInput = document.getElementById("sp_anhDaiDien");
    const img = document.getElementById("preview-img-sp_anhDaiDien");
    reader.onload = e => {
        img.src = e.target.result;
    }
    fileInput.addEventListener('change', e => {
        const f = e.target.files[0];
        reader.readAsDataURL(f);
    })
    $(function() {
        // Multiple images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#hasp_hinhAnh').on('change', function() {
            previewImages(this, 'div.product-imgs');
        });
    });
    $(document).ready(function() {
        $('#dgmh_gia').inputmask({
            alias: 'currency',
            positionCaretOnClick: "radixFocus",
            radixPoint: ".",
            _radixDance: true,
            numericInput: true,
            groupSeparator: ",",
            suffix: 'vnđ',
            min: 0, // 0 ngàn
            max: 200000000, // 1 trăm triệu
            autoUnmask: true,
            removeMaskOnSubmit: true,
            unmaskAsNumber: true,
            inputtype: 'text',
            placeholder: "0",
            definitions: {
                "0": {
                    validator: "[0-9\uFF11-\uFF19]"
                }
            }
        });
    });
    CKEDITOR.replace('sp_moTaNgan');
    CKEDITOR.replace('sp_thanhPhan');
    $("#frmEdit").validate({
        rules: {
            sp_ten: {
                required: true,
                maxlength: 100
            },
            nsx_ma: "required",
            lsp_ma: "required",
            sp_thanhPhan: {
                maxlength: 1000
            },
            sp_cachDung: {
                maxlength: 1000
            },
            sp_khoiLuong: {
                maxlength: 100
            },
            sp_baoQuan: {
                maxlength: 100
            },
            sp_doiTuongDung: {
                maxlength: 100
            },
            sp_ghiChu: {
                maxlength: 100
            },
            sp_moTaNgan: {
                maxlength: 1000
            },
            sp_hanDung: {
                maxlength: 100
            },
            sp_trangThai: "required"

        },
        messages: {
            sp_ten: {
                required: "Vui lòng nhập tên sản phẩm",
                maxlength: "Tên sản phẩm nhập tối đa 100 ký tự"
            },
            nsx_ma: "Vui lòng chọn nhà sản xuất",
            lsp_ma: "Vui lòng chọn loại sản phẩm",
            sp_thanhPhan: {
                maxlength: "Nhập tối đa 1000 ký tự"
            },
            sp_cachDung: {
                maxlength: "Nhập tối đa 1000 ký tự"
            },
            sp_khoiLuong: {
                maxlength: "Nhập tối đa 100 ký tự"
            },
            sp_baoQuan: {
                maxlength: "Nhập tối đa 100 ký tự"
            },
            sp_doiTuongDung: {
                maxlength: "Nhập tối đa 100 ký tự"
            },
            sp_ghiChu: {
                maxlength: "Nhập tối đa 100 ký tự"
            },
            sp_moTaNgan: {
                maxlength: "Nhập tối đa 1000 ký tự"
            },
            sp_hanDung: {
                maxlength: "Nhập tối đa 100 ký tự"
            },
            sp_trangThai: "Vui lòng chọn trạng thái"

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