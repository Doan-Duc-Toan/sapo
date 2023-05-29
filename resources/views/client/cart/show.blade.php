@extends('client.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('client/css/cart.css') }}">
    <script src="{{ asset('client/js/jquery.js') }}"></script>
    <nav id="breadcrumb-nav" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('client.login') }}"><i class="fa-solid fa-house"></i> Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
        </ol>
    </nav>
    <div id="content">
        <h4>GIỎ HÀNG</h4>
        <form action="">
            <div id="list-product-cart">
                @foreach ($order_details as $order_detail)
                    <div class="product-cart">
                        <div class="p-cart-detail">
                            <div class="img-p-cart">
                                @php
                                    $thumbs = $order_detail->product->thumbs;
                                    foreach ($thumbs as $thumb) {
                                        if ($thumb->color->id == $order_detail->color->id) {
                                            $link = $thumb->link;
                                            break;
                                        }
                                    }
                                @endphp
                                <img src="{{ asset($link) }}" alt="">
                            </div>
                            <div class="p-cart-name">
                                <a href="" class="p-name">{{ $order_detail->product->name }}</a>
                                <span class="p-color">{{ $order_detail->color->name }}</span>
                                <div class="count">
                                    <span class="sub num center no-select">-</span>
                                    <input type="text" disabled id="{{ $order_detail->product->id }}" min="1"
                                        value="{{ $order_detail->count }}">
                                    <span class="add num center no-select">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-cart-price">
                            <span
                                class="p-price">{{ number_format($order_detail->product->price * 0.91 * $order_detail->count, 0, '.', ',') . ' đ' }}</span>
                            <span class="price-hide" style="display:none;">{{ $order_detail->product->price * 0.91 }}</span>
                            <a href="" class="delete center">Xóa</a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div id="pay">
                <div class="pay-top">
                    <span class="total">Tổng tiền:</span>
                    <span
                        class="total-price text-secondary">{{ number_format($draft_order->payment_amount, 0, '.', ',') . ' ₫' }}</span>
                    <span class="total-hide" style="display:none;">{{ $draft_order->payment_amount }}</span>
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
                var element = $(this);
                var val = $(this).parent(".count").children("input").val();
                var price = $(this).parent(".count").parent('.p-cart-name').parent('.p-cart-detail').parent(
                    '.product-cart').children('.p-cart-price').children('.price-hide').text();
                parseInt(val)
                var total_amount = $('.total-hide').text();
                parseInt(total_amount);
                parseInt(price)
                var sign = 1
                val++;
                $(this).parent('.count').children("input").val(val)
                $.ajax({
                    url: '{{ route('client.cart_cal') }}',
                    method: 'GET',
                    data: {
                        val: val,
                        price: price,
                        total_amount: total_amount,
                        sign:sign
                    },
                    success: function(response) {
                        var new_price = response.new_price;
                        var total_amount_new = response.total_amount;
                        var formattedPrice = parseFloat(new_price).toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        });
                        element.parent(".count").parent('.p-cart-name').parent('.p-cart-detail')
                            .parent(
                                '.product-cart').children('.p-cart-price').children('.p-price')
                            .text(formattedPrice)
                        var formatted_amount = parseFloat(total_amount_new).toLocaleString(
                            'vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            });
                        var total_amount_new_text = total_amount_new.toString();
                        $('.total-hide').text(total_amount_new_text)
                        $('.total-price').text(formatted_amount)
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Xử lý lỗi nếu có
                    }
                });
            })
            $('.sub').click(function() {
                var element = $(this);
                var val = $(this).parent(".count").children("input").val();
                var price = $(this).parent(".count").parent('.p-cart-name').parent('.p-cart-detail').parent(
                    '.product-cart').children('.p-cart-price').children('.price-hide').text();
                var total =
                    parseInt(val)
                var total_amount = $('.total-hide').text();
                var sign = -1;
                parseInt(total_amount);
                parseInt(price)
                val--;
                if (val >= 1) {
                    $(this).parent('.count').children("input").val(val)
                    $.ajax({
                        url: '{{ route('client.cart_cal') }}',
                        method: 'GET',
                        data: {
                            val: val,
                            price: price,
                            total_amount: total_amount,
                            sign:sign
                        },
                        success: function(response) {
                            var new_price = response.new_price;
                            var total_amount_new = response.total_amount;
                            var formattedPrice = parseFloat(new_price).toLocaleString('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            });
                            element.parent(".count").parent('.p-cart-name').parent(
                                    '.p-cart-detail')
                                .parent(
                                    '.product-cart').children('.p-cart-price').children(
                                    '.p-price')
                                .text(formattedPrice)
                            var formatted_amount = parseFloat(total_amount_new).toLocaleString(
                                'vi-VN', {
                                    style: 'currency',
                                    currency: 'VND'
                                });
                            var total_amount_new_text = total_amount_new.toString();
                            $('.total-hide').text(total_amount_new_text)
                            $('.total-price').text(formatted_amount)
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            // Xử lý lỗi nếu có
                        }
                    });
                }
            })
        })
    </script>
@endsection
