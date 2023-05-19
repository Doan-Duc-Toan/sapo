<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    function show(){
        return view('admin.customer.show');
    }
    function profile(){
        return view('admin.customer.profile');
    }
}
