<?php

namespace App\Http\Controllers;

use App\Business;
use App\RealEstate;
use App\Video;
use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    public function view(Request $req)
    {
        $Video='';
        $videoID = $req->query('locate');
        $Video=Video::where('is_approved','=','Yes')->find($videoID);
        $Business=Business::where('is_approved','=','Yes')->get();
        $Videos=Video::where('is_approved','=','Yes')->get();
        $properties=RealEstate::get();
        
        return view('MainSite.Content.Discover.index',compact("properties","Business",'Videos','Video'));
    }
}
