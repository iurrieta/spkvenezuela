<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['becomeTeacher', 'becomeTeacherSendMail']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('type', 'TEACHER')
                        ->where('status', 'ACTIVATED')
                        ->paginate(9);
        
        $cards = array(
            'card-app-primary',
            'card-app-success',
            'card-app-warning',
            'card-app-danger'
        );
        
        return view('home', compact('teachers', 'cards'));
    }
    
    /**
     * View to send email
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function becomeTeacher()
    {
        return view('teacher');
    }
    
    public function becomeTeacherSendMail(Request $request)
    {
        $name = $request->name;
        
        $email = $request->email;
        
        $msg = $request->msg;
        
        Mail::send('emails.contact', compact('name', 'email', 'msg'), function ($message) {
        
            $message->from('spkvenezuela@gmail.com', 'SPK Venezuela');
            $message->to('spkvenezuela@gmail.com');
            $message->subject('Become a teacher');
        });
        
        return redirect()->route('becomeTeacher');
    }
}
