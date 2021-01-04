<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Auth;

class UsersControleers extends Controller
{
    //
    public function user(){
        if(Gate::allows('admin')){
            
        }
    }
}
