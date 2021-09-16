@php
    $page = 'home';
@endphp
@extends('client.layout')
@section('title', 'Trang chủ')
@section('sidebar')
    <x-sidemenu/>
@endsection

@section('banner')
<div class="hero__item set-bg" data-setbg="{{asset('site/img/hero/banner.jpg')}}">
    <div class="hero__text">
        <span>THỰC PHẨM TƯƠI SẠCH</span>
        <h2>100% <br> Nguồn gốc <br> tự nhiên</h2>
        <p>Hỗ trợ vận chuyển và giao hàng miễn phí</p>
        <a href="#" class="primary-btn">Mua ngay</a>
    </div>
</div>
@endsection

@section('content')

@endsection