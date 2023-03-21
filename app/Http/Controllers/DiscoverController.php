<?php

namespace App\Http\Controllers;

use App\Business;
use App\Video;
use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    public function view()
    {
        $Business=Business::get();
        $Videos=Video::get();
        return view('MainSite.Content.Discover.index',compact("Business",'Videos'));
    }
}
