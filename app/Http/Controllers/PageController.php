<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Role;
use App\User;
use App\Permission;
use Auth;
use Route;


class PageController extends Controller
{
     public function index(Request $parameter)
    {
 
      $route= Route::getCurrentRoute()->parameters;
      $path=array_first($route);

     $user = Auth::user();
     $id=$user->role_id;
     $role = Role::find($id);
      $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
           ->where("permission_role.role_id",$id)
        ->get();
    
    
      foreach ($rolePermissions as $value) {
$user_perm[]=$value->name;
         }
         $have_perm=FALSE;
    
         if (!empty($user_perm)){
    foreach ($user_perm as $value) {
      if($value==$path){
          $have_perm=true;
      } 
         }
         }
        
         
     if ($have_perm==true){
     return view($path);}  
     else{ return view('errors.403');
     
     
     }
     
     
     
    }
    
    
  
}
