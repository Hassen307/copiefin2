<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use DB;
use Illuminate\Support\Facades\Config;

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
        <br><br><br><br><br><br>
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
       DB::table("permissions")->where('name',$permission)->delete();
       return redirect()->route('permissions.index')
                        ->with('success','Permission deleted successfully');
    }
}
