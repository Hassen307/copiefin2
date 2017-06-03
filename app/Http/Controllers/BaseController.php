<?php 
namespace App\Http\Controllers;

use View;
use App\Permission;
//You can create a BaseController:

class Base_Controller extends Controller {

    public function __construct()
    {
        // Build our navigation
        $a=Permission::all()->except([1,2,3]);
         foreach ($a as $per_name) {
         $permissi[]=$per_name->name;
        }
         
        view()->share('permissi',$permissi);
    }
}