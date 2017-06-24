<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

class PermissionController extends Controller
{
     public function index(Request $request)
    {    
        $data = Permission::orderBy('id','DESC')->paginate(5);
        return view('permissions.index',compact('data'));
    }
    
     public function store(Request $request){
        $permission = new Permission();
        $permission->name = strtoupper($request->input('permiss'));
        //create href and view
        $perm_name=$permission->name;
        $naj=Config::get('view.paths');
        $jah=array_first($naj);
        $content = "@extends('layouts.app')
        @section('content')  
        $perm_name
        
        @endsection";
        $fp = fopen($jah . "/".$perm_name.".blade.php","wb");
        fwrite($fp,$content);
        fclose($fp);
        
        $permission->save();
        $admin = Role::where('name', 'admin')->first();
        $admin->attachPermission($permission);
        
        
        
        
       return redirect()->route('permissions.index')
                        ->with('success','Permission created successfully');
    }
    
    
    public function destroy($permission)
    {
       
       $naj1=Config::get('view.paths');
       $perm_name=$permission;
        $jah1=array_first($naj1);
       try{
        unlink($jah1 . "/".$perm_name.".blade.php");
       }
       catch (\Exception $e) {
    
          }
       
        DB::table("permissions")->where('name',$permission)->delete();
       return redirect()->route('permissions.index')
                        ->with('success','Permission deleted successfully');
    }
    
    public function index2(){
        
      
        return view('viewcontent');

       
    }
    public function store2(Request $request){
        
       
      $view_name=$request->permission_name;
      
       $viewcontent =$request->viewcontent;

$content = "@extends('layouts.app')
        @section('content')  
        $viewcontent
        <br><br><br><br><br><br>
        @endsection";

$view_path=Config::get('view.paths');
$view_path=array_first($view_path);




$fp = fopen($view_path . "/".$view_name.".blade.php","wb");
       fwrite($fp,$content);
       fclose($fp);
         return redirect()->route('viewcontent')
                        ->with('success','Content added successfully');
    }
    
    
    
    
     public function edit($permission)
    {
       
        
        $permission=Permission::where('name',$permission) -> first();
        
       
       
       
       

        return view('permissions.edit',compact('permission'));
    }
    
        public function update(Request $request,$id)
    {
         $this->validate($request, [
            'name' => 'required'
        ]);
          
       $input = $request->all();
        $permission = Permission::find($id);
        $view_old=$permission['name'];
        $permission->name = strtoupper($request->input('name'));
        $permission->save();
        
      
      $view_new=$permission->name = strtoupper($request->input('name'));
        
      $view_path=Config::get('view.paths');
      $view_path=array_first($view_path);
      
        rename($view_path . "/".$view_old.".blade.php", $view_path . "/".$view_new.".blade.php");
    }

    
}
