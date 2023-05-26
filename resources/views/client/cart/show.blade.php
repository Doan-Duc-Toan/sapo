@extends('client.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('client/css/cart.css') }}">
    <script src="{{ asset('client/js/jquery.js') }}"></script>
    <nav id="breadcrumb-nav" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
        </ol>
    </nav>
    <div id="content">
        <h4>GIỎ HÀNG</h4>
        <form action="">
            <div id="list-product-cart">
                <div class="product-cart">
                    <div class="p-cart-detail">
                        <div class="img-p-cart">
                            <img src="{{asset('client/img/apple-iphone-13-pro-frandroid-2021.webp')}}" alt="">
                        </div>
                        <div class="p-cart-name">
                            <a href="" class="p-name">Samsung Galaxy S22 Ultra (8GB - 128GB)</a>
                            <span class="p-color">Xanh</span>
                            <div class="count">
                                <span class="sub num center no-select">-</span>
                                <input type="number" min="1" value="1">
                                <span class="add num center no-select">+</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-cart-price">
                        <span class="p-price">54.100.000 ₫</span>
                        <a href="" class="delete center">Xóa</a>
                    </div>
                </div>
            </div>
            <div id="pay">
                <div class="pay-top">
                    <span class="total">Tổng tiền</span>
                    <span class="total-price">54.100.000 ₫</span>
                </div>
                <div class="pay-mid">
                    <a href="" class="center">Thanh toán</a>
                </div>
                <div class="pay-bot">
                    <a href="" class="center">Xóa tất cả</a>
                </div>
            </div>
        </form>

    </div>
    <script>
        $(document).ready(function() {
            $('.add').click(function() {
                var val = $("input[type='number']").val();
                parseInt(val)
                val++;
                $("input[type='number']").val(val)
            })
            $('.sub').click(function() {
                var val = $("input[type='number']").val();
                parseInt(val)
                val--;
                if (val >= 1) {
                    $("input[type='number']").val(val)
                }
            })
        })
    </script>
@endsection
