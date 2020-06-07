<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
//use App\Http\Controllers\Auth;
class UserController extends Controller
{
    public function profile(){
        return view('profile', ['user' => Auth::user()]);
    }

    public function update_avatar(Request $request){
        if ($request->hasFile('avatar')){//если файл существует в полученном запросе
            $avatar = $request->file('avatar');//получаем его и даем имя
            $filename = time(). '.' .$avatar->getClientOriginalExtension();//Текщее время + расширение файла
            //а теперь сохраним изменив размер и присвоим имя с помощью установленного пакета Intervention Image
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));

            $user = Auth::user();
            $user->img = $filename;
            $user->save();
        }

        return view('profile', ['user' => Auth::user()]);
    }
}
