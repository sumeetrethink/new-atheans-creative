<?php

namespace App\Http\Controllers;

use App\Genere;
use App\Like;
use App\User;
use App\Video;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class VideoController extends Controller
{
  public function uploadForm()
  {
    $generes=Genere::get();
    return view('MainSite.Content.UploadVideos.index',compact('generes'));
  }
  public function upload(Request $request)
  {
    $user=User::where('email', '=', session('user')->email)->first(); ;
  
    $request->validate(
      [
        'video_name'=>'required',
        'creater_name'=>'required',
        'genre'=>'required|not_in:0',
        'tags'=>'required',
        'file'=>'required|mimes:mp4,avi,mov|max:1500000',
        'thumbnail'=>'mimes:png,jpeg,jpg|max:1500000',
        'zipcode'=>'required',
        'video_description'=>'required',
        ]
    );
    $file = $request->file('file');
    $originalName = $file->getClientOriginalName();
    $timestamp = time();
    $filename = $timestamp . '_' . $originalName;
    $file-> move(public_path('Data/Video'), $filename);
    if($request->thumbnail) {
      $thumnailRequest = $request->file('thumbnail');
      $originalThumnail = $thumnailRequest->getClientOriginalName();
      $Thumbnailfilename = $timestamp . '_' . $originalThumnail;
      $uploaded=$thumnailRequest->move(public_path('Data/Thumbnail'), $Thumbnailfilename);
    }
    if($uploaded)
    {
      $video=new Video();
      $video->user_id=$user->id;
      $video->video_title=$request->video_name;
      $video->creator_name=$request->creater_name;
      $video->genere_id=$request->genre;
      $video->tags=$request->tags;
      $video->zipcode=$request->zipcode;
      $video->file_name =$filename;
      $video->thumbnail =$Thumbnailfilename;
      $video->description=$request->video_description;
      $video->other_video_link=$request->other_video_link;
      $video->save();
    }
    return redirect()->back()->with('success', 'Video uploaded successfully.');
  }
  public function manageLikes(Request $req)
  {
    
      $user=User::where('email', '=', session('user')->email)->first();
      $alreadyLikes=Like::where('user_id','=',$user->id)->where('video_id','=',$req->videoId)->first();
      
      if($alreadyLikes)
      {
        $alreadyLikes->delete();
        $totalLikes=Like::where('video_id','=',$req->videoId)->get();
        return ["count"=>$totalLikes->count(),"status"=>"unlike"];
      }
      else
      {
        $like=new Like();
        $like->user_id=$user->id;
        $like->video_id=$req->videoId;
        $like->save();
        $totalLikes=Like::where('video_id','=',$req->videoId)->get();
        return ["count"=>$totalLikes->count(),"status"=>"liked"];

      }
     
  }
  public function manageVotes(Request $req)
  {
      $user=User::where('email', '=', session('user')->email)->first();
      $alreadyVoted=Vote::where('user_id','=',$user->id)->first();
      if($alreadyVoted)
      {
        $alreadyVoted->delete();
        $totalVotes=Vote::where('video_id','=',$req->videoId)->get()->count();
        return ["count"=>$totalVotes,"status"=>"unvoted"];
      }
      else{
        $vote=new Vote();
        $vote->user_id=$user->id;
        $vote->video_id=$req->videoId;
        $vote->save();
        $totalVotes=Vote::where('video_id','=',$req->videoId)->get()->count();
        return ["count"=>$totalVotes,"status"=>"vote"];

      }
  }
  public function editForm(Request $req)
  {
      $querry = $req->query('id');
        
      if($querry)
      {
        $id= Crypt::decryptString($querry);
        $video=Video::find($id);
        $generes=Genere::get();
        return view('MainSite.Content.UploadVideos.editVideo',compact('video','generes'));
      }
  }
  public function edit(Request $request)
  {
    $user=User::where('email', '=', session('user')->email)->first(); ;
  
    $request->validate(
      [
        'video_name'=>'required',
        'creater_name'=>'required',
        'genre'=>'required|not_in:0',
        'tags'=>'required',
        
        'thumbnail'=>'mimes:png,jpeg,jpg|max:1500000',
        'zipcode'=>'required',
        'video_description'=>'required',
        ]
    );
    $video= Video::where('user_id','=',$user->id)->find($request->video_id);
    $timestamp = time();
    if($request->thumbnail) {
      $thumnailRequest = $request->file('thumbnail');
      $originalThumnail = $thumnailRequest->getClientOriginalName();
      $Thumbnailfilename = $timestamp . '_' . $originalThumnail;
      $uploaded=$thumnailRequest->move(public_path('Data/Thumbnail'), $Thumbnailfilename);
      $video->thumbnail =$Thumbnailfilename;
    }
  
      
      $video->user_id=$user->id;
      $video->video_title=$request->video_name;
      $video->creator_name=$request->creater_name;
      $video->genere_id=$request->genre;
      $video->tags=$request->tags;
      $video->zipcode=$request->zipcode;
     
      $video->description=$request->video_description;
      $video->other_video_link=$request->other_video_link;
      $video->save();
    
    return redirect()->back()->with('success', 'Video updated successfully.');
  }
      



  }
