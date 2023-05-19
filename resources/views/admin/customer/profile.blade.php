@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-md-12"><a class="back" href=""><span class="text-secondary"><i
                        class="fa-solid fa-backward"></i>Danh sách Khách hàng</span></a></div>
        <br>
        <h3>#1104</h3><br><br>
        <div class="col-md-12 content-detail">
            <form class="row" action="">
                <div class="col-md-7 row  user-info">
                    <div class="col-md-12 bg-F row user-desc">
                        <div class="img-user col-md-2">
                            <img src="img/334669696_1373825946523935_1217185962917942019_n.jpg" alt="">
                        </div>
                        <div class="user-name col-md-10">
                            <span>Đoàn Đức Toàn</span><br>
                            <span>Nhà 81, Ngách 91, Ngõ Trại Cá, Trương Định, Hai Bà Trưng, Hà
                                Nội</span>
                        </div>
                        <div class="mb-3 col-md-12 note">
                            <label for="description" class="form-label">Ghi chú</label>
                            <textarea class="form-control" name="" id="description" placeholder="Nhập thông tin ghi chú về khách hàng"
                                rows="3"></textarea>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                    <div class="col-md-12 recent-order row bg-F">
                        <span>Đơn hàng gần đây</span>
                        <div class="table-responsive">
                            <table
                                class="table table-striped
                        table-hover	
                        table-borderless
                        table-primary
                        align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Giá tiền</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr class="table-primary">
                                        <td scope="row">#1101</td>
                                        <td class="">Đã thanh toán</td>
                                        <td>500,000đ</td>
                                        <td>21:40:03 22/05/2023</td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="col-md-3 contact row bg-F">
                    <div class="col-md-12">
                        <span><b>Liên hệ</b></span><br><br>
                        <span class="email text-secondary"><b>Email:</b> toanymanh@gmail.com</span><br>
                        <span class="phone text-secondary"><b>SĐT:</b> 0911577985</span><br>
                        <span class="gender text-secondary"><b>Giới tính:</b> Nam</span><br>
                        <span class="birth text-secondary"><b>Ngày sinh:</b> 22/05/2003</span><br>
                        <span class="address text-secondary"><b>Địa chỉ:</b> Nhà 81, Ngách 91, ngõ Trại
                            Cá, Trương Định, Hai Bà Trưng, Hà Nội</span>
                    </div>
                </div>
                <div class="col-md-12 complete">
                    <button class="btn btn-danger">Xóa khách hàng</button>
                </div>
            </form>
        </div>
    </div>
@endsection
