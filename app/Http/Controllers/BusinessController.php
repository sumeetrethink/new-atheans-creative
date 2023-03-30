<?php

namespace App\Http\Controllers;

use App\Business;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BusinessController extends Controller
{
  public function getBusiness()
  {
    $Business=Business::get();
    return $Business;
  }
//              ADMINv
  public function list()
  {
      $Businesses = Business::orderBy('id', 'desc')->paginate(20);
      return view('Admin.Business.list', compact('Businesses'));
  }
  public function delete(Request $req)
  {
      $User = Business::find($req->deleteId);
      $User->delete();
      return redirect('/admin/business/')->with(['msg-success' => 'Business has been deleted']);
  }
  public function view(Request $req)
  {
      $business_id = $req->query('item');
      

      if ($business_id) {
          $Business = Business::find($business_id);
          return view('Admin.Business.form', compact('Business'));
      }
      return view('Admin.Business.form');
  }
  public function add(Request $req)
  {
      $req->validate([
          'address' => 'required',
          'phone' => 'required',
         
          'email' => 'required',
          'name' => 'required',
         
      ]);
      $Business = new Business();
      $Business->name = $req->name;
      $Business->email = $req->email;
      $Business->contact = $req->phone;
      $Business->address = $req->address;
      $Business->raw_location = 'null';
      $Business->save();
      return redirect('/admin/business')->with(['msg-success' => 'Business has been added']);
  }
  function update(Request $req)
  {
    $req->validate([
      'address' => 'required',
      'phone' => 'required',
     
      'email' => 'required',
      'name' => 'required',
     
  ]);
  $Business =Business::find($req->id);
  $Business->name = $req->name;
  $Business->email = $req->email;
  $Business->contact = $req->phone;
  $Business->address = $req->address;
  $Business->raw_location = 'null';
  $Business->save();
      $Business->update();
      return redirect('/admin/business')->with(['msg-success' => "Business has been added"]);
  }
}
