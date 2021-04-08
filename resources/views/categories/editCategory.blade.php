@extends('layouts.app')

<title>Edit Category</title>

@section('content')
    @if(Auth::user()->id_role == 1)
    <section class="blogs section-padding main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="posts blog mb-md50">
                        <div class="add-comment">
                            <h5 class="title">Edit category: {{$category->name}}</h5>
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
                            <form method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="name" placeholder="Name" class="@error('name') is-invalid @enderror" value="{{$category->name}}" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <button class="butn butn-bg" type="submit">
                                            <span>Edit category</span>
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
    @endif
@endsection
