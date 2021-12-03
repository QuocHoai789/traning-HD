<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $user = Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
        $token = $user->createToken('UserPassportAuth')->accessToken;
        return response()->json(['token' => $token], 200);
    }
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $email = $req->email;
        $password = $req->password;
        $data = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::guard('admin')->attempt($data)) {
            $token = Auth::guard('admin')->user()->createToken('UserPassportAuth')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthoriseds'], 401);
        }
    }
    public function details(){
        $user = Auth::guard('admin')->user();
        if(!$user){
            return response()->json(['error'=>'Unauthoriseds'], 401);
        }
        return response()->json(['user'=>$user],200);
    }
    public function logout(){
        if(!Auth::check()){
            return response()->json(['error' => 'You are not login'], 401);
        }
        Auth::guard('admin')->logout();
        return response()->json(['success'=>'You are logout'], 200);
    }
}
