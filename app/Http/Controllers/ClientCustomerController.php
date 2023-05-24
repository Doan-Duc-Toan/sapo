<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
class ClientCustomerController extends Controller
{
    //
    function login()
    {
        return view('client.login');
    }
    function login_handle(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|regex:/^[A-Za-z0-9!@#$%^&*()_]{6,32}$/',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::guard('customers')->attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->route('client.index');
        }
        else return redirect()->route('client.login')->with('error','Thông tin đăng nhập không chính xác');
        // return $request->all();
    }
    function register()
    {
        return view('client.register');
    }
    function register_handle(Request $request)
    {
        $validate  = $request->validate([
            'fullname' => 'required|string|min:5|max:50',
            'email' => 'required|unique:customers|email',
            'password' => 'required|regex:/^[A-Za-z0-9!@#$%^&*()_]{6,32}$/',
            'phone' => 'required|unique:customers|regex:/^[0-9]{10}$/',
        ]);
        $customer = Customer::create([
            'email' => $request->input('email'),
            'fullname' => $request->input('fullname'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->route('client.login')->with('status', 'Đã đăng kí tài khoản thành công');
    }
    function logout(){
          Auth::guard('customers')->logout();
          return redirect()->route('client.index');
    }
}
