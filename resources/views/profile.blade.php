@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your profile</div>
                    <div class="card-body">
                        <img src="uploads/avatars/{{$user->img}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; ">
                        {{$user->surname}} {{$user->name}}
                        <form enctype="multipart/form-data" action="/profile" method="POST" >
                            <label>Upload the avatar</label><br>
                            <input type="file" name="avatar">
                            <button type="submit" class="btn btn-sm btn-success">Send</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
