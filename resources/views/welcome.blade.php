@extends('client.site')
@section('content')
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục</span>
                        </div>
                        <ul>
                            <li><a href="#">Thịt</a></li>
                            <li><a href="#">Rau củ</a></li>
                            <li><a href="#">Trái cây</a></li>
                            <li><a href="#">Hải sản</a></li>
                            <li><a href="#">Sữa và sản phẩm từ sữa</a></li>
                            <li><a href="#">Trứng</a></li>
                            <li><a href="#">Thịt gia cầm</a></li>
                            <li><a href="#">Gia vị</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{asset('site/img/hero/banner.jpg')}}">
                        <div class="hero__text">
                            <span>THỰC PHẨM TƯƠI SẠCH</span>
                            <h2>100% <br> Nguồn gốc <br> tự nhiên</h2>
                            <p>Hỗ trợ vận chuyển và giao hàng miễn phí</p>
                            <a href="#" class="primary-btn">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
