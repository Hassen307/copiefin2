<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class RoleTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

$admin = new Role();
$admin->name = 'admin';
$admin->description = 'admin'; 
$admin->save();

$user = new Role();
$user->name = 'user';
$user->description = 'simple User ';
$user->save();

$permissions1 = Permission::pluck('id');


foreach ($permissions1 as $permission) {
$admin->attachPermission($permission);
}
 
}
}
