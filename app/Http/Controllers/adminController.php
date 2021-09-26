<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function index(){
        $product = product::all();
        return view('admin.dashboard', compact('product'));
    }
    public function show(Request $request): string
    {
//        $product = product::all()->where('id','=',$request->id);
        $product = DB::table('products')
            ->select(
                'products.id',
                'products.name',
                'products.description',
                'categories.name as cname')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.id', '=', $request->id)->get();
        return $product->toJson();

    }

}
