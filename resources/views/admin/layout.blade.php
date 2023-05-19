<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product_detail.css') }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <title>SapoShop</title>
</head>

<body>
    <div id="wrapper" class="container">
        <div class="row">
            <div class="col-md-2" id="sidebar">
                <div class="">
                    <ul class="row" id="navbar">
                        <li class="col-md-12 nav-item" id="logo"><a href=""><img
                                    src="{{ asset('img/Sapo-logo (1).svg') }}" alt=""></a>
                        </li>
                        <li class="col-md-12 nav-item">
                            <a class="item-link" href=""><i class="fa-solid fa-house"></i><span>Tổng
                                    quan</span></a>
                        </li>
                        <li class="col-md-12 nav-item" id="order">
                            <a href="{{route('order.show')}}" class="item-link"><i class="fa-solid fa-check-to-slot"></i><span>Đơn
                                    hàng</span></a>
                            <i class="fa-solid fa-greater-than"></i>
                            <ul class="container sub-menu">
                                <div class="row">
                                    <li class="col-md-12"><a href="{{route('order.show')}}">Danh sách đơn hàng</a></li>
                                    <li class="col-md-12"><a href="">Đơn hàng chưa hoàn tất</a></li>
                                </div>
                            </ul>
                        </li>

                        <li class="col-md-12 nav-item" id="product">
                            <a href="" class="item-link"><i class="fa-solid fa-box"></i><span>Sản phẩm</span>
                            </a>
                            <i class="fa-solid fa-greater-than"></i>
                            <ul class="container sub-menu">
                                <div class="row">
                                    <li class="col-md-12"><a href="{{route('product.show')}}">Danh sách sản phẩm</a></li>
                                    <li class="col-md-12"><a href="{{route('cat.show')}}">Danh mục sản phẩm</a></li>
                                    <li class="col-md-12"><a href="{{route('product.add')}}">Thêm sản phẩm</a></li>
                                </div>
                            </ul>
                        </li>
                        <li class="col-md-12 nav-item" id="product">
                            <a href="" class="item-link"><i class="fa-solid fa-chart-simple"></i><span>Báo
                                    cáo</span>
                            </a>
                            <i class="fa-solid fa-greater-than"></i>
                            <ul class="container sub-menu">
                                <div class="row">
                                    <li class="col-md-12"><a href="">Danh sách sản phẩm</a></li>
                                    <li class="col-md-12"><a href="">Danh mục sản phẩm</a></li>
                                    <li class="col-md-12"><a href="">Quản lý kho cá nhân</a></li>
                                </div>
                            </ul>
                        </li>
                        <li class="col-md-12 nav-item" id="customer">
                            <a href="{{route('customer.show')}}" class="item-link"><i class="fa-solid fa-users"></i><span>Danh sách khách
                                    hàng</span></a>
                        </li>
                        @canany(['permission.add', 'permission.show', 'permission.delete', 'permission.edit',
                            'role.add', 'role.edit', 'role.delete', 'role.show'])
                            <li class="col-md-12 nav-item" id="role">
                                @canany(['permission.show', 'permission.edit', 'permission.delete', 'permission.add'])
                                    <a href="{{ route('permission.show') }}" class="item-link"><i
                                            class="fa-solid fa-newspaper"></i><span>Phân quyền</span> </a>
                                    <i class="fa-solid fa-greater-than"></i>
                                @endcanany

                                <ul class="container sub-menu">
                                    <div class="row">
                                        @canany(['permission.show', 'permission.edit', 'permission.delete',
                                            'permission.add'])
                                            <li class="col-md-12"><a href="{{ route('permission.show') }}">Danh sách quyền</a>
                                            </li>
                                        @endcanany
                                        @canany(['role.add', 'role.show', 'role.delete', 'role.edit'])
                                            <li class="col-md-12"><a href="{{ route('role.show') }}">Danh sách vai trò</a></li>
                                            <li class="col-md-12"><a href="{{ route('role.add') }}">Thêm vai trò</a></li>
                                        @endcanany
                                    </div>
                                </ul>
                            </li>
                        @endcanany

                        <li class="col-md-12 nav-item" id="user">
                            <a href="{{ route('admin_user.show') }}" class="item-link"><i
                                    class="fa-solid fa-user"></i><span>Người dùng</span> </a>
                            <i class="fa-solid fa-greater-than"></i>
                            <ul class="container sub-menu">
                                <div class="row">
                                    <li class="col-md-12"><a href="{{ route('admin_user.show') }}">Danh sách người
                                            dùng</a></li>
                                    <li class="col-md-12"><a href="{{ route('admin_user.add') }}">Thêm người dùng</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- -------------------------End sidebar----------------------------- -->
            <div class="col-md-10" id="wr-content">
                <div id="header" class="container">
                    <div class="row">
                        <div class="search col-md-4">
                            <form action="">
                                <button> <i class="fa-solid fa-magnifying-glass"></i></button>
                                <input type="text" placeholder="Nhập từ khóa tìm kiếm">
                            </form>
                        </div>
                        <div class="col-md-3" id="request">
                            <div id="helper" class="option" data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="bottom"
                                data-bs-content="<div class='popover-help'>
                                    <div class='row' id='popover-menu'>                                                                   
                                        <ul class='col-md-12' id='list-suggest'>
                                            <li><a href='#'>Tổng quan về SapoShop</a></li>                                           
                                            <li><a href='#'>Giới thiệu giao diện chung SapoShop</a></li>
                                            <li><a href='#'>Hướng dẫn trải nghiệm SapoShop</a></li>                                           
                                        </ul>
                                        <div class='col-md-12 row' id='menu-suggest'>
                                            <a href='#' class='col-md-4'>
                                                <div class='icon'><img src='img/q-and-a-icon-23.png' alt=''></div>
                                                <span>Câu hỏi <br> thường gặp</span>
                                            </a>
                                            <a href='#' class='col-md-4'>
                                                <div class='icon'><img src='img/video-camera-simple-icon-movie-260nw-1012284634.webp' alt=''></div>
                                                <span>Video<br> hướng dẫn</span>
                                            </a>
                                            <a href='#' class='col-md-4 last'>
                                                <div class='icon'><img src='img/tải xuống (1).png' alt=''></div>
                                                <span>Tài liệu<br> hướng dẫn</span>
                                            </a>
                                            
                                        </div>
                                        <div class='col-md-12' id='contact'>
                                            <a class='phone'>
                                                <i class='fa-solid fa-phone'></i>
                                                <span>0911577985</span>
                                            </a>
                                            <a href='#' class='send-help'>
                                                <i class='fa-solid fa-headphones'></i>
                                                <span>Gửi hỗ trợ</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            "
                                data-bs-html="true">
                                <span class="name-option"><i class="fa-solid fa-question"></i> Trợ giúp</span>
                            </div>
                            <div id="feebback" class="option" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <span class="name-option"><i class="fa-solid fa-heart"></i> Góp ý</span>
                            </div>
                        </div>
                        <div class="col-md-2" id="current-user">
                            <div id="top-profile" data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="bottom" data-bs-html="true"
                                data-bs-content="
                             <ul id='bot-profile'>
                                 <li><a href='#'><i class='fa-regular fa-user'></i> Tài khoản của bạn</a></li>
                                 <li><a href='#'><i class='fa-solid fa-boxes-packing'></i> Gói dịch vụ</a></li>
                                 <li><a href='{{ route('admin.logout') }}'><i class='fa-solid fa-right-from-bracket'></i>Đăng xuất</a></li>
                                 <li><a href='#'>Điều khoản và dịch vụ</a></li>
                                 <li><a href='#'>Chính sách bảo mật</a></li>
                                 <li><a href='#'>Hỗ trợ</a></li>
                             </ul>
                            ">
                                <img src="img/334669696_1373825946523935_1217185962917942019_n.jpg" alt="">
                                <span class="name-user">{{ Auth::user()->fullname }}</span>
                                <span class="status">Online</span>
                            </div>
                        </div>
                        <div class="col-md-1" id="notify"><i data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="bottom" data-bs-html="true"
                                data-bs-content="<span class='empty-notify'>Không có thông báo nào</span>"
                                class="fa-solid fa-bell"></i></div>
                    </div>
                </div>
                <!-- --------------------Content---------------- -->
                <div id="content" class="container">
                    @yield('content')
                </div>
                <!-- -----------------------End-Content------------------- -->
            </div>
        </div>
        <form action="">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Gửi góp ý</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="s-feedback">Mục góp ý<b class="text-danger">*</b></label>
                                <select class="form-control" name="" id="s-feedback">
                                    <option value="">Lựa chọn mục góp ý</option>
                                    <option value="">Báo lỗi-Chỉnh sửa giao diện web</option>
                                    <option value="">Góp ý phản ánh dịch vụ</option>
                                    <option value="">Tư vấn thiết kế website</option>
                                    <option value="">Hỗ trợ vấn đề khác</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Tiêu đề<b class="text-danger">*</b></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="content-feedback">Nội dung<b class="text-danger">*</b></label>
                                <textarea class="form-control" name="" id="content-feedback" cols="" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="file"><i class="fa-solid fa-paperclip"></i> Đính kèm tệp</label>
                                <input type="file" id="file" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary">Gửi yêu cầu</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>


        <script src="{{ asset('js/index.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
            integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
            const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
            popoverTriggerList.forEach(function(popoverTriggerEl) {
                popoverTriggerEl.addEventListener('click', function() {
                    // ẩn tất cả các popover khác
                    popoverList.forEach(function(popover) {
                        if (popover._element !== popoverTriggerEl) {
                            popover.hide()
                        }
                    })
                })
            })
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['1/1/2023', '1/2/2023', '1/3/2023', '1/4/2023', '1/5/2023', '1/6/2023'],
                    datasets: [{
                        label: 'Doanh thu(Triệu VNĐ)',
                        data: [1.2, 1.8, 3, 2.5, 4, 7, 6.5],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }

            });
            
        </script>
</body>

</html>
