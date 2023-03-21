<?php

namespace App\Http\Controllers;

use App\Genere;
use App\User;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
  public function uploadForm()
  {
    $generes=Genere::get();
    return view('MainSite.Content.UploadVideos.index',compact('generes'));
  }
  public function upload(Request $request)
  {
    $user=User::where('email', '=', session('user'))->first(); ;
  
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
    $uploaded= $file->storeAs('videos', $filename);
    if($request->thumbnail) {
      $thumnailRequest = $request->file('thumbnail');
      $originalThumnail = $thumnailRequest->getClientOriginalName();
      $Thumbnailfilename = $timestamp . '_' . $originalThumnail;
      $thumnailRequest->storeAs('thumbnail', $Thumbnailfilename);
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
}
