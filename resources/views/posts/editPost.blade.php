@extends('layouts.app')

<title>Edit Post</title>

@section('content')
    <section class="blogs section-padding main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="posts blog mb-md50">
                        <div class="add-comment">
                            <h5 class="title">Edit post: {{$post->title}}</h5>
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
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="file" name="cover" class="@error('cover') is-invalid @enderror">
                                        @error('cover')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="title" placeholder="Title" class="@error('title') is-invalid @enderror" value="{{$post->title}}" required>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="old" class="@error('old') is-invalid @enderror" value="{{$post->cover}}" required readonly hidden>
                                        @error('old')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 pt-2">
                                        <textarea name="description" placeholder="Text" class="@error('description') is-invalid @enderror" required>{{$post->description}}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <select id="id_category" class="form-control @error('id_category') is-invalid @enderror" name="id_category" required>
                                            @foreach($categories as $category)
                                                @if($post->id_category == $category->id)
                                                    <option value="{{$category->id}}">{{$category->name}} - choice</option>
                                                @endif
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_category')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="id_user" placeholder="User" class="@error('id_user') is-invalid @enderror" value="{{Auth::user()->id}}" required readonly hidden>
                                        @error('id_user')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <button class="butn butn-bg" type="submit">
                                            <span>Edit post</span>
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
