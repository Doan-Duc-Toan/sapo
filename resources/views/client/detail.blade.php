@extends('client.layout')
@section('content')
    <script src="{{ asset('client/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('client/css/product-detail.css') }}">
    <nav id="breadcrumb-nav" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="">Điện thoại</a></li>
            <li class="breadcrumb-item active" aria-current="page">Samsung Galaxy S22</li>
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
                    <div class="img-item @php
                        if($count == 1 ) echo 'img-active';
                        $count = 0;
                    @endphp">
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
            <form action="">
                <div class="color">
                    <span class="c-title">Màu sắc</span>
                    <div class="list-color">
                        @foreach ($product->thumbs as $thumb)
                            @if ($thumb->color_id)
                                @php
                                    $color = App\Models\Color::find($thumb->color_id);
                                @endphp
                                <div class="color-item">
                                    <img src="{{ asset($thumb->link) }}" alt="">
                                    <span class="mark-icon">✓</span>
                                    <input type="radio" value="" id="{{ $color->id }}">
                                    <label for="{{ $color->id }}">{{ $color->name }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="count">
                    <span class="center c-title">Số lượng</span>
                    <span class="sub num center no-select">-</span>
                    <span class="add num center no-select">+</span>
                    <input type="number" min="1" value="1">
                </div>
                <div class="buy">
                    <button class="buy-now">MUA NGAY<br> <span>(Giao tận nơi hoặc lấy tại cửa
                            hàng)</span></button>
                    <a href="" class="add-cart"><i class="fa-solid fa-cart-shopping center"></i><span>Thêm
                            vào giỏ</span></a>
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
            <img src="img/advice.webp" alt="">
            <span class="phone">Gọi ngay <span class="text-danger"><b>0911577985</b></span> để được tư
                vấn</span>
        </div>
        <div class="status">
            <span>Tình trạng: <span class="text-success"><b>Còn hàng</b></span></span>
            <span>Thương hiệu: <span class="text-success"><b>Samsung</b></span></span>
            <span>Loại: <span class="text-success"><b>Android</b></span></span>
        </div>
        <div class="sc-main">
            <span class="sc-title">Thông số kỹ thuật</span>
            <div class="sc-table">
                {{-- <table>
                    <tbody>
                        <tr>
                            <td colspan="2" class="sc-item">Màn hình</td>
                        </tr>
                        <tr>
                            <td>Công nghệ màn hình</td>
                            <td>Dynamic AMOLED 2X</td>
                        </tr>
                        <tr>
                            <td>Độ phân giải</td>
                            <td>1440 x 3088 pixels (QHD+)</td>
                        </tr>
                        <tr>
                            <td>Màn hình rộng</td>
                            <td>6.8 Inches</td>
                        </tr>
                        <tr>
                            <td>Tính năng màn hình</td>
                            <td>Tần số quét 120Hz <br>
                                Công nghệ HDR10+</td>
                        </tr>
                    </tbody>
                </table> --}}
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
                            {{-- <table>
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="sc-item">Màn hình</td>
                                    </tr>
                                    <tr>
                                        <td>Công nghệ màn hình</td>
                                        <td>Dynamic AMOLED 2X</td>
                                    </tr>
                                    <tr>
                                        <td>Độ phân giải</td>
                                        <td>1440 x 3088 pixels (QHD+)</td>
                                    </tr>
                                    <tr>
                                        <td>Màn hình rộng</td>
                                        <td>6.8 Inches</td>
                                    </tr>
                                    <tr>
                                        <td>Tính năng màn hình</td>
                                        <td>Tần số quét 120Hz <br>
                                            Công nghệ HDR10+</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="sc-item">Camera sau</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Độ phân giải</td>
                                        <td>108 MP, f/1.8 góc rộng <br>
                                            10 MP, f/4.9 <br>
                                            10 MP, f/2.4 <br>
                                            12 MP, f/2.2 góc siêu rộng</td>
                                    </tr>
                                    <tr>
                                        <td>Quay phim</td>
                                        <td>8K@24fps, 4K@30/60fps, <br> 1080p@30/60/240fps, 720p@960fps, <br> HDR10+
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Đèn flash</td>
                                        <td>Có</td>
                                    </tr>
                                    <tr>
                                        <td>Tính năng</td>
                                        <td>Góc rộng <br>
                                            Góc siêu rộng <br>
                                            HDR <br>
                                            Lấy nét theo pha (PDAF) <br>
                                            Siêu cận <br>
                                            Toàn cảnh <br>
                                            Xóa phông</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="sc-item">Camera trước</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Độ phân giải</td>
                                        <td>40 MP, f/2.2</td>
                                    </tr>
                                    <tr>
                                        <td>Quay phim</td>
                                        <td>4K@30/60fps, 1080p@30fps</td>
                                    </tr>
                                    <tr>
                                        <td>Đèn flash</td>
                                        <td>Có</td>
                                    </tr>
                                    <tr>
                                        <td>Tính năng</td>
                                        <td>Góc rộng <br>
                                            Góc siêu rộng <br>
                                            HDR <br>
                                            Lấy nét theo pha (PDAF) <br>
                                            Siêu cận <br>
                                            Toàn cảnh <br>
                                            Xóa phông</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="sc-item">Hệ điều hành</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            OS</td>
                                        <td>Android 12, One UI 4.1</td>
                                    </tr>
                                    <tr>
                                        <td>CPU</td>
                                        <td>Octa-core (1x3.00 GHz Cortex-X2 & 3x2.50 GHz Cortex-A710 & 4x1.80 GHz
                                            Cortex-A510)</td>
                                    </tr>
                                    <tr>
                                        <td>Chipset</td>
                                        <td>Qualcomm Snapdragon 8 Gen 1 (4 nm)</td>
                                    </tr>
                                    <tr>
                                        <td>GPU</td>
                                        <td>Adreno 730</td>
                                    </tr>
                                </tbody>
                            </table> --}}
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
