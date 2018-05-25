<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('type', 'TEACHER')
                        ->where('status', 'ACTIVATED')->get();
        
        $cards = array(
            'card-app-primary',
            'card-app-success',
            'card-app-warning',
            'card-app-danger'
        );
        
        return view('home', compact('teachers', 'cards'));
    }
}
