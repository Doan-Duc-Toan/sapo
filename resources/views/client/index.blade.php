@extends('client.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('client/css/index.css') }}">
    <script src="{{ asset('client/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('client/js/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('client/js/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css') }}">
    <script src="{{ asset('client/js/OwlCarousel2-2.3.4/dist/owl.carousel.js') }}"></script>

    <div id="cover">
        <div class="img-cover">
            <img src="{{ asset('client/img/big_bn_slide.webp') }}" alt="">
        </div>
        <div class="slide center">
            <div class="slide-img-cover">
                <div class="owl-carousel owl-theme">
                    <div class="slide-item"> <a href="#"><img src="{{ asset('client/img/slide-img1.webp') }}"
                                alt=""></a> </div>
                    <div class="slide-item"> <a href="#"><img src="{{ asset('client/img/slide-img2.webp') }}"
                                alt=""></a></div>
                    <div class="slide-item"> <a href="#"><img src="{{ asset('client/img/slide-img1.webp') }}"
                                alt=""></a> </div>
                    <div class="slide-item"> <a href="#"><img src="{{ asset('client/img/slide-img2.webp') }}"
                                alt=""></a> </div>
                </div>
            </div>
        </div>

    </div>
    <div id="content">
        <div class="row" id="strong-point">
            <div class="col-md-3">
                <div>
                    <span class="sp-icon"><img src="{{ asset('client/img/icon2-01-600x577.png') }}" alt=""></span>
                    <span class="sp-title center">Sản phẩm an toàn</span>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <span class="sp-icon"><img src="{{ asset('client/img/icon-chat-luong.png') }}" alt=""></span>
                    <span class="sp-title center">Chất lượng cam kết</span>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <span class="sp-icon"><img src="{{ asset('client/img/icon3-5fc5a756a1348.png') }}"
                            alt=""></span>
                    <span class="sp-title center">Dịch vụ vượt trội</span>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <span class="sp-icon"><img
                            src="{{ asset('client/img/icon-giao-hang-2b770097b24073e6975d78c45719c53c.png') }}"
                            alt=""></span>
                    <span class="sp-title center">Giao hàng nhanh chóng</span>
                </div>
            </div>
        </div>
        <div id="cat-ost">
            <h3>Danh mục nổi bật</h3>
            <ul class="list-cat">
                <li class="cat-item">
                    <a href="">
                        <img src="{{ asset('client/img/iphone-x-64gb-1.png') }}" alt="">
                        <span>Điện thoại</span>
                    </a>
                </li>
                <li class="cat-item">
                    <a href=""><img src="{{ asset('client/img/th (2).jpg') }}" alt="">
                        <span>Smart watch</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (3).jpg') }}" alt="">
                        <span>Laptop</span>
                    </a>
                </li>
                <li class="cat-item">
                    <a href=""><img src="{{ asset('client/img/th (4).jpg') }}" alt="">
                        <span>Máy tính bảng</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (5).jpg') }}" alt="">
                        <span>Thiết bị mạng</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (6).jpg') }}" alt="">
                        <span>Ti vi</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (7).jpg') }}" alt="">
                        <span>Tai nghe</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (8).jpg') }}" alt="">
                        <span>Ốp lưng, bao da</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (9).jpg') }}" alt="">
                        <span>Loa</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (10).jpg') }}" alt="">
                        <span>Pin dự phòng</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (11).jpg') }}" alt="">
                        <span>Cáp, củ sạc</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (12).png') }}" alt="">
                        <span>màn hình</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (13).png') }}" alt="">
                        <span>Chuột</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (14).png') }}" alt="">
                        <span>Bàn phím</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (15).webp') }}" alt="">
                        <span>Phụ kiện gaming</span></a>
                </li>
                <li class="cat-item">
                    <a href=""> <img src="{{ asset('client/img/th (16).webp') }}" alt="">
                        <span>Camera, webcam</span></a>
                </li>
            </ul>
        </div>
        <div id="flash-sale">
            <div class="fs-title">
                <img src="img/flash-sale-1784897-1521723.png" alt="">
                <h4 class="center">FLASH SALE</h4>
            </div>
            <ul class="list-product">
                @foreach ($products as $product)
                    <li class="product-item">
                        <a href="{{route('c_product.detail',[$product->name,$product->id])}}" class="detail product-if">
                            <div class="center product-thumb">
                               @foreach ($product->thumbs as $thumb)
                                   <img src="{{asset($thumb->link)}}" alt="">
                                   @break
                               @endforeach
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 35%"></div>
                            </div>
                            <span class="pr-name">{{ $product->name }}</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 9%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">{{ number_format($product->price * 0.91, 0, '.', ',') . ' đ' }}</span>
                            <span
                                class="old-p text-secondary">{{ number_format($product->price, 0, '.', ',') . ' đ' }}</span>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
        <div id="product-for-u">
            <div class="tablink">
                <a class="center acvite" href="">
                    <img src="img/goiy-1.webp" alt="">
                    <span>Gợi ý cho bạn</span>
                </a>
                <a class="center" href="">
                    <img src="img/icon-xa-hang-50-50x50-2.webp" alt="">
                    <span>Xả hàng giảm sốc</span>
                </a>
                <a class="center" href="">
                    <img src="img/chigiamonlinedesk-50x54-1.webp" alt="">
                    <span>Sale mùa hè</span>
                </a>
                <a class="center" href="">
                    <img src="img/icon-desk-51x50-2.webp" alt="">
                    <span>Deal ngon bổ rẻ</span>
                </a>
            </div>
            <ul class="list-product">
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/csm_bq_aquaris_v_4_zu_3_ca44688dc9.png" alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 35%"></div>
                        </div>
                        <span class="pr-name">Điện thoại Aquaris 4</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 19%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">6.890.000đ</span>
                        <span class="old-p text-secondary">7.590.000đ</span>
                    </div>
                </li>
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/th (12).jpg" alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 55%"></div>
                        </div>
                        <span class="pr-name">Samsung Galaxy S22</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 9%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">26.990.000đ</span>
                        <span class="old-p text-secondary">27.590.000đ</span>
                    </div>
                </li>
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/apple-iphone-13-pro-frandroid-2021.webp" alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 25%"></div>
                        </div>
                        <span class="pr-name">Iphone 13 Promax 128GB</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 7%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">33.890.000đ</span>
                        <span class="old-p text-secondary">37.590.000đ</span>
                    </div>
                </li>
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/Apple-Macbook-Pro-13_-5-e1597745110243.png" alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 75%"></div>
                        </div>
                        <span class="pr-name">Markbook Pro 14 M1 Pro 2048</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 30%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">44.990.000đ</span>
                        <span class="old-p text-secondary">49.590.000đ</span>
                    </div>
                </li>
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/macbook_PNG13.png" alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 65%"></div>
                        </div>
                        <span class="pr-name">Markbook Pro 14inch 2021</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 17%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">46.890.000đ</span>
                        <span class="old-p text-secondary">47.590.000đ</span>
                    </div>
                </li>
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/av-cap-sac-rc-003-2-30092021.png" alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 15%"></div>
                        </div>
                        <span class="pr-name">Cáp sạc Iphone 15V 220W</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 30%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">490.000đ</span>
                        <span class="old-p text-secondary">590.000đ</span>
                    </div>
                </li>
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/av-cap-rc-152m-03082020.jpg" alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 19%"></div>
                        </div>
                        <span class="pr-name">Cáp sạc superCharger siêu tốc</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 19%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">220.000đ</span>
                        <span class="old-p text-secondary">290.000đ</span>
                    </div>
                </li>
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/image-removebg-preview-1_637719875181005004.webp" alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 58%"></div>
                        </div>
                        <span class="pr-name">Tai nghe không dây baseUs</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 15%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">1.190.000đ</span>
                        <span class="old-p text-secondary">1.390.000đ</span>
                    </div>
                </li>
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/957affb7-2b9f-4ad1-84c9-752fdfd87e54_1.151ff758cb2901565a1714e1e0c9a827.png"
                                alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 75%"></div>
                        </div>
                        <span class="pr-name">Apple Watch SE 44mm</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 20%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">6.890.000đ</span>
                        <span class="old-p text-secondary">7.500.000đ</span>
                    </div>
                </li>
                <li class="product-item">
                    <a href="" class="detail product-if">
                        <div class="center product-thumb">
                            <img src="img/Lenovo_Legion_5_Pro_16ACH6H_CT2_02.png" alt="">
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 43%"></div>
                        </div>
                        <span class="pr-name">Lenovo legion 5 512GB</span>
                    </a>
                    <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                    <a href="" class="basket center pt-icon"><i
                            class="fa-solid fa-basket-shopping fa-shake"></i></a>
                    <div class="sale-label">
                        <span>Giảm 46%</span>
                    </div>
                    <div class="price">
                        <span class="new-p">33.490.000đ</span>
                        <span class="old-p text-secondary">37.490.000đ</span>
                    </div>
                </li>

            </ul>
            <div class="more-product center">
                <a class="center" href="">Xem tất cả</a>
            </div>
        </div>
        <div id="list-smart-phone">
            <div class="top-list">
                <a href="" class="list-title">ĐIỆN THOẠI NỔI BẬT</a>
                <ul class="list-cat-in-product">
                    <li class="center"><a class="" href="">Galaxy Ford</a></li>
                    <li class="center"><a href="">Samsung</a></li>
                    <li class="center"><a href="">Apple</a></li>
                    <li class="center"><a href="">Xiaomi</a></li>
                    <li class="center"><a href="">Oppo</a></li>
                    <li class="center"><a href="">Xem tất cả</a></li>
                </ul>
            </div>
            <div class="list-content">
                <div class="list-sidebar">
                    <a href="" class="sb-product sb-top"><img src="img/bn_pr_3_1.webp" alt=""></a>
                    <a href="" class="sb-product sb-bot"><img src="img/bn_pr_3_2.webp" alt=""></a>
                </div>
                <ul class="list-product  p-list">
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/csm_bq_aquaris_v_4_zu_3_ca44688dc9.png" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 35%"></div>
                            </div>
                            <span class="pr-name">Điện thoại Aquaris 4</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 19%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">6.890.000đ</span>
                            <span class="old-p text-secondary">7.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/th (12).jpg" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 55%"></div>
                            </div>
                            <span class="pr-name">Samsung Galaxy S22</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 9%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">26.990.000đ</span>
                            <span class="old-p text-secondary">27.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/apple-iphone-13-pro-frandroid-2021.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 25%"></div>
                            </div>
                            <span class="pr-name">Iphone 13 Promax 128GB</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 7%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">33.890.000đ</span>
                            <span class="old-p text-secondary">37.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/1.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 75%"></div>
                            </div>
                            <span class="pr-name">Lenovo J7 128GB 2023 new</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 30%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">44.990.000đ</span>
                            <span class="old-p text-secondary">49.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/2.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 65%"></div>
                            </div>
                            <span class="pr-name">Iphone 14 promax 128GB 6GB ram</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 17%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">46.890.000đ</span>
                            <span class="old-p text-secondary">47.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/4.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 15%"></div>
                            </div>
                            <span class="pr-name">Nokia 5720 XpressAudio</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 30%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">490.000đ</span>
                            <span class="old-p text-secondary">590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/3.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 19%"></div>
                            </div>
                            <span class="pr-name">Xiaomi Redmi note 11 Pro</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 19%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">220.000đ</span>
                            <span class="old-p text-secondary">290.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/5.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 58%"></div>
                            </div>
                            <span class="pr-name">Oppo Reno 6Z 5G</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 15%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">1.190.000đ</span>
                            <span class="old-p text-secondary">1.390.000đ</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="list-laptop">
            <div class="top-list">
                <a href="" class="list-title">LAPTOP HOT</a>
                <ul class="list-cat-in-product">
                    <li class="center"><a class="" href="">Markbook</a></li>
                    <li class="center"><a href="">Văn phòng</a></li>
                    <li class="center"><a href="">Sinh viên</a></li>
                    <li class="center"><a href="">Gamming</a></li>
                    <li class="center"><a href="">Xem tất cả</a></li>
                </ul>
            </div>
            <div class="list-content">
                <ul class="list-product p-list">
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/8.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 35%"></div>
                            </div>
                            <span class="pr-name">Markbook Pro 14 Pro Max X</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 19%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">6.890.000đ</span>
                            <span class="old-p text-secondary">7.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/9.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 55%"></div>
                            </div>
                            <span class="pr-name">Lenovo Legion 5 512 GB Chip Core i5</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 9%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">26.990.000đ</span>
                            <span class="old-p text-secondary">27.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img//10.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 25%"></div>
                            </div>
                            <span class="pr-name">Lenovo legion 7 Chip core i7 5512GB</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 7%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">33.890.000đ</span>
                            <span class="old-p text-secondary">37.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/11.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 75%"></div>
                            </div>
                            <span class="pr-name">Lenovo J7 128GB 2023 new</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 30%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">44.990.000đ</span>
                            <span class="old-p text-secondary">49.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/12.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 65%"></div>
                            </div>
                            <span class="pr-name">Dell Inspirent 14 5425</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 17%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">46.890.000đ</span>
                            <span class="old-p text-secondary">47.590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/14.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 15%"></div>
                            </div>
                            <span class="pr-name">Acer Switch 3SF414</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 30%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">490.000đ</span>
                            <span class="old-p text-secondary">590.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/13.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 19%"></div>
                            </div>
                            <span class="pr-name">Dell Precision 7520 Intel Core i7</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 19%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">220.000đ</span>
                            <span class="old-p text-secondary">290.000đ</span>
                        </div>
                    </li>
                    <li class="product-item">
                        <a href="" class="detail product-if">
                            <div class="center product-thumb">
                                <img src="img/15.webp" alt="">
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 58%"></div>
                            </div>
                            <span class="pr-name">lenovo thinkPad Idea 512GB Intel Core i5</span>
                        </a>
                        <a href="" class="center setting pt-icon"><i class="fa-solid fa-gear fa-spin"></i></a>
                        <a href="" class="basket center pt-icon"><i
                                class="fa-solid fa-basket-shopping fa-shake"></i></a>
                        <div class="sale-label">
                            <span>Giảm 15%</span>
                        </div>
                        <div class="price">
                            <span class="new-p">1.190.000đ</span>
                            <span class="old-p text-secondary">1.390.000đ</span>
                        </div>
                    </li>
                </ul>
                <div class="list-sidebar">
                    <a href="" class="sb-product sb-top"><img src="img/16.webp" alt=""></a>
                    <a href="" class="sb-product sb-bot"><img src="img/17.webp" alt=""></a>
                </div>
            </div>
            <div class="banner">
                <a href=""><img src="img/bn_pr_5.webp" alt=""></a>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                //Basic Speeds
                items: 2,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
        })
    </script>
@endsection
