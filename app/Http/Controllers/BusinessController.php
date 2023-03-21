<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
  public function getBusiness()
  {
    $Business=Business::get();
    return $Business;
  }
}
