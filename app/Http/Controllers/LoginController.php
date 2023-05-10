<?php

namespace App\Http\Controllers;

use App\Business;
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
                session()->put('user', $user);
                return redirect('/home');
            } else {
                return redirect('/login')->with(['msg-error-password' => 'Wrong password']);
            }
        } else {
            return redirect('/login')->with(['msg-error-username' => "Username doesn't exists"]);
        }
    }

    //                                 register as user
    public function UserRegisterView(Request $req)
    {
        return view('MainSite.Register.index');
    }
    public function UserRegister(Request $req)
    {
        $timestamp = time();
        $req->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "user_name" => 'required|unique:users,user_name',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            "phone" => 'required',
            "zip_code" => 'required',
            'image' => 'mimes:png,jpeg,jpg',
        ]);
        $user = new User();
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->user_name = $req->user_name;
        $user->phone = $req->phone;
        $user->image = $req->image;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->zip_code = $req->zip_code;
        $user->lat = $req->lat;
        $user->long = $req->long;
        if ($req->image) {
            $thumnailRequest = $req->file('image');
            $originalThumnail = $thumnailRequest->getClientOriginalName();
            $Thumbnailfilename = $timestamp . '_' . $originalThumnail;
            $uploaded = $thumnailRequest->move(public_path('Data/User/Profile'), $Thumbnailfilename);
            $user->image = $Thumbnailfilename;
        }
        $result = $user->save();
        if ($result) {
            session()->put('user', $user);
            return redirect('/home');
        } else {
            return redirect('user/register')->with(['msg-errror' => 'Something went wrong please try again']);
        }
    }
    public function logout()
    {
        session()->remove('user');
        return redirect('/');
    }
    public function landingPage()
    {


        return view('MainSite.Content.LandingPage.index');
    }

    //                  ADMIN auth
    public function adminLoginForm()
    {
        return view('Admin.Auth.login');
    }
    public function adminLogin(Request $req)
    {
        $req->validate(['email' => 'required', 'password' => 'required']);
        $user = User::where('role_id', '=', 1)->where('email', '=', $req->email)
            ->first();
        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                session()->put('admin', $user);
                return redirect('/admin/users');
            } else {
                return redirect('/admin/login')->with(['msg-error-password' => 'Wrong password']);
            }
        } else {
            return redirect('/admin/login')->with(['msg-error-username' => "Username doesn't exists"]);
        }
    }
    public function adminLogout()
    {
        session()->remove('admin');
        return redirect('/admin/login');
    }
    //      landing pages

    public function nacLive(Request $req)
    {
        $querry = $req->query('watch');

        if ($querry) {
            $id = Crypt::decryptString($querry);
            $oneVideo =Video::where('is_approved','=','Yes')->with('likes')->with('votes')->find($id);
        } else {
            
            $oneVideo = Video::where('is_approved','=','Yes')->with('likes')->with('votes')->inRandomOrder()->first();
        }
        $user = User::find($oneVideo->user_id);
        $moreVideos=Video::where('is_approved','=','Yes')
                        ->where('id', '!=', $oneVideo->id)
                        ->where('genere_id','=',$oneVideo->genere_id)
                        ->with('likes')->with('votes')
                        ->get();


        return view('MainSite.Content.Live.index', compact('oneVideo', 'moreVideos','user'));
    }
    public function home()
    {

        $videos = Video::where('is_approved','=','Yes')->with('likes')->with('votes')->with('genere')->inRandomOrder()->limit(20)
            ->get();
        return view('MainSite.Content.Home.index', compact('videos'));
    }
    public function globalSearch(Request $req)
    {
        $searchTerm = $req->searchInput;
        if (!$searchTerm) {
            $videos = collect(); // create an empty collection
        } else {
            $videos = Video::with('likes')
                        ->with('votes')
                        ->with('genere')
                        ->where(function ($query) use ($searchTerm) {
                            $query->where('video_title', 'LIKE', '%' . $searchTerm . '%');
                        })
                        ->where('is_approved','=','Yes')
                        ->inRandomOrder()
                        ->get();
        }
            return view('MainSite.Content.GlobalSearch.index', compact('videos'));
        }
                   
            


    // dashboard
    public function dashbaord()
    {
        $users = User::get()->count();
        $business = Business::get()->count();
        $videos = Video::where('is_approved','=','Yes')->get()->count();
        return view('Admin.Dashboard.index', compact('users', 'business','videos'));
    }
}
