@extends('layouts.app')

<title>Categories</title>

@section('content')
    @if(Auth::user()->id_role == 1)
    <section class="blogs section-padding main-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="posts blog mb-md50">
                        <div class="add-comment">
                            <h5 class="title">Categories</h5>
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
                                        <table class="table">
                                            <tbody>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td style="border: none">{{$category->name}}</td>
                                                    <td class="text-right" style="border: none">
                                                        <a href="edit-category/{{$category->id}}" style="color: crimson">Edit</a>
                                                        <a href="delete-category/{{$category->id}}" style="color: crimson">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
