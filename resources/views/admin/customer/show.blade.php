@extends('admin.layout')
@section('content')
<div class="row">
    <div class="title col-md-12">
        <h3>Danh sách khách hàng</h3>
    </div>
    <div class="main-content row col-md-12 p-3">
        <ul class="status col-md-12 d-flex">
            <li class="status-item all"><a href="" class="text-secondary">Tất cả khách hàng</a></li>
        </ul>
        <form action="">
            <div class="custom col-md-12 d-flex">
                <div class="custom-item first">Tìm kiếm
                </div>
                <div class="search custom-item">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" placeholder="Tìm kiếm sản phẩm">
                </div> 
            </div>
            <div class="col-md-12">
                <div class="manipulation d-flex">
                    <select class="form-select form-select-sm" name="" id="">
                        <option selected>Chọn thao tác</option>
                        <option value="">Xóa khách hàng</option>
                        <option value="">Khôi phục khách hàng</option>
                    </select>
                    <button class="btn btn-secondary">Thực hiện</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-secondary">
                        <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" name="checkall"
                                        class="check-all form-check-input">
                                </th>
                                <th scope="col">Thông tin</th>
                                <th scope="col">Email</th>
                                <th scope="col">Điện thoại</th>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Đơn hàng gần nhất</th>
                                <th scope="col">Tổng chi tiêu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">
                                    <div><input type="checkbox" class="form-check-input check">
                                    </div>
                                </td>
                                <td><a class="info-intro" href="{{route('customer.profile',1)}}"><img class="img-thumb"
                                            src="img/336783239_2236615586521800_7429692404170903906_n.jpg" alt=""><span
                                            class="">Đoàn Đức Toàn</span></a></td>
                                <td>
                                    <div><span>toanymanh@gmail.com</span></div>
                                </td>
                                <td>
                                    <div><span>0911577985</span></div>
                                </td>
                                <td><div><span>10</span></div></td>
                                <td><div><span><a href="">#0412</a></span></div></td>
                                <td class="">
                                    <div><span class=""><b>1.300.000đ</b></span></div>
                                </td>

                            </tr>                                               
                        </tbody>
                    </table>
                    <nav class="col-md-12 paginate" aria-label="Page navigation">
                        <ul class="pagination    ">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link"
                                    href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </form>

    </div>
</div>
@endsection