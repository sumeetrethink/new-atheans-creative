<?php

namespace App\Http\Controllers;

use App\Like;
use App\User;
use App\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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
                return redirect('/home');
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
    public function logout()
    {
        session()->remove('user');
        return redirect('/login');
    }
    public function landingPage()
    {
       
       
        return view('MainSite.Content.LandingPage.index');
    }

    public function nacLive(Request $req)
    {
        $querry = $req->query('watch');
        
        if($querry)
        {
            $id= Crypt::decryptString($querry);
            $oneVideo=$videos = Video::with('likes')->find($id);
        }
        else
        {
            $user = User::where('email', '=', session('user'))
            ->first();
            $oneVideo=$videos = Video::with('likes')->with('votes')->first();
        }
            
            
       
        $moreVideos=Video::where('genere_id','=',$oneVideo->genere_id)->inRandomOrder()->limit(10)->get();
        return view('MainSite.Content.Live.index',compact('oneVideo','moreVideos'));
    }
    public function home()
    {
        
        $topFour=Video::with('likes')->with('votes')->with('genere')->inRandomOrder()->limit(4)
        ->get();
        return view('MainSite.Content.Home.index',compact('topFour'));
    }
}
