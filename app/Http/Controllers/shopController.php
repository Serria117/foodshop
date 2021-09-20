<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index()
    {
        $product = product::all()->where('status','=', 1);
        return view('client.shop', compact('product'));
    }

    public function detail($id)
    {
        $productDetail = product::all()->where('id','=',$id);
        return view('client.detail', compact('productDetail'));
    }
}
