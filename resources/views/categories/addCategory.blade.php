@extends('layouts.app')

<title>Add Category</title>

@section('content')
    @if(Auth::user()->id_role == 1)
    <body class="bg-gray">
        <header class="page-header valign bg-img" data-overlay-dark="8" data-background="img/2.jpg" data-stellar-background-ratio="0.5" style="height: 200px;">
            <div class="container">
                <div class="row">
                    <div class="full-width text-center caption mt-30">
                        <h6><a href="">Add new category</a></h6>
                    </div>
                </div>
            </div>
        </header>
        <section class="blogs section-padding bg-gray main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="posts blog mb-md50">
                            <div class="add-comment">
                                <h5 class="title">Add category</h5>
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
                                <form method="POST" action="{{ route('new-category') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="name" placeholder="Name" class="@error('name') is-invalid @enderror" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <button class="butn butn-bg" type="submit">
                                                <span>Add category</span>
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
    </body>
    @endif
@endsection
