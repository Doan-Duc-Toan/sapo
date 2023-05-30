<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\OrderDetail;
use App\Models\Color;

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
                    'payment_amount' => $request->input('count') * $product->price * 0.91,
                    'delivery_status' => 'Đơn hàng nháp',
                    'delivery_address' => 'Đang cập nhật',
                ]);
                $order->products()->attach($product->id, ['color_id' => $request->input('color'), 'count' => $request->input('count')]);
                Customer::find($customer->id)->update(
                    ['draft_order' => $order->id]
                );
            } else {
                $order = Order::find($customer->draft_order);
                $order->update([
                    'payment_amount' => $request->input('count') * $product->price * 0.91 + $order->payment_amount
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
            }
            return redirect()->route('client.cart_show');
        }
    }
    function cart_show()
    {
        if (Auth::guard('customers')->user()->draft_order) {
            $draft_order = Order::find(Auth::guard('customers')->user()->draft_order);
            $order_details = $draft_order->orderDetails;
            return view('client.cart.show', compact('order_details', 'draft_order'));
        } else return view('client.cart.show');
    }
    function cart_cal(Request $request)
    {
        $val = $request->input('val');
        $price = intval($request->input('price'));
        $new_price = $val * $price;
        $total_amount = $request->input('total_amount') + $price * $request->input('sign');
        $data  = [
            'new_price' => $new_price,
            'total_amount' => $total_amount
        ];
        return response()->json($data);
    }
    function delete_item($id)
    {
        $draft_order = Order::find(Auth::guard('customers')->user()->draft_order);
        $order_details = $draft_order->orderDetails;
        foreach ($order_details as $order_detail) {
            if ($order_detail->id == $id) {
                $draft_order->payment_amount = $draft_order->payment_amount - $order_detail->count * $order_detail->product->price * 0.91;
                if ($draft_order->payment_amount != 0)
                    $draft_order->save();
                else $draft_order->delete();
                $order_detail->delete();
                return redirect()->route('client.cart_show');
            }
        }
    }

    function delete_all()
    {
        $draft_order = Order::find(Auth::guard('customers')->user()->draft_order);
        $order_details = $draft_order->orderDetails;
        foreach ($order_details as $order_detail) {
            $order_detail->delete();
        }
        $draft_order->delete();
        return redirect()->route('client.cart_show');
    }
    function pay(Request $request)
    {
        $draft_order = Order::find(Auth::guard('customers')->user()->draft_order);
        $order_details = $draft_order->orderDetails;
        $counts = $request->input('counts');
        $draft_order->payment_amount = 0;
        foreach ($order_details as $order_detail) {
            $count = intval($counts[$order_detail->id]);
            $order_detail->count = $count;
            $order_detail->save();
            $draft_order->payment_amount += $order_detail->product->price * 0.91 * $order_detail->count ;
        }
        $draft_order->save();
        return redirect()->route('client.checkout');
    }
    function checkout(){
        $draft_order = Order::find(Auth::guard('customers')->user()->draft_order);
        $order_details = $draft_order->orderDetails;
        return view('client.cart.checkout',compact('order_details','draft_order'));
    }
}
