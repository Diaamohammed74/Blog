<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Diaa Blog</title>

    <!-- Styles -->
    <link href="{{ asset('assets') }}/front/assets/css/core.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/front/assets/css/thesaas.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/front/assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="1200x630wa" href="{{ asset('assets') }}/front/assets/img/1200x630wa.png">
    <link rel="icon" href="{{ asset('assets') }}/front/assets/img/favicon.png">
</head>

<body>


    <!-- Topbar -->
    <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
        <div class="container">

            <div class="topbar-left">
                <button class="topbar-toggler">&#9776;</button>
                <a class="topbar-brand" href="index.html">
                    <img class="logo-default" src="{{ asset('assets') }}/front/assets/img/logo.png" alt="logo">
                    <img class="logo-inverse" src="{{ asset('assets') }}/front/assets/img/logo-light.png"
                        alt="logo"> {{-- the sass logo --}}
                </a>
            </div>


            <div class="topbar-right">
                <ul class="topbar-nav nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('site/home') }}"
                            style="color: black">Home</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: black">Categories <i
                                class="fa fa-caret-down"></i></a>
                        <div class="nav-submenu cols-2">
                            @foreach ($categories as $category)
                                <a class="nav-link"
                                    href="{{ route('category/show', $category->id) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- END Topbar -->



    <!-- Header -->
    <header class="header header-inverse" style="background-color: #9ac29d">
        <div class="container text-center">

            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">

                    <h1 style="color: black">Latest Blog Posts</h1>
                    <p class="fs-20 opacity-70" style="color: black">Read and get updated on how we progress.</p>

                </div>
            </div>

        </div>
    </header>
    <!-- END Header -->




    <!-- Main container -->
    <main class="main-content">




        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Basic cards
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <section class="section bg-gray">
            <div class="container">
                <div class="row gap-y">

                    @forelse ($articles as $article)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card card-hover-shadow">
                                <a href="blog-single.html"><img class="card-img-top"
                                        src="{{ asset('imgs/' . $article->cover) }}" alt="Card image cap"
                                        style="width: 100%; height: 30%;"></a>
                                <div class="card-block">
                                    <h4 class="card-title">{{ $article->title }}</h4>
                                    <p class="card-text">{{ $article->short_description }}
                                    </p>
                                    <a class="fw-600 fs-12" href="{{ route('blog/show', $article->id) }}">Read more <i
                                            class="fa fa-chevron-right fs-9 pl-8"></i></a>
                                    <h6 class="fw-600 fs-12" style="color: gray">Author:{{ $article->user->name }}</h6>
                                </div>
                            </div>
                            <hr style="color: black">
                        </div>
                    @empty
                        <div class="col-12 col-md-8 col-lg-10">
                            <h3 style="text-align: center">There is no Articles related to This
                                Category Yet</h3>
                        </div>
                    @endforelse
                </div>

                <nav class="flexbox mt-30">
                    <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                    <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
                </nav>
            </div>
        </section>






    </main>
    <!-- END Main container -->






    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row gap-y align-items-center">
                <div class="col-12 col-lg-3">
                    <p class="text-center text-lg-left">
                        <a href="index.html"><img src="{{ asset('assets') }}/front/assets/img/logo.png"
                                alt="logo"></a>
                    </p>
                </div>

                <div class="col-12 col-lg-6">
                    <ul class="nav nav-primary nav-hero">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="block-feature.html">Features</a>
                        </li>
                        <li class="nav-item hidden-sm-down">
                            <a class="nav-link" href="page-pricing.html">Pricing</a>
                        </li>
                        <li class="nav-item hidden-sm-down">
                            <a class="nav-link" href="page-contact.html">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="social text-center text-lg-right">
                        <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i
                                class="fa fa-facebook"></i></a>
                        <a class="social-twitter" href="https://twitter.com/thethemeio"><i
                                class="fa fa-twitter"></i></a>
                        <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i
                                class="fa fa-instagram"></i></a>
                        <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i
                                class="fa fa-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->



    <!-- Scripts -->
    <script src="{{ asset('assets') }}/front/assets/js/core.min.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/thesaas.min.js"></script>
    <script src="{{ asset('assets') }}/front/assets/js/script.js"></script>

</body>

</html>
