<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        
        $this->validate($request, [
            'comment' => 'required'
        ]);
        
        $comment->fill($request->all());
    
        if ($comment->save()) {
            $request->session()->flash('message', [
                'alert' => 'success',
                'text'  => 'Comment saved'
            ]);
        
            return redirect()->route('teacher', $request->teacher);
        } else {
            $request->session()->flash('message', [
                'alert' => 'error',
                'text'  => 'Error to save'
            ]);
        
            return redirect()->route('teacher', $request->teacher);
        }
    }
}
