<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\OrderDetail;

class ClientController extends Controller
{
    //
    function index()
    {
        $products = Product::all();
        // $product = Product::find(8);
        //  return $product->thumbs;
        return view('client.index', compact('products'));
    }
    function detail($name, $id)
    {
        $product = Product::find($id);
        return view('client.product.detail', compact('product'));
    }
    function cart_act($id, Request $request)
    {
        $product = Product::find($id);
        $customer = Auth::guard('customers')->user();
        $act = $request->input('btn_act');
        if ($act == 'add_cart') {
            if (!$customer->draft_order) {
                $order = Order::create([
                    'customer_id' => $customer->id,
                    'payment_status' => 'Chưa thanh toán',
                    'payment_method' => 'Khi nhận hàng',
                    'payment_amount' => $request->input('count') * $product->price * 0.9,
                    'delivery_status' => 'Đơn hàng nháp',
                    'delivery_address' => 'Đang cập nhật',
                ]);
                $order->products()->attach($product->id, ['color_id' => $request->input('color'), 'count' => $request->input('count')]);
                Customer::find($customer->id)->update(
                    ['draft_order' => $order->id]
                );
                return redirect()->route('c_product.detail', [$product->name, $product->id]);
            } else {
                $order = Order::find($customer->draft_order);
                $order->update([
                    'payment_amount' => $request->input('count') * $product->price * 0.9 + $order->payment_amount
                ]);
                $orderDetails = $order->orderDetails;
                $check = false;
                foreach ($orderDetails as $orderDetail) {
                    if ($orderDetail->product_id == $product->id && $orderDetail->color_id == $request->input('color')) {
                        $check = true;
                        $orderDetail->update([
                            //'count' => $request->input('count') + $orderDetail->count;
                            'count' => $request->input('count') + $orderDetail->count
                        ]);
                        break;
                    }
                }
                if (!$check) {
                    $order->products()->attach($product->id, ['color_id' => $request->input('color'), 'count' => $request->input('count')]);
                }
                // return redirect()->route('c_product.detail', [$product->name, $product->id]);
                return redirect()->route('client.cart_show');
            }
        }
    }
    function cart_show(){
        return view('client.cart.show');
    }
}
