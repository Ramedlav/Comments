<?php

namespace App\Http\Controllers;
use Auth;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function sendComment(Request $request){
        $this->validate($request,[
            'comment'=>'required|max:1500',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $post = new Comment;
        $post->fill($data);
        $post->save();

        return redirect('home');
    }
}
