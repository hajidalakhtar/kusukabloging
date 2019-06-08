<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kusuka Bloging</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediumish.css') }}" rel="stylesheet">
    <style>
        .rp-container {
            margin: auto;
            width: 60%;
        }

        /* CSS Test begin */

        .comment-box {
            margin-top: 10px !important;
        }

        /* CSS Test end */

        .comment-box img {
            width: 50px;
            height: 50px;
        }

        .comment-box .media-left {
            padding-right: 10px;
            width: 65px;
        }

        .comment-box .media-body h4 {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .comment-box .media-body .media h4 {
            margin-bottom: 0;
        }

        .comment-box .media-heading {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 7px 10px;
            position: relative;
            margin-bottom: -1px;
        }



        .context-dark,
        .bg-gray-dark,
        .bg-primary {
            color: rgba(255, 255, 255, 0.8);
        }

        .footer-classic a,
        .footer-classic a:focus,
        .footer-classic a:active {
            color: #ffffff;
        }

        .nav-list li {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .nav-list li a:hover:before {
            margin-left: 0;
            opacity: 1;
            visibility: visible;
        }

        ul,
        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .social-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            padding: 23px;
            font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
        }

        .social-container .col {
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-list li a:before {
            text-decoration: none;
        }



        @media (max-width: 1024px) {
            .img-rp {
                margin-left: 35%;
                /* background-color: red; */
            }

            .rp-container {
                width: 90%;
            }
        }
    </style>
</head>

<body style="background-color: white">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 style="font-family: 'Anton', sans-serif;"> KusukaBloging</h1>
                </a>



            </div>
        </nav>
        <main>
            @yield('content')
        </main>
        <br>
        <footer class="section footer-classic context-dark bg-image mt-5 "
            style="background: white; border-top:1px solid #D8D8D8">
            <div class="container pt-5 text-dark ">
                <div class="row row-30">
                    <div class="col-md-4 col-xl-5">
                        <div class="pr-xl-4"><a class="brand text-dark h2 " href="{{Route('home')}}"
                                style="text-decoration:none">Kusuka Bloging</a>
                            <p class="mt-3">KusukaBloging Adalah Sebuah website untuk anda membaca berbagai macam
                                artikel,Blog,novel,dan
                                karya tulis lain nya </p>
                            <!-- Rights-->
                            <p class="rights"><span>©  </span><span
                                    class="copyright-year">2019</span><span> </span><span>Made With &nbsp; <b> <i
                                            class="fab fa-laravel"></i></b> &nbsp; By Hajid Al Akhtar</span></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5>Contacts</h5>
                        <dl class="contact-list">
                            <dt>email:</dt>
                            <dd><a href="mailto:hajidalakhtar@gmail.com" class="text-dark">hajidalakhtar@gmail.com</a>
                            </dd>
                        </dl>
                        <dl class="contact-list">
                            <dt>github:</dt>
                            <dd>hajidalakhtar</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-md-4 col-xl-3 ">
                        <h5>Links</h5>
                        <ul class="nav-list pb-4 ">
                            <li><a href="#" class="text-dark" style="text-decoration:none">Home</a></li>
                            <li><a href="#" class="text-dark" style="text-decoration:none">Api</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </footer>
    </div>
</body>

</html>