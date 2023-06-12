<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Thumb;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function show($orders = null)
    {
        if (!$orders)
            $orders = Order::paginate(5);
        return view('admin.order.show', compact('orders'));
    }
    function detail($id)
    {
        $order = Order::find($id);
        if (!$order->user_id) {
            $order->user_id = Auth::user()->id;
            $order->save();
        }
        $order_details = $order->orderDetails;
        $check = 'true';
        foreach ($order_details as $order_detail) {
            $color = $order_detail->color;
            $product = $order_detail->product;
            $product_colors = $product->colors;
            foreach ($product_colors as $product_color) {
                if ($color->name == $product_color->name) {
                    if ($product_color->pivot->count < $order_detail->count) {
                        $check = 'false';
                        break;
                    }
                }
            }
        }
        return view('admin.order.detail', compact('order', 'order_details', 'check'));
    }
    function ship($id)
    {
        $order = Order::find($id);
        if ($order->user_id == Auth::user()->id) {
            $order->delivery_status = 'Chờ lấy hàng';
            $order_details = $order->orderDetails;
            foreach ($order_details as $order_detail) {
                $product = $order_detail->product;
                $count = $order_detail->count;
                $color = $order_detail->color;
                $colors = $product->colors;
                foreach ($colors as $color_product) {
                    if ($color_product->id == $color->id) {
                        $count_update = $color_product->pivot->count - $count;
                        $product->colors()->syncWithoutDetaching([$color->id => ['count' => $count_update]]);
                        break;
                    }
                }
                $product->count = $product->count - $count;
                $product->save();
            }
            $order->save();
            $status = 'Đơn hàng #' . $order->id . ' đã được xác nhận, đang chờ lấy hàng';
        } else $status = 'Đơn hàng #' . $order->id . ' đang được xử lý bởi người dùng #' . $order->user_id;
        return redirect()->route('order.show')->with('status', $status);
    }
    function cancel($id, Request $request)
    {
        $order = Order::find($id);
        if ($order->user_id == Auth::user()->id) {
            $validate = $request->validate([
                'cancel_description' => 'required|string'
            ]);
            if ($order->delivery_status != 'Chờ xử lý') {
                $order_details = $order->orderDetails;
                foreach ($order_details as $order_detail) {
                    $product = $order_detail->product;
                    $count = $order_detail->count;
                    $color = $order_detail->color;
                    $colors = $product->colors;
                    foreach ($colors as $color_product) {
                        if ($color_product->id == $color->id) {
                            $count_update = $color_product->pivot->count + $count;
                            $product->colors()->syncWithoutDetaching([$color->id => ['count' => $count_update]]);
                            break;
                        }
                    }
                    $product->count = $product->count + $count;
                    $product->save();
                }
            }
            $order->update([
                'delivery_status' => 'Đã hủy',
                'cancel_description' => $request->input('cancel_description'),
                'cancel_reason' => $request->input('cancel_reason')
            ]);
            $status = 'Đơn hàng #' . $order->id . ' đã được hủy thành công';
        } else  $status = 'Đơn hàng #' . $order->id . ' đang được xử lý bởi người dùng #' . $order->user_id;
        return redirect()->route('order.show')->with('status', $status);
    }
    function status($status, $id)
    {
        $order = Order::find($id);
        if ($order->user_id == Auth::user()->id) {
            if ($status == 'picked') {
                $order->delivery_status = 'Đang giao';
                $order->save();
                $status = 'Đơn hàng #' . $order->id . ' đang được giao.';
            } else if ($status == 'completed') {
                $order->delivery_status = 'Hoàn thành';
                $order->payment_status = 'Đã thanh toán';
                $order->save();
                $status = 'Đơn hàng #' . $order->id . ' đã hoàn thành';
            }
        } else  $status = 'Đơn hàng #' . $order->id . ' đang được xử lý bởi người dùng #' . $order->user_id;
        return redirect()->route('order.show')->with('status', $status);
    }
    function payment_complete($id)
    {
        $order = Order::find($id);
        if ($order->user_id == Auth::user()->id) {
            $order->payment_status = "Đã thanh toán";
            $order->save();
            $status = 'Đơn hàng #' . $order->id . ' đã được thanh toán';
        } else  $status = 'Đơn hàng #' . $order->id . ' đang được xử lý bởi người dùng #' . $order->user_id;
        return redirect()->route('order.show')->with('status', $status);
    }
    function to_return($id)
    {
        $order = Order::find($id);
        if ($order->user_id == Auth::user()->id) {
            $order->payment_status = "Hoàn trả";
            $order->save();
            $status = 'Đơn hàng #' . $order->id . ' đã được hoàn trả và gửi thông báo đến ' . $order->customer->fullname;
        } else  $status = 'Đơn hàng #' . $order->id . ' đang được xử lý bởi người dùng #' . $order->user_id;
        return redirect()->route('order.show')->with('status', $status);
    }
    public function filter(Request $request)
    {
        $orders = Order::paginate(5);
        $filter = $request->input('btn_filter');
        if ($filter == 'type') {
            $type = $request->input('type');
            if (empty($type)) return $this->show($orders);
            if ($type == 'open') {
                $orders = Order::whereNot('delivery_status', 'Đã hủy')->whereNot('delivery_status', 'Hoàn thành')->paginate(5);
            } else if ($type == 'store') {
                $orders = Order::where('delivery_status', 'Hoàn thành')->paginate(5);
            } else {
                if ($type == 'cancel') $orders = Order::where('delivery_status', 'Đã hủy')->paginate(5);
            }
        } else if ($filter == 'payment') {
            $payment = $request->input('payment');
            if (empty($payment)) return $this->show($orders);
            $orders = Order::where('payment_status', $payment)->paginate(5);
        } else if ($filter == 'delivery') {
            $ships = $request->input('ship');
            if (empty($ships)) return $this->show($orders);
            $orders = Order::whereIn('delivery_status', $ships)->paginate(5);
        } else if ($filter == 'arrange') {
            $arrange = $request->input('arrange');
            if (empty($arrange)) return $this->show($orders);
            $arrange = explode(",", $arrange);
            $part_1 = $arrange[0];
            $part_2 = $arrange[1];
            $orders = Order::orderBy($part_1, $part_2)->paginate(5);
        }
        // else if ($filter == 'type') {
        //     $types = $request->input('types');
        //     if (empty($types)) return $this->show($products);
        //     $products = Product::whereIn('type', $types)->paginate(5);
        // } else if ($filter == 'search') {
        //     $keyword = $request->input('keyword');
        //     if (empty($keyword)) return $this->show($products);
        //     $products = Product::where('name', 'LIKE', "%{$keyword}%")->paginate(5);
        // }
        return $this->show($orders);
    }
}
