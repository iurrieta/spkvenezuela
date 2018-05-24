<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $users = User::all();
        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
    
        // check if photo exist
        if ($request->hasFile('photo')) {
            
            // get current time and append the upload file extension to it,
            // then put that name to $photoName variable.
            $avatar = time().'.'.$request->photo->getClientOriginalExtension();
    
            // talk the select file and move it public directory and make avatars
            // folder if doesn't exsit then give it that unique name.
            $request->photo->move(public_path('avatars'), $avatar);
            
            $user->photo = $avatar;
    
            if ($user->update()) {
                $request->session()->flash('message', [
                    'alert' => 'success',
                    'text'  => 'Photo saved'
                ]);
        
                return redirect()->route('profile', $user->id);
            } else {
                $request->session()->flash('message', [
                    'alert' => 'error',
                    'text'  => 'Error to save'
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
}
