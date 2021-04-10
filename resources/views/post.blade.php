@extends('layouts.app')

<title>Blog | {{$post->title}}</title>

@section('content')
    <section class="blogs section-padding main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="posts blog mb-md50">
                        @foreach($categories as $category)
                            @foreach($users as $user)
                                @if($user->id == $post->id_user && $category->id == $post->id_category)
                                    <div class="item">
                                        <div class="post-img">
                                            <div class="img">
                                                <img src="{{asset($post->cover)}}" alt="">
                                            </div>
                                            <div class="tag">
                                                <a><span class="icon"><i class="fas fa-tags"></i></span> {{$category->name}}</a>
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <h6><a>{{$post->title}}</a></h6>
                                            <p class="spical">{{$post->description}}</p>
                                            <div class="info">
                                                <a><span class="author"><img src="{{asset($user->image)}}" alt=""></span> {{$user->name}}</a>
                                                <a class="right"><span class="icon"><i class="fas fa-clock"></i></span> {{$post->created_at}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                        <div class="comments mb-30">
                            <h5 class="title">Comments</h5>
                            @foreach($comments as $comment)
                                @foreach($users as $user)
                                    @if($user->id == $comment->id_user && $comment->id_post == $post->id)
                                    <div class="com">
                                        <div class="img">
                                            <img src="{{asset($user->image)}}" alt="">
                                        </div>
                                        <div class="cont">
                                            <h6>{{$user->name}}</h6>
                                            <span>{{$comment->created_at}}</span>
                                            <p>{{$comment->comment}}</p>
                                            @if(Auth::user() && Auth::user()->id_role == 1)
                                                <form method="POST" action="{{ route('delete-comment') }}">
                                                    @csrf
                                                    <input type="text" value="{{$comment->id_post}}" name="id_post" readonly required hidden>
                                                    <input type="text" value="{{$comment->id}}" name="id_comment" readonly required hidden>
                                                    <button type="submit" class="reply delete-comment">Delete</button>
                                                </form>
                                            @endif
                                            @if(Auth::user() && Auth::user()->id == $user->id && Auth::user()->id_role != 1)
                                                <form method="POST" action="{{ route('delete-comment') }}">
                                                    @csrf
                                                    <input type="text" value="{{$comment->id_post}}" name="id_post" readonly required hidden>
                                                    <input type="text" value="{{$comment->id}}" name="id_comment" readonly required hidden>
                                                    <button type="submit" class="reply delete-comment">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                            @endforeach
                        </div>
                            @if(Auth::user())
                        <div class="add-comment">
                            <h5 class="title">Leave a comment</h5>
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
                            <form method="POST" action="{{ route('new-comment') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea placeholder="Comment" name="comment" required class="@error('comment') is-invalid @enderror"></textarea>
                                        @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="number" name="id_post" value="{{$post->id}}" readonly required hidden>
                                        <input type="number" name="id_user" value="{{Auth::user()->id}}" readonly required hidden>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="butn butn-bg" type="submit">
                                            <span>Post Comment</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            @endif
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
@endsection
