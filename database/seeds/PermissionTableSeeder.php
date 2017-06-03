<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            
        	[
        		'name' => 'USERS'
        		
        		
        	],
        	[
        		'name' => 'ROLES'
        		
        		
        	],
                [
        		'name' => 'PERMISSIONS'
        		
        		
        	]
        	
        	
           
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    
    }
}
