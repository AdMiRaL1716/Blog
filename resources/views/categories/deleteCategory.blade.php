@extends('layouts.app')

<title>Delete Category</title>

@section('content')
    @if(Auth::user()->id_role == 1)
    <body class="bg-gray">
    <header class="page-header valign bg-img" data-overlay-dark="8" data-background="img/2.jpg" data-stellar-background-ratio="0.5" style="height: 200px;">
        <div class="container">
            <div class="row">
                <div class="full-width text-center caption mt-30">
                    <h6><a href="">Delete category</a></h6>
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
                            <h5 class="title">Delete category: {{$category->name}} ?</h5>
                            <form method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('categories')}}" class="btn">I don't want to</a>
                                        <button class="butn butn-bg" type="submit">
                                            <span>Delete category</span>
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
