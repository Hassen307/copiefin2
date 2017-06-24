<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Permission;
use Image;
use DB;
use Hash;
use Auth;
use File;



class UserController extends Controller
{
    
    
        public function profile(){
    	return view('profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
                $user = Auth::user();
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile', array('user' => Auth::user()) );

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = User::orderBy('id','DESC')->paginate(5);
        $user = Auth::user();
        $role_id=$user->role_id;
        $roles=Role::find($role_id)->name;
        if($roles=='admin'){
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        
        }
        else{
            return view('errors.403');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $roles = Role::pluck('name','id');
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] =bcrypt($input['password']);
    
         
       $idrole=$request->input('roles');
       $role_id = head($idrole); 
       array_pop($input);
       $input['role_id'] = $role_id;
       $input['verified']=true;
     
         
        $user = User::create($input);
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { $user1 = Auth::user();
        $role_id1=$user1->role_id;
        $roles1=Role::find($role_id1)->name;
        if($roles1=='admin'){
        $user = User::find($id);
        
        $Role_id=$user->role_id;
        $roles = Role::find($Role_id);
       
        $permissions=Permission::pluck('name','id');
        $userPermission = $roles->permissions->pluck('id','id')->toArray();
        foreach ($userPermission as $key => $value) {
         $user_perm[]=$permissions[$value];
         }
        
        return view('users.show',compact('user','user_perm'));
               }
           else{
            return view('errors.403');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::find($id);
        $roles = Role::pluck('name','id');
        $userRole=$user->role_id;
         $user1 = Auth::user();
        $role_id=$user1->role_id;
        $roles1=Role::find($role_id)->name;
        if($roles1=='admin'){
        return view('users.edit',compact('user','roles','userRole'));
         }
        else{
            return view('errors.403');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    

        $input = $request->all();
        $idrole=$request->input('roles');
        $role_id = head($idrole); 
         array_pop($input);
         $input['role_id'] = $role_id;
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = User::find($id);
        $user->update($input);
       

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = Auth::user();
        $role_id=$user->role_id;
        $roles=Role::find($role_id)->name;
        if($roles=='admin'){
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('users.index')
                        ->with('successdel','User deleted successfully');
    }
    else{
            return view('errors.403');
            }
    }
    public function active($id)
    {
        $user1 = Auth::user();
        $role_id=$user1->role_id;
        $roles=Role::find($role_id)->name;
        if($roles=='admin'){
        
         $user = User::find($id);
         
         $user->verified = 1;
         $user->email_token=NULL;
         $user->update();
        return redirect()->route('users.index')
                        ->with('success','User activated successfully');
    }
     else{
            return view('errors.403');
            }
    }  
}
