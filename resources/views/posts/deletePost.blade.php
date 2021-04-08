@extends('layouts.app')

<title>Delete Post</title>

@section('content')
    <section class="blogs section-padding main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="posts blog mb-md50">
                        <div class="add-comment">
                            <h5 class="title">Delete post: {{$post->title}} ?</h5>
                            <form method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('myposts')}}" class="btn">I don't want to</a>
                                        <button class="butn butn-bg" type="submit">
                                            <span>Delete post</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
