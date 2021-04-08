@extends('layouts.app')

<title>Home</title>

@section('content')
    <section class="hero-cr section-padding bg-fixed" data-overlay-light="9">
        <div class="container">
            <div class="row">
                <div class="intro offset-lg-1 col-lg-10 text-center">
                    <h6 class="sub-title">Who We Are And What Can We do?</h6>
                    <h4>Welcome To Our Blog</h4>
                    <p>In the blog you can <b>post</b> any entries, as well as view, read the records of other people, in addition, you can <b>leave comments</b>, but for this you will need to register.</p>
                </div>
                <div class="full-width mt-80 mb-80">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="item mb-md50">
                                <span class="icon icon-basic-book-pen"></span>
                                <h5>Creative Design</h5>
                                <p>The blog has a creative design, as well as many conveniences for you, in addition you can make a post about our design :)</p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="item bg-color mb-md50">
                                <span class="icon icon-basic-cards-diamonds"></span>
                                <h5>Love the posts</h5>
                                <p>We always love and appreciate our community of posters because it's a way for us to communicate and learn new things</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="item bg-dark">
                                <span class="icon icon-basic-pencil-ruler"></span>
                                <h5>Community</h5>
                                <p>Our community can always help you, if you need help you can easily make an entry and people will answer you in the comments</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="numb text-center mb-md50">
                        <h3><span class="count">638</span>+</h3>
                        <h6>Comments</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="numb text-center mb-md50">
                        <h3><span class="count">465</span>+</h3>
                        <h6>Posts</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="numb text-center mb-sm50">
                        <h3><span class="count">100</span>+</h3>
                        <h6>Peoples</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="numb text-center">
                        <h3><span class="count">50</span>+</h3>
                        <h6>Categories</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
