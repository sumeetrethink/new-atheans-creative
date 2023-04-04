<?php

namespace App\Http\Controllers;

use App\Question;
use App\Response;
use App\SelectedForVote;
use App\User;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BallotController extends Controller
{
    public function view()
    {
        $polling_questions = Question::get();
        $currentUser = User::where('id', '=', session('user')->id)->first();
        $selected_for_votes = \App\Video::join('selected_for_votes', 'videos.id', '=', 'selected_for_votes.video_id')
            ->where('selected_for_votes.user_id', $currentUser->id)
            ->join('generes', 'videos.genere_id', '=', 'generes.id')
            ->orderBy('videos.id', 'desc')
            ->select('videos.*', "videos.id as video_id", 'generes.title as genere_name')
            ->first();

        return view('MainSite.Content.Ballot.index', compact('selected_for_votes', 'polling_questions'));
    }

    public function submitQuestions(Request $request)
    {
        $video_id= $id= Crypt::decryptString($request->video);
        $currentUser = User::where('id', '=', session('user')->id)->first();
        $polling_questions = Question::get();
        foreach ($polling_questions as $key => $item) {
            $reponse = new Response();
            $reponse->question_id = $item->id;
            $reponse->response_type = $request[$item->id];
            $reponse->user_id = $currentUser->id;
            $reponse->save();
        }
        $vote = new Vote();
        $vote->user_id = $currentUser->id;
        $vote->video_id = $video_id;
        $vote->save();
        $selected_for_votes = SelectedForVote::where('video_id', '=', $video_id)->where('user_id', '=', $currentUser->id)->first();
        $result = $selected_for_votes->delete();
        if ($result) {

            return redirect('/ballot')->with(['msg-success' => "You have successfully voted for the video"]);
        }
    }
}
