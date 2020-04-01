<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function users(){
        $users = user::all();
    }

    public function products(){

    }

    public function shops(){

    }

    public function oders(){

    }
    public function income(){

    }

    public function payouts(){

    }

    public function messages(){

    }

    public function delivery(){
        
    }
}
