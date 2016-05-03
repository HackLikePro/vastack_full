<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use App\Project;
use App\Note;
use App\Http\Requests;
use Illuminate\Http\Request;
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
    $deletproject = Project::where('id', $request[0])->first();
    
    DB::table('projects')->where('id',$request[0])->where('user_id',$user['id'])->delete();
    DB::table('notes')->where('project_id',$deletproject['name'])->where('user_id',$user['id'])->delete();
//     因为note table 中存的 project_id 实为 project 的名字 所以在这里删project时有可能把同名project的note也删掉
    $projectslist = Project::where('user_id', $user['id'])->get();
    return $projectslist;
  }
  
  public function getnoteinfo(Request $request)
   {
      $user = Auth::user();
       if($user)
       {
         $user_id = $user['id'];
         $notelist = new Note;
         $notelist = Note::where('user_id',$user_id)->get(); 
         return $notelist;
       }
  }
  
  public function creatnote(Request $request)
   {
      $user = Auth::user();
       if($user)
       {
         $user_id = $user['id'];
         $newnote = new Note;
         $newnote['user_id'] = $user_id;
         $newnote['project_id'] = $request -> get('project');
         $newnote['note'] = $request -> get('note');
         $newnote['status'] = "1";
//          测试
//          $newnote['user_id'] = "1";
//          $newnote['project_id'] = "1";
//          $newnote['note'] = "123";
//          $newnote['status'] = "1";
         
         $newnote -> save();
         $notelist = Note::where('user_id', $user['id'])->get();
         return $notelist;
       }
  }
  
  public function delnote(Request $request)
   {
    $user = Auth::user();
    DB::table('notes')->where('id',$request[0])->where('user_id',$user['id'])->delete();
    $notelist = Note::where('user_id', $user['id'])->get();
    return $notelist;
   }
  
}
