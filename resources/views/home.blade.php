@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{--                        если пользователь авторезирован выводим форму--}}
                    @if(Auth::user())
                        <form method="POST" action="{{route('SendPost')}}">
                            @csrf
                            <label for="posts">Create a post</label>
                            <textarea id="posts"  class="form-control" name="text" placeholder="Write the post"></textarea>
                            <button type="submit" class="btn btn-success">Send</button>
                        </form>
{{--                        если есть ошибки(переменная errors не пуста) выводим их в список --}}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    @endif
                        @forelse($posts as $post)
                            <div class="alert alert-primary">
                                <img src="uploads/avatars/{{$post->user->img}}" style="width:35px; height:35px; float:left; border-radius:50%; margin-right:5px; ">
                                {{$post->user->surname}} {{$post->user->name}}<br>
                                <b>{{$post->text}}</b>
                                <div></div>
                                <br>
                                @if(Auth::user())
                                    <a class="btn btn-sm btn-success click" style="float: right;">to answer</a>
                                    <form class="hide" style="display: none" method="post" action="{{route('SendComment')}}">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <textarea id="{{$post->id}}" name="comment"></textarea><br>
                                        <button type="submit" class="btn btn-success btn-sm">Send</button>
                                    </form>
                                @endif
                            </div>
                        <div>
                            @forelse($post->comments as $comment)
                                <div class="alert alert-secondary" style="margin-left: 50px">
                                    <img src="uploads/avatars/{{$post->user->img}}" style="width:35px; height:35px; float:left; border-radius:50%; margin-right:5px; ">
                                    {{$post->user->surname}} {{$post->user->name}}<br>
                                    <b>{{$comment->comment}}</b>
                                </div>
                            @endforeach
                        </div>

                        @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
    <script src="js/nextToggle.js"></script>
@endsection
