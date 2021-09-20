<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    public function index(){
        $product = product::all();
        return view('admin.dashboard', compact('product'));
    }
}
