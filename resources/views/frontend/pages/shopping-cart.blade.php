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
@endsection