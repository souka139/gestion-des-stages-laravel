<?php

namespace App\Http\Controllers;

use App\Models\stage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        if(Auth::user()->hasRole('student')){
            return view('studentHome');
        }elseif(Auth::user()->hasRole('teacher')){
            return view('teachersHome');
        }elseif(Auth::user()->hasRole('admin')){
            return view('home');
        }
    }

    public function myprofile(){
        return view('myprofile');
    }
}
