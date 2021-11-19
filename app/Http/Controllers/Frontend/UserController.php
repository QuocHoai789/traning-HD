<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use Carbon\Carbon;
use App\Models\User;
class UserController extends Controller
{
    
    public function login(){
        return view('frontend.login');
    }
    public function postLogin(UserLoginRequest $req){
        // $req->validate(['Email'=>'required', 'Password'=>'required']);
        $email = $req->Email;
        $pass = $req->Password;
        $result = ['email'=>$email, 'password'=>$pass];
        //dd($result);
        if(Auth::attempt($result)){
            $user = User::find( Auth::user()->id);
            $user->last_login = Carbon::now();
            $user->save();
            return redirect()->route('home');
        }else{
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    
}
