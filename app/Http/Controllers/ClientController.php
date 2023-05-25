<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ClientController extends Controller
{
    //
    function index(){
        $products = Product::all();
        // $product = Product::find(8);
        //  return $product->thumbs;
        return view('client.index',compact('products'));
    }
    function detail($name,$id){
         $product = Product::find($id);
         return view('client.detail',compact('product'));
    }
}
