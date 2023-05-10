<?php

namespace App\Http\Controllers;

use App\Genere;
use App\Like;
use App\User;
use App\Video;
use App\Vote;
use App\SelectedForVote;
use App\VideoHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
  public function uploadForm()
  {
    $generes = Genere::get();
    return view('MainSite.Content.UploadVideos.index', compact('generes'));
  }
  public function upload(Request $request)
  {
    $user = User::where('email', '=', session('user')->email)->first();;

    $request->validate(
      [
        'video_name' => 'required',
        'creater_name' => 'required',
        'genre' => 'required|not_in:0',
        'tags' => 'required',
        'file' => 'required|mimes:mp4,avi,mov|max:1500000',
        // 'thumbnail' => 'mimes:png,jpeg,jpg|max:1500000',
        'zipcode' => 'required',
        'video_description' => 'required',
      ]
    );
    $file = $request->file('file');
    $originalName = $file->getClientOriginalName();
    $timestamp = time();
    $filename = $timestamp . '_' . $originalName;
    $file->move(public_path('Data/Video'), $filename);
    if ($request->thumbnail) {
      $thumnailRequest = $request->file('thumbnail');
      $originalThumnail = $thumnailRequest->getClientOriginalName();
      $Thumbnailfilename = $timestamp . '_' . $originalThumnail;
      $uploaded = $thumnailRequest->move(public_path('Data/Thumbnail'), $Thumbnailfilename);
    }
    if ($uploaded) {
      $video = new Video();
      $video->user_id = $user->id;
      $video->video_title = $request->video_name;
      $video->creator_name = $request->creater_name;
      $video->genere_id = $request->genre;
      $video->tags = $request->tags;
      $video->zipcode = $request->zipcode;
      $video->file_name = $filename;
      $video->thumbnail = $Thumbnailfilename;
      $video->description = $request->video_description;
      $video->other_video_link = $request->other_video_link;
      $video->save();
    }
    return redirect()->back()->with('success', 'Video uploaded successfully.');
  }
  public function manageLikes(Request $req)
  {

    $user = User::where('email', '=', session('user')->email)->first();
    $alreadyLikes = Like::where('user_id', '=', $user->id)->where('video_id', '=', $req->videoId)->first();

    if ($alreadyLikes) {
      $alreadyLikes->delete();
      $totalLikes = Like::where('video_id', '=', $req->videoId)->get();
      return ["count" => $totalLikes->count(), "status" => "unlike"];
    } else {
      $like = new Like();
      $like->user_id = $user->id;
      $like->video_id = $req->videoId;
      $like->save();
      $totalLikes = Like::where('video_id', '=', $req->videoId)->get();
      return ["count" => $totalLikes->count(), "status" => "liked"];
    }
  }
  public function manageVotes(Request $req)
  {
    $user = User::where('email', '=', session('user')->email)->first();
    $alreadyVoted = Vote::where('user_id', '=', $user->id)->where('video_id', '=', $req->videoId)->first();
    $alreadySelcted = SelectedForVote::where('user_id', '=', $user->id)->where('video_id', '=', $req->videoId)->first();
    if ($alreadyVoted) {
      return ["status" => "already"];
    } else {
      if ($alreadySelcted) {
        $alreadySelcted->delete();
      }
      $vote = new SelectedForVote();
      $vote->user_id = $user->id;
      $vote->video_id = $req->videoId;
      $vote->save();
      return ["status" => "selected"];
    }
  }
  public function editForm(Request $req)
  {
    $querry = $req->query('id');

    if ($querry) {
      $id = Crypt::decryptString($querry);
      $video = Video::find($id);
      $generes = Genere::get();
      return view('MainSite.Content.UploadVideos.editVideo', compact('video', 'generes'));
    }
  }
  public function edit(Request $request)
  {
    $user = User::where('email', '=', session('user')->email)->first();;

    $request->validate(
      [
        'video_name' => 'required',
        'creater_name' => 'required',
        'genre' => 'required|not_in:0',
        'tags' => 'required',

        'thumbnail' => 'mimes:png,jpeg,jpg|max:1500000',
        'zipcode' => 'required',
        'video_description' => 'required',
      ]
    );
    $video = Video::where('user_id', '=', $user->id)->find($request->video_id);
    $timestamp = time();
    if ($request->thumbnail) {
      $thumnailRequest = $request->file('thumbnail');
      $originalThumnail = $thumnailRequest->getClientOriginalName();
      $Thumbnailfilename = $timestamp . '_' . $originalThumnail;
      $uploaded = $thumnailRequest->move(public_path('Data/Thumbnail'), $Thumbnailfilename);
      $video->thumbnail = $Thumbnailfilename;
    }


    $video->user_id = $user->id;
    $video->video_title = $request->video_name;
    $video->creator_name = $request->creater_name;
    $video->genere_id = $request->genre;
    $video->tags = $request->tags;
    $video->zipcode = $request->zipcode;

    $video->description = $request->video_description;
    $video->other_video_link = $request->other_video_link;
    $video->save();

    return redirect()->back()->with('success', 'Video updated successfully.');
  }
  public function top100()
  {
    $videos = Video::select('videos.*', DB::raw('(SELECT COUNT(*) FROM votes WHERE votes.video_id = videos.id) AS votes_count'))
      ->havingRaw('votes_count > 0')
      ->orderByDesc('votes_count')
      ->limit(100)
      ->get();
    return view('MainSite.Content.Top100.index', compact('videos'));
  }
  public function likedVideos()
  {
    $currentUser = User::where('id', '=', session('user')->id)->first();

    $videos = \App\Video::join('likes', 'videos.id', '=', 'likes.video_id')
      ->where('likes.user_id', $currentUser->id)
      ->join('generes', 'videos.genere_id', '=', 'generes.id')
      ->orderBy('videos.id', 'desc')
      ->select('videos.*', "videos.id as video_id", 'generes.title as genere_name')
      ->where('videos.is_approved','=','Yes')
      ->get();
    return view('MainSite.Content.LikedVideos.index', compact('videos'));
  }
  // user history
  public function historyAdd(Request $req)
  {
    $videId=$req->videoId;
    $is_history=VideoHistory::where("user_id",'=',session('user')->id)->where('video_id','=',$videId)->first();
    if(!$is_history)
    {
      $history=new VideoHistory();
      $history->user_id=session('user')->id;
      $history->video_id=$videId;
      $history->save();
    }
    return true;
  }
    
    
    







  // ADMIN
  public function adminList()
  {
    $videos = DB::table('videos')->join('users', "videos.user_id", "users.id")->select("videos.*", 'users.*', 'videos.id as video_id')->paginate(20);
    return view('Admin.Videos.list', compact('videos'));
  }
  public function adminDelete(Request $req)
  {
    $video = Video::find($req->deleteId);

    if (file_exists(public_path('Data/Video/' . $video->file_name))) {
      unlink(public_path('Data/Video/' . $video->file_name));
    }

    if (isset($video->thumbnail)) {
      if (file_exists(public_path('Data/Thumbnail/' . $video->thumbnail))) {
        unlink(public_path(('Data/Thumbnail/' . $video->thumbnail)));
      }
    }
    $video->delete();

    return redirect('admin/videos')->with(['msg-success' => 'Video has been deleted']);
  }
  public function changeStatus(Request $req)
  {
    $status = '';
    if ($req->id) {
      $video = Video::find($req->id);
      if ($video->is_approved == "Yes") {
        $video->is_approved = "No";
      } else {
        $video->is_approved = "Yes";
      }
      $video->update();
      $status = $video->is_approved;
      return  $status;
    }
  }
  public function getVideoLikesList(Request $req)
  {
    $video_id = $req->query('item');
    // dd($video_id);
    $likes = DB::table('likes')
      ->join('videos', 'likes.video_id', '=', 'videos.id')
      ->join('users', 'likes.user_id', '=', 'users.id')
      ->select('videos.*', 'likes.*', 'users.*')
      ->where('likes.video_id', '=', $video_id)
      ->get();
    return view('Admin.Videos.likesList', compact('likes'));
  }
}
