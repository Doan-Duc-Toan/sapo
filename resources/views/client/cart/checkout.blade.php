<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('client/css/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/checkout.css')}}">
    <script src="{{asset('client/js/jquery.js')}}"></script>

</head>

<body>
    <div id="content">
        <div id="left">
            <div id="l-content">
                <nav id="breadcrumb-nav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('client.cart_show')}}">Giỏ hàng</a></li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">Thông tin</li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
                    </ol>
                </nav>
                <h3>Thông tin nhận hàng</h3>
                <form action="">
                    <div class="input-contact">
                        <input type="text">
                        <label class="lb-ic" for="">Email</label>
                    </div>
                    <div class="input-contact">
                        <input type="text">
                        <label class="lb-ic" for="">Họ và tên</label>
                    </div>
                    <div class="input-contact">
                        <input type="text">
                        <label class="lb-ic" for="">Số điện thoại (Tùy chỉnh)</label>
                    </div>
                    <div class="input-contact">
                        <input type="text">
                        <label class="lb-ic" for="">Địa chỉ (Tùy chỉnh)</label>
                    </div>
                    <div id="select-address">
                        <select class="city" name="" id="">
                            <option value="">Tỉnh thành</option>
                            <option value="">Hà nội</option>
                            <option value="">Hồ Chí Minh</option>
                        </select>
                        <select class="district" name="" id="">
                            <option value="">Quận, huyện</option>
                            <option value="">Thủ Đức</option>
                            <option value="">Thanh Xuân</option>
                        </select>
                        <select class="ward" name="" id="">
                            <option value="">Phường, xã</option>
                            <option value="">Thủ Đức</option>
                            <option value="">Thanh Xuân</option>
                        </select>
                    </div>
                    <div class="input-contact">
                        <textarea name="" id="" cols="" rows=""></textarea>
                        <label class="lb-ic" for="">Ghi chú (Tùy chọn)</label>
                    </div>
                    <div id="ship">
                        <span class="lb-bot">Phương thức vận chuyển</span>
                        <div class="bot-item">
                            <input type="radio" id="ship-method" checked>
                            <label for="ship-method">Giao hàng tận nơi</label>
                        </div>
                    </div>
                    <div id="pay-method">
                        <span class="lb-bot">Phương thức thanh toán</span>
                        <div class="bot-item">
                            <input checked type="radio" id="cod" name="pay_method" value="cod">
                            <label for="cod">Thanh toán khi giao hàng (COD)</label>
                        </div>
                        <div class="bot-item">
                            <input type="radio" id="bank" name="pay_method" value="bank">
                            <label for="bank">Chuyển khoản qua ngân hàng</label>
                        </div>
                        <div class="bot-item">
                            <input type="radio" id="option" name="pay_method" value="option">
                            <label for="option">Phương thức thanh toán tùy chọn</label>
                        </div>
                    </div>
                    <div id="order">
                        <a href="{{route('client.cart_show')}}" class="center">< Quay lại giỏ hàng</a>
                        <button>Đặt hàng</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="right">
            <div id="r-content">
                 <h3>Thông tin đơn hàng</h3>
                 <ul id="list-product">
                     <li class="product-item">
                         <div class="p-img">
                            <img class="p-img" src="img/apple-iphone-13-pro-frandroid-2021.webp" alt="">
                            <span class="count center">5</span>
                         </div>
                         <span class="p-name">Samsung Galaxy S22 Ultra (8GB - 128GB)</span>
                         <span class="price">350.000đ</span>
                     </li>
                 </ul>
                 <div id="amount">
                      <div class="a-item">
                         <span class="a-title">Tạm tính</span>
                         <span class="money">3.000.000đ</span>
                      </div>
                      <div class="a-item">
                        <span class="a-title">Phí vận chuyển</span>
                        <span class="money">50.000đ</span>
                     </div>
                 </div>
                 <div id="total">
                    <span class="t-title">Tổng tiền</span>
                     <span class="total-amount">3.050.000đ</span>
                 </div>
            </div> 
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        $('label.lb-ic').click(function () {
            $(this).addClass('placeholder');
        })
        $('input').focus(function () {
            $(this).parent('.input-contact').children('label.lb-ic').addClass('placeholder');
        });
        $('input').blur(function () {
            if ($(this).val() === '') {
                $(this).parent('.input-contact').children('label.lb-ic').removeClass('placeholder');
            }
        });
        $('textarea').focus(function () {
            $(this).parent('.input-contact').children('label.lb-ic').addClass('placeholder');
        });
        $('textarea').blur(function () {
            if ($(this).val() === '') {
                $(this).parent('.input-contact').children('label.lb-ic').removeClass('placeholder');
            }
        });
    })
</script>

</html>