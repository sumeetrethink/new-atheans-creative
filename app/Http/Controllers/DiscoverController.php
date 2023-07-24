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
        $Business=Business::where('is_approved','=','Yes')->limit(6)->latest()->get();
        $Videos=Video::leftJoin('generes','videos.genere_id','generes.id')->where('is_approved','=','Yes')->select('videos.*','generes.title as genere')->get();
        $properties=RealEstate::limit(6)->latest()->get();
        
        return view('MainSite.Content.Discover.index',compact("properties","Business",'Videos','Video'));
    }
    public function getAllBusiness() {
        $Business=Business::where('is_approved','=','Yes')->latest()->get();
        return view('MainSite.Content.Discover.viewAll',compact("Business"));
    }
    public function allProperties() {
        $properties=RealEstate::latest()->get();  
        return view('MainSite.Content.Discover.viewAll',compact("properties"));
    }
}
