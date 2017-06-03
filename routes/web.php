<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', 'Auth\LoginController@logout');
Route::auth();
Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 

Route::group(['middleware' => ['auth']], function() {

	Route::get('home', ['as'=>'home','uses'=>'HomeController@index']);

	Route::resource('users','UserController');

	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:ROLES']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:ROLES']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:ROLES']]);

	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:ROLES']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:ROLES']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:ROLES']]);
	
        
        
        
     
        Route::get('profile' ,'UserController@profile');
        Route::post('profile' ,'UserController@update_avatar');
        
        Route::get('switchinfo/{parameter}' ,['as'=>'page','uses'=>'PageController@index']);
           
        
        Route::resource('permissions','PermissionController');
        Route::post('permissions/create',['as'=>'permissions.store','uses'=>'PermissionController@store','middleware' => ['permission:PERMISSIONS']]);
        Route::delete('permissions/{id}',['as'=>'permissions.destroy','uses'=>'PermissionController@destroy','middleware' => ['permission:PERMISSIONS']]);
    
    
    
  
   
  
        
     
});
