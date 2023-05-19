@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="title col-md-12">
            <h3>Đơn hàng</h3>
        </div>
        <div class="main-content row col-md-12 p-3">
            <ul class="status col-md-12 d-flex">
                <li class="status-item all"><a href="" class="text-secondary">Tất cả đơn hàng</a></li>
                <li class="status-item open-product"><a href="" class="text-secondary">Đơn hàng đang
                        mở</a></li>
                <li class="status-item unpaid "><a href="" class="text-secondary">Chưa thanh toán</a>
                </li>
                <li class="status-item not-yet-delivered"><a href="" class="text-secondary">Chưa được
                        giao</a></li>
                <li class="status-item storag"><a href="" class="text-secondary">Lưu trữ</a></li>
            </ul>
            <form action="">
                <div class="custom col-md-12 d-flex">
                    <div class="custom-item first">Lọc đơn hàng
                    </div>
                    <div class="custom-item"><span>Trạng thái <i class="fa-sharp fa-solid fa-caret-down"></i></span></i>
                        <div class="custom-detail">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="open" value="option1"
                                    checked>
                                <label class="form-check-label" for="open">
                                    Mở
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="store"
                                    value="option2">
                                <label class="form-check-label" for="store">
                                    Lưu trữ
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="cancel"
                                    value="option3">
                                <label class="form-check-label" for="cancel">
                                    Hủy
                                </label>
                            </div>
                            <button class="btn btn-secondary">Lọc</button>
                        </div>
                    </div>
                    <div class="custom-item"><span>Thanh toán <i class="fa-sharp fa-solid fa-caret-down"></i></span> </i>
                        <div class="custom-detail">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pay[]" id="unpaid"
                                    value="option1" checked>
                                <label class="form-check-label" for="unpaid">
                                    Chưa thanh toán
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pay[]" id="paid"
                                    value="option2">
                                <label class="form-check-label" for="paid">
                                    Đã thanh toán
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pay[]" id="wait"
                                    value="option3">
                                <label class="form-check-label" for="wait">
                                    Chờ xác nhận
                                </label>
                            </div>
                            <button class="btn btn-secondary">Lọc</button>
                        </div>
                    </div>
                    <div class="custom-item"><span>Giao hàng <i class="fa-sharp fa-solid fa-caret-down"></i></span>
                        <div class="custom-detail">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ship[]" id="unship"
                                    value="option1" checked>
                                <label class="form-check-label" for="unship">
                                    Chưa chuyển
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ship[]" id="part-ship"
                                    value="option2">
                                <label class="form-check-label" for="part-ship">
                                    Chuyển một phần
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ship[]" id="ship-all"
                                    value="option3">
                                <label class="form-check-label" for="ship-all">
                                    Chuyển toàn bộ
                                </label>
                            </div>
                            <button class="btn btn-secondary">Lọc</button>
                        </div>
                    </div>
                    <div class="search custom-item">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" placeholder="Tìm kiếm đơn hàng">
                    </div>
                    <div class="custom-item arrange"><span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                        <div class="custom-detail">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="arrange" id="day-reduce"
                                    value="option1" checked>
                                <label class="form-check-label" for="day-reduce">
                                    Ngày (Giảm dần)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="arrange" id="day-inc"
                                    value="option2">
                                <label class="form-check-label" for="day-inc">
                                    Ngày (Tăng dần)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="arrange" id="price-reduce"
                                    value="option3">
                                <label class="form-check-label" for="price-reduce">
                                    Giá (Giảm dần)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="arrange" id="price-inc"
                                    value="option3">
                                <label class="form-check-label" for="price-inc">
                                    Giá (Tăng dần)
                                </label>
                            </div>
                            <button class="btn btn-secondary">Lọc</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="table-order">
                    <div class="manipulation d-flex">
                        <select class="form-select form-select-sm" name="" id="">
                            <option selected>Chọn thao tác</option>
                            <option value="">Xóa đơn hàng</option>
                            <option value="">Khôi phục đơn hàng</option>
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
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Thanh toán</th>
                                    <th scope="col">Giao hàng</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="">
                                        <td scope="row"><input type="checkbox" class="form-check-input check">
                                        </td>
                                        <td><a href="{{ route('order.detail', $order->id) }}">#{{$order->id}}</a></td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->customer->fullname}}</td>
                                        <td class=""><span class="badge  @php
                                            if($order->payment_status == 'Đã thanh toán') echo 'bg-success';
                                             else echo 'bg-secondary';
                                        @endphp">{{$order->payment_status}}</span>
                                        </td>
                                        <td><span class="badge @php
                                            if($order->delivery_status == 'Đã giao')echo 'bg-success';
                                             else echo 'bg-danger';
                                        @endphp">{{$order->delivery_status}}</span></td>
                                        <td>{{ number_format($order->payment_amount, 0, '.', ',') . ' VND' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $orders->links('pagination::bootstrap-5') }}
                        </table>
                        
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection
