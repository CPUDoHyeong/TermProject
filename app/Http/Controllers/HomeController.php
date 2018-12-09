<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $user_email = Auth::user()->email;

            
            
            $user = DB::table('users')->where('email', '=', $user_email)->first();
            $point = $user->point;
            
            return view('home.index')->with('point', $point);
        } else {
            return view('home.index');
        }
        
    }
}
