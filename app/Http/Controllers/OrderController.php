<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Thumb;

class OrderController extends Controller
{
    //
    function show()
    {
        $orders = Order::paginate(10);
        return view('admin.order.show', compact('orders'));
    }
    function detail($id)
    {
        $order = Order::find($id);
        $order_details = $order->orderDetails;
        $check = 'true';
        foreach ($order_details as $order_detail) {
            $color = $order_detail->color;
            $product = $order_detail->product;
            $product_colors = $product->colors;
            foreach ($product_colors as $product_color) {
                if ($color->name == $product_color->name) {
                    if($product_color->pivot->count < $order_detail->count)
                    {
                        $check = 'false';
                        break;
                    }
                }
            }
        }
        return view('admin.order.detail', compact('order', 'order_details','check'));
    }
}
