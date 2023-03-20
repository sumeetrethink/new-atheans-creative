<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    //                                  MAIN SITE WORK

    //                                  login work
    public function loginView()
    {
        return view('MainSite.Login.index');
    }
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', '=', $req->email)
            ->first();
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                session()->put('user', $req->email);
                return redirect('/');
            } else {
                session(['msg-success' => 'Wrong Credentials']);
            }
        }
    }

    //                                 register as user
    public function UserRegisterView(Request $req)
    {
        return view('MainSite.Register.index');
    }
    public function UserRegister(Request $req)
    {
        $req->validate([
            "first_name"=>'required',
            "last_name"=>'required',
            "user_name"=>'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            "phone"=>'required',
            "zip_code"=>'required',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);
        $user=new User();
        $user->first_name=$req->first_name;
        $user->last_name=$req->last_name;
        $user->user_name =$req->user_name;
        $user->phone=$req->phone;
        $user->image=$req->image;
        $user->email =$req->email;
        $user->password=Hash::make($req->password);
        $user->zip_code=$req->zip_code;
        $user->lat=$req->lat;
        $user->long=$req->long;
        $user->save();
        return $user;
    }
    public function landingPage()
    {
        return view('MainSite.Content.LandingPage.index');
    }

    public function nacLive()
    {
        return view('MainSite.Content.Live.index');
    }
    public function home()
    {
        return view('MainSite.Content.Home.index');
    }
}
