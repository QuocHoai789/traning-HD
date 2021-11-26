<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $name = $req->Name;
        $email = $req->Email;
        $password = $req->Password;
        $user = User::create([
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
        $email = $req->Email;
        $password = $req->Password;
        $data = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::attempt($data)) {
            $token = Auth::user()->createToken('UserLoginPassportAuth')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthoriseds'], 401);
        }
    }
}
