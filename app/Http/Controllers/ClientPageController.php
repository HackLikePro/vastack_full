<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use DB;

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
        return "1";
      } 
      else
      {
        return "-1";
      }
    }
  
   public function checklogin(Request $request)
   {
       $user = Auth::user();
       if($user){
         return "1";
       }
     else{
       return "-1";
     }
    }
  
  public function getprojectinfo(Request $request)
   {
      $user = Auth::user();
    if($user){
      $projectslist = Project::where('user_id', $user['id'])->get();
      return $projectslist;
    }
    else
    {
      return null;
    }
   }
  
  public function creatproject(Request $request)
   { 
     $user = Auth::user();
//      有错
     if($user){
//        新project内容
        $project = new Project;
       $project['user_id'] = $user['id'];
       $project['describe'] = $request->get("descibe");
       $project['name'] = $request->get("name");
//        $project['duedate'] = $request->get("duedate");
//        $project['task'] = $request->get("task");
//        $project['deliveryable'] = $request->get("deliveryable");
//        $project['url'] = $request->get("url");
//        $project['status'] = $request->get("status");
//        测试
//        $project['user_id'] = $user['id'];
//        $project['describe'] = "test";
//        $project['name'] = "Spring Water 2.0";
       $project['duedate'] = "test";
       $project['task'] = "test";
       $project['deliveryable'] = "test";
       $project['url'] = "test";
       $project['status'] = "t";
       
       
//        写入数据库
       $project -> save();
       $projectslist = Project::where('user_id', $user['id'])->get();
       return  $projectslist;
     }
     else{
       
     }
   }
  
  public function delproject(Request $request)
  {
    $user = Auth::user();
    DB::table('projects')->where('id',$request[0])->where('user_id',$user['id'])->delete();
    $projectslist = Project::where('user_id', $user['id'])->get();
    return $projectslist;
  }
  
}
