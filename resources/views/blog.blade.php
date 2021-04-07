@extends('layouts.app')

<title>Blog</title>

@section('content')
    <body class="bg-gray">
    <header class="page-header valign bg-img" data-overlay-dark="8" data-background="img/2.jpg" data-stellar-background-ratio="0.5" style="height: 200px;">
        <div class="container">
            <div class="row">
                <div class="full-width text-center caption mt-30">
                    <h6><a href="">Blog</a></h6>
                </div>
            </div>
        </div>
    </header>
    <section class="blogs section-padding bg-gray main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="posts blog row mb-md50">
                        @foreach($posts as $post)
                            @foreach($categories as $category)
                                @foreach($users as $user)
                                @if($user->id == $post->id_user && $category->id == $post->id_category)
                                    <div class="col-md-6">
                                        <div class="item">
                                            <div class="post-img">
                                                <a href="post/{{$post->id}}">
                                                    <div class="img">
                                                        <img src="{{asset($post->cover)}}" alt="">
                                                    </div>
                                                </a>
                                                <div class="tag">
                                                    <a><span class="icon"><i class="fas fa-tags"></i></span> {{$category->name}}</a>
                                                </div>
                                            </div>
                                            <div class="cont">
                                                <h6><a href="post/{{$post->id}}">{{Str::limit(strip_tags($post->title), 20)}}</a></h6>
                                                <p>{{ Str::limit(strip_tags($post->description), 40) }}</p>
                                                <div class="info">
                                                    <a><span class="author"><img src="img/blog/01.png" alt=""></span>{{$user->name}}</a>
                                                    <a class="right"><span class="icon"><i class="fas fa-clock"></i></span>{{$post->created_at}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div id="sticky_item" class="side-bar">
                        <div class="widget search">
                            <form action="{{ route('search') }}" method="GET">
                                <input type="text" name="search" placeholder="Type here ..." required>
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Categories</h6>
                            </div>
                            <ul>
                                @foreach($categories as $category)
                                    <form action="{{ route('searchByTag') }}" method="GET">
                                        <li><input name="search" value="{{$category->id}}" required hidden><i class="fas fa-angle-right"></i><button class="searchByTag" type="submit">{{$category->name}}</button></li>
                                    </form>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
@endsection
