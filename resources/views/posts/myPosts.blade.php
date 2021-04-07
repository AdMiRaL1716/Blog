@extends('layouts.app')

<title>Your Posts</title>

@section('content')
    <body class="bg-gray">
    <header class="page-header valign bg-img" data-overlay-dark="8" data-background="img/2.jpg" data-stellar-background-ratio="0.5" style="height: 200px;">
        <div class="container">
            <div class="row">
                <div class="full-width text-center caption mt-30">
                    <h6><a href="">Your posts</a></h6>
                </div>
            </div>
        </div>
    </header>
    <section class="blogs section-padding bg-gray main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('status') }}
                        </div>
                    @elseif(session('failed'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('failed') }}
                        </div>
                    @endif
                    <div class="posts blog row mb-md50">
                        @foreach($posts as $post)
                            @foreach($categories as $category)
                            @if(Auth::user()->id == $post->id_user && $category->id == $post->id_category)
                                <div class="col-md-4">
                                    <div class="item">
                                        <div class="post-img">
                                            <div class="img">
                                                <img src="{{asset($post->cover)}}" alt="">
                                            </div>
                                            <div class="tag tag2">
                                                <a href="edit-post/{{$post->id}}"><span class="icon"><i class="fas fa-edit"></i></span></a>
                                                <a href="delete-post/{{$post->id}}"><span class="icon"><i class="fas fa-trash"></i></span></a>
                                            </div>
                                            <div class="tag">
                                                <a href=""><span class="icon"><i class="fas fa-tags"></i></span> {{$category->name}}</a>
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <h6>
                                                <a href="">{{Str::limit(strip_tags($post->title), 20)}}</a>
                                            </h6>
                                            <p>{{ Str::limit(strip_tags($post->description), 40) }}</p>
                                            <div class="info">
                                                <a href=""><span class="author"><img src="img/blog/01.png" alt=""></span>{{Auth::user()->name}}</a>
                                                <a href="" class="right"><span class="icon"><i class="fas fa-clock"></i></span>{{$post->created_at}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
@endsection
