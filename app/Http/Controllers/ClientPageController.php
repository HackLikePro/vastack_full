<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class ClientPageController extends Controller
{
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
      $username = $request->get("username");
      $password = $request->get("password");
      Auth::logout();
      
      if(Auth::attempt(['name' =>  $username, 'password' => $password]))
      {
        //$user2 = Auth::user();
      } 
      else
      {
        return "-1";
      }
    }
  
   public function getaccountinfo(Request $request)
   { 
     $user = Auth::user();
     return $user;    
   }
  
}
