@extends('client.layout')
@section('content')
    <script src="{{ asset('client/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('client/css/product-detail.css') }}">
    <nav id="breadcrumb-nav" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('client.index') }}"><i class="fa-solid fa-house"></i> Trang chủ</a>
            </li>
            <li class="breadcrumb-item"><a href="#">{{ $product->type }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
        </ol>
    </nav>
    <div id="content">
        <span class="product-name">{{ $product->name }}</span>
        <div id="product-detail">
            <div id="product-main-slide">
                <div class="img-main">
                    @foreach ($product->thumbs as $thumb)
                        <img src="{{ asset($thumb->link) }}" alt="">
                    @break
                @endforeach
                <span class="pre move center"><i class="fa-solid fa-chevron-left"></i></span>
                <span class="next move center"><i class="fa-solid fa-chevron-left"></i></span>
            </div>
            <div class="list-img">
                @php
                    $count = 1;
                @endphp
                @foreach ($product->thumbs as $thumb)
                    <div
                        class="img-item @php
if($count == 1 ) echo 'img-active';
                        $count = 0; @endphp">
                        <img src="{{ asset($thumb->link) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
        <div id="product-detail-right">
            <div class="price">
                <span class="new-price">{{ number_format($product->price * 0.91, 0, '.', ',') . ' đ' }}</span>
                <span class="old-price">{{ number_format($product->price, 0, '.', ',') . ' đ' }}</span>
            </div>
            <form action="{{ route('client.cart_act', $product->id) }}" method="POST">
                @csrf
                <div class="color">
                    <span class="c-title">Màu sắc</span>
                    <div class="list-color">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($product->colors as $color)
                            @php
                                $thumb = $product->thumbs->where('color_id',$color->id)->first();
                            @endphp
                            <div class="color-item @php
if($count == 1 ) echo 'c-active'; @endphp">
                                @if (!empty($thumb))
                                    <img src="{{ asset($thumb->link) }}" alt="">
                                @endif
                                <span class="mark-icon">✓</span>
                                <input type="radio" name="color"
                                    @php
if($count == 1 ) echo 'checked'; $count = 0; @endphp
                                    value="{{ $color->id }}" id="{{ $color->id }}">
                                <label for="{{ $color->id }}">{{ $color->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="count">
                    <span class="center c-title">Số lượng</span>
                    <span class="sub num center no-select">-</span>
                    <span class="add num center no-select">+</span>
                    <input type="number" name="count" min="1" value="1">
                </div>
                <div class="buy">
                    <button name="btn_act" value="buy" class="buy-now">MUA NGAY<br> <span>(Giao tận nơi hoặc lấy tại
                            cửa
                            hàng)</span></button>
                    <button name="btn_act" value="add_cart" class="add-cart"><i
                            class="fa-solid fa-cart-shopping center"></i><span>Thêm
                            vào giỏ</span></button>
                </div>
            </form>
        </div>
        <div id="product-detail-bot">
            <p>{!! $product->description !!}</p>
            <br><br>
            <div class="after"></div>
            <span class="see-more">Xem tất cả</span>
            <span class="btn-collapse">Thu gọn</span>
        </div>
    </div>
    <div id="specifications">
        <div class="advise">
            <img src="{{ asset('client/img/advice.webp') }}" alt="">
            <span class="phone">Gọi ngay <span class="text-danger"><b>0911577985</b></span> để được tư
                vấn</span>
        </div>
        <div class="status">
            <span>Tình trạng: @if ($product->count > 0)
                    <span class="text-success"><b>Còn hàng</b></span>
                @else
                    <span class="text-secondary"><b>Hết hàng</b></span>
                @endif
            </span>
            <span>Thương hiệu: <span class="text-success"><b>{{ ucfirst($product->supplier) }}</b></span></span>
            <span>Loại: <span class="text-success"><b>{{ $product->type }}</b></span></span>
        </div>
        <div class="sc-main">
            <span class="sc-title">Thông số kỹ thuật</span>
            <div class="sc-table">
                {!! $product->specifications !!}
            </div>
            <div class="sc-detail center">
                <span data-bs-toggle="modal" data-bs-target="#modalId">
                    Chi tiết cấu hình
                </span>
            </div>


            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Cấu hình chi tiết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {!! $product->specifications !!}
                        </div>

                    </div>
                </div>
            </div>


            <!-- Optional: Place to the bottom of scripts -->

        </div>
    </div>
</div>
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
</script>
<script>
    $(document).ready(function() {
        $(".list-img .img-item").click(function() {
            $(".list-img .img-item").removeClass("img-active");
            var src = $(this).children("img").attr("src");
            $(".img-main img").fadeOut(200, function() {
                $(this).attr("src", src).fadeIn(200);
            })
            $(this).addClass("img-active");
        })
        $(".color-item").click(function() {
            $(".color-item").removeClass("c-active");
            var src = $(this).children("img").attr("src");
            $(".list-img .img-item").removeClass("img-active");
            var acvite = $('.list-img .img-item').find("img[src ='" + src + "']").parent().addClass(
                "img-active");
            $(".img-main img").fadeOut(200, function() {
                $(this).attr("src", src).fadeIn(200);
            })
            $("input[type='radio']").prop("checked", false);
            $(this).children("input[type='radio']").prop("checked", true)
            $(this).addClass("c-active");
        })
        $('.next').click(function() {
            var src = $('.list-img .img-item.img-active').next().children('img').attr("src");
            var next = $('.list-img .img-item.img-active').next()
            if (next.length != 0) {
                $(".list-img .img-item").removeClass("img-active");
                $(next).addClass("img-active");
                $(".img-main img").fadeOut(200, function() {
                    $(this).attr("src", src).fadeIn(200);
                })
            }
        })
        $('.pre').click(function() {
            var src = $('.list-img .img-item.img-active').prev().children('img').attr("src");
            var pre = $('.list-img .img-item.img-active').prev()
            if (pre.length != 0) {
                $(".list-img .img-item").removeClass("img-active");
                $(pre).addClass("img-active");
                $(".img-main img").fadeOut(200, function() {
                    $(this).attr("src", src).fadeIn(200);
                })
            }
        })
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
        $(".see-more").click(function() {
            $("#product-detail-bot").css('height', 'auto');
            $("#product-detail-bot div.after").css('background', 'none');
            $(this).css('display', 'none');
            $('.btn-collapse').css('display', 'inline');
        })
        $(".btn-collapse").click(function() {
            $("#product-detail-bot").css('height', '400px');
            $("#product-detail-bot div.after").css('background',
                'linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%)'
            );
            $(this).css('display', 'none');
            $('.see-more').css('display', 'inline');
        })
    })
</script>
@endsection
