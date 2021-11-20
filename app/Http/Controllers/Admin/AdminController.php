<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AdminLoginRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(AdminLoginRequest $req)
    {
        $email = $req->Email;
        $pass = $req->Password;
        $result = ['email' => $email, 'password' => $pass];
        //dd($result);
        if (Auth::guard('admin')->attempt($result)) {
            return redirect(route('home_admin'));
        } else {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('login_admin'));
    }

    public function siteAdmin()
    {
        if (Gate::allows('is-admin')) {
            return view('admin.site-admin');
        } else {
            abort('403', 'Bạn không được quyền truy cập');
        }
    }
}
