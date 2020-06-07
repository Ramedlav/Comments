<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{ // при логауте не передает $posts - разберись. и напиши добавление и вывод комента, зависимость таблиц
//и добавь Юзера в выводе поста и коммента
    public function sendPost(Request $request){
        $this->validate($request,[
            'text'=>'required|max:1500',
            ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $post = new Post;
        $post->fill($data);
        $post->save();

        return redirect('home');
    }

}
