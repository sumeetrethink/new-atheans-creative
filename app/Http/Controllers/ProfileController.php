<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function viewProfile()
    { 
        $currentUser=User::where('id','=',session('user')->id)->first();
        $topLikedVideos = \App\Video::join('likes', 'videos.id', '=', 'likes.video_id')
                        ->where('likes.user_id', $currentUser->id)
                        ->join('generes', 'videos.genere_id', '=', 'generes.id')
                        ->orderBy('videos.id', 'desc')
                        ->limit(6)
                        ->select('videos.*',"videos.id as video_id" ,'generes.title as genere_name',)
                        ->get();
        $votedVidoes = \App\Video::join('votes', 'videos.id', '=', 'votes.video_id')
                        ->where('votes.user_id', $currentUser->id)
                        ->join('generes', 'videos.genere_id', '=', 'generes.id')
                        ->orderBy('videos.id', 'desc')
                        ->limit(6)
                        ->select('videos.*',"videos.id as video_id" ,'generes.title as genere_name',)
                        ->get();
        $yourVideos = \App\Video::where('user_id', $currentUser->id)
                        ->join('generes', 'videos.genere_id', '=', 'generes.id')
                        ->orderBy('videos.id', 'desc')
                        ->select('videos.*',"videos.id as video_id" ,'generes.title as genere_name',)
                        ->get();                
                    
        return view('MainSite.Content.Profile.view',compact('topLikedVideos','votedVidoes','yourVideos'));
    }
    public function update(Request $req)
    {
       $currentUser=User::where('id','=',session('user')->id)->first();
       
       $req->validate([
           'first_name'=>'required',
           'last_name'=>'required',
           'user_name'=>'required',
           'phone'=>'required',
           'email'=>'required',
           'zipcode'=>'required',
           'password'=>'required',
           'password'  => 'required|same:confirm_password|min:6',
        ]);
        $currentUser->first_name=$req->first_name;
        $currentUser->last_name=$req->last_name;
        $currentUser->user_name =$req->user_name;
        $currentUser->phone=$req->phone;
        $currentUser->image=$req->image;
        $currentUser->email =$req->email;
        $currentUser->password=Hash::make($req->password);
        $currentUser->zip_code=$req->zipcode;
        $currentUser->lat=$req->lat;
        $currentUser->long=$req->long;
        $currentUser->update();
        return redirect('/user/profile')->with(['success'=>"Profile has been updated"]);

    }
}
