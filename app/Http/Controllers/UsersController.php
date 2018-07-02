<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class UsersController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:4'
        ]);
        
        // new user
        $user       = new User();
        $user->id   = Uuid::generate();
        $user->type = 'TEACHER';
        $user->fill($request->all());
        
        if ($user->save())
        {
            $request->session()->flash('message', [
                'alert' => 'success',
                'text'  => 'User saved'
            ]);
            
            return redirect()->route('users');
        }
        else
        {
            $request->session()->flash('message', [
                'alert' => 'error',
                'text'  => 'Error to save'
            ]);
            
            return redirect()->route('user.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        if (Auth::user()->type == 'ADMINISTRATOR' && Auth::user()->id != $user->id) {
            return view('users.showAdmin', compact('user'));
        } else {
            return view('users.show', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        // validate fields
        $this->validate($request, [
            'name'     => 'required',
            'password' => 'nullable|confirmed|min:4',
            'about'    => 'required'
        ]);
    
        // check if password exist
        $request->has('password') ? $user->fill($request->all()) : $user->fill($request->except('password'));
        
        if ($user->update()) {
            $request->session()->flash('message', [
                'alert' => 'success',
                'text'  => 'Profile updated'
            ]);
    
            return redirect()->route('profile', $user->id);
        } else {
            $request->session()->flash('message', [
                'alert' => 'error',
                'text'  => 'Error to update'
            ]);
    
            return redirect()->route('profile', $user->id);
        }
    }
    
    /**
     * Upload photo profile
     *
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadPhoto(Request $request, $id)
    {
        $user = User::find($id);
    
        $hasFile = $request->hasFile("photo") && $request->photo->isValid();
    
        // check if photo exist
        if ($hasFile) {
            // get image extension
            $extension = $request->photo->extension();
            $user->photo = "$user->id.$extension";
    
            if ($user->update()) {
                // store the image
                $request->photo->storeAs("avatars", "$user->photo");
                
                $request->session()->flash('message', [
                    'alert' => 'success',
                    'text'  => 'Photo uploaded'
                ]);
        
                return redirect()->route('profile', $user->id);
            } else {
                $request->session()->flash('message', [
                    'alert' => 'error',
                    'text'  => 'Error to upload'
                ]);
        
                return redirect()->route('profile', $user->id);
            }
        } else {
            $request->session()->flash('message', [
                'alert' => 'error',
                'text'  => 'You need to select a image'
            ]);
    
            return redirect()->route('profile', $user->id);
        }
    }
    
    /**
     * View teacher detail
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function teacherView($id)
    {
        // teacher info
        $teacher = User::find($id);
        
        // average rate
        if ($teacher->teacher_rates->sum('star') > 0) {
            $rate = $teacher->teacher_rates->sum('star') / $teacher->teacher_rates->count();
        } else {
            $rate = 0;
        }
        
        return view('users.teacher', compact('teacher', 'rate'));
    }
    
    /**
     * Change user status
     *
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus(Request $request, $id)
    {
        $user = User::find($id);
        
        if ($user->status == 'ACTIVATED') {
            $user->status = 'DEACTIVATED';
            
            $message = 'User deactivated';
        } else {
            $user->status = 'ACTIVATED';
    
            $message = 'User activated';
        }
    
        if ($user->update()) {
            $request->session()->flash('message', [
                'alert' => 'success',
                'text'  => $message
            ]);
        
            return redirect()->route('user', $user->id);
        } else {
            $request->session()->flash('message', [
                'alert' => 'error',
                'text'  => 'Error to change status'
            ]);
        
            return redirect()->route('user', $user->id);
        }
    }
}
