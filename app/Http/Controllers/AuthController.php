<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function login(){
        return view('panel-pages.auth-pages.signin');
    }
    
    public function forgetPassword(){
        return view('panel-pages.auth-pages.forget-password');
    }
}
