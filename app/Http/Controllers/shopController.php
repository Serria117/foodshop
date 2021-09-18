<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index()
    {
        return view('client.shop');
    }

    public function detail($id): string
    {
        return "Chi tiết sản phẩm $id";
    }
}
