<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminLoginController extends Controller
{
    public function index()
    {
        return view("admin.login", [
            'title' => 'Đăng nhập quản trị'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('password')
        ], $request->input('remember'))) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back();
    }
}
