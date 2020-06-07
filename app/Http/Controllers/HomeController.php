<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
class HomeController extends Controller
{
    public function index()
    { // напиши добавление и вывод комента, зависимость таблиц
        $posts = Post::all();
        return view('home',['posts'=>$posts]);
    }


}
