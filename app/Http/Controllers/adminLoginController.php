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

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // dd($request->input());
        $this->validate($request,
            [
                'name' => 'required',
                'password' => 'required'
            ],
            [
                'name.required' => 'Username cannot be left empty.',
                'password.required' => 'Password cannot be left empty.',
            ]
        );
        $login = Auth::guard('webadmin');
        $user = $login->attempt([
            'username' => $request->input('name'),
            'password' => $request->input('password'),
            ], $request->input('remember'));

        if ($user) {
            if($login->user()->status === 1) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->withErrors('Account has been locked.');
            }
        }
        return redirect()->back()->withErrors('Invalid username or password.');
    }
}
