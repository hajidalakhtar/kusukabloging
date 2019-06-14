<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>

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
    <script src="{{asset('js/pace.js')}}"></script>
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

        .title {
            border: 0px;
            width: 100%;
            font-size: 3vw;
            outline: none;
        }

        .pace {
            width: 140px;
            height: 300px;
            position: fixed;
            top: -90px;
            right: -20px;
            z-index: 2000;
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
            opacity: 0;
            -webkit-transition: all 2s linear 0s;
            -moz-transition: all 2s linear 0s;
            transition: all 2s linear 0s;
        }

        .pace.pace-active {
            -webkit-transform: scale(.25);
            -moz-transform: scale(.25);
            -ms-transform: scale(.25);
            -o-transform: scale(.25);
            transform: scale(.25);
            opacity: 1;
        }

        .pace .pace-activity {
            width: 140px;
            height: 140px;
            border-radius: 70px;
            background: #1a638d;
            position: absolute;
            top: 0;
            z-index: 1911;
            -webkit-animation: pace-bounce 1s infinite;
            -moz-animation: pace-bounce 1s infinite;
            -o-animation: pace-bounce 1s infinite;
            -ms-animation: pace-bounce 1s infinite;
            animation: pace-bounce 1s infinite;
        }

        .pace .pace-progress {
            position: absolute;
            display: block;
            left: 50%;
            bottom: 0;
            z-index: 1910;
            margin-left: -30px;
            width: 60px;
            height: 75px;
            background: rgba(20, 20, 20, .1);
            box-shadow: 0 0 20px 35px rgba(20, 20, 20, .1);
            border-radius: 30px / 40px;
            -webkit-transform: scaleY(.3) !important;
            -moz-transform: scaleY(.3) !important;
            -ms-transform: scaleY(.3) !important;
            -o-transform: scaleY(.3) !important;
            transform: scaleY(.3) !important;
            -webkit-animation: pace-compress .5s infinite alternate;
            -moz-animation: pace-compress .5s infinite alternate;
            -o-animation: pace-compress .5s infinite alternate;
            -ms-animation: pace-compress .5s infinite alternate;
            animation: pace-compress .5s infinite alternate;
        }

        @-webkit-keyframes pace-bounce {
            0% {
                top: 0;
                -webkit-animation-timing-function: ease-in;
            }

            40% {}

            50% {
                top: 140px;
                height: 140px;
                -webkit-animation-timing-function: ease-out;
            }

            55% {
                top: 160px;
                height: 120px;
                border-radius: 70px / 60px;
                -webkit-animation-timing-function: ease-in;
            }

            65% {
                top: 120px;
                height: 140px;
                border-radius: 70px;
                -webkit-animation-timing-function: ease-out;
            }

            95% {
                top: 0;
                -webkit-animation-timing-function: ease-in;
            }

            100% {
                top: 0;
                -webkit-animation-timing-function: ease-in;
            }
        }

        @-moz-keyframes pace-bounce {
            0% {
                top: 0;
                -moz-animation-timing-function: ease-in;
            }

            40% {}

            50% {
                top: 140px;
                height: 140px;
                -moz-animation-timing-function: ease-out;
            }

            55% {
                top: 160px;
                height: 120px;
                border-radius: 70px / 60px;
                -moz-animation-timing-function: ease-in;
            }

            65% {
                top: 120px;
                height: 140px;
                border-radius: 70px;
                -moz-animation-timing-function: ease-out;
            }

            95% {
                top: 0;
                -moz-animation-timing-function: ease-in;
            }

            100% {
                top: 0;
                -moz-animation-timing-function: ease-in;
            }
        }

        @keyframes pace-bounce {
            0% {
                top: 0;
                animation-timing-function: ease-in;
            }

            50% {
                top: 140px;
                height: 140px;
                animation-timing-function: ease-out;
            }

            55% {
                top: 160px;
                height: 120px;
                border-radius: 70px / 60px;
                animation-timing-function: ease-in;
            }

            65% {
                top: 120px;
                height: 140px;
                border-radius: 70px;
                animation-timing-function: ease-out;
            }

            95% {
                top: 0;
                animation-timing-function: ease-in;
            }

            100% {
                top: 0;
                animation-timing-function: ease-in;
            }
        }

        @-webkit-keyframes pace-compress {
            0% {
                bottom: 0;
                margin-left: -30px;
                width: 60px;
                height: 75px;
                background: rgba(20, 20, 20, .1);
                box-shadow: 0 0 20px 35px rgba(20, 20, 20, .1);
                border-radius: 30px / 40px;
                -webkit-animation-timing-function: ease-in;
            }

            100% {
                bottom: 30px;
                margin-left: -10px;
                width: 20px;
                height: 5px;
                background: rgba(20, 20, 20, .3);
                box-shadow: 0 0 20px 35px rgba(20, 20, 20, .3);
                border-radius: 20px / 20px;
                -webkit-animation-timing-function: ease-out;
            }
        }

        @-moz-keyframes pace-compress {
            0% {
                bottom: 0;
                margin-left: -30px;
                width: 60px;
                height: 75px;
                background: rgba(20, 20, 20, .1);
                box-shadow: 0 0 20px 35px rgba(20, 20, 20, .1);
                border-radius: 30px / 40px;
                -moz-animation-timing-function: ease-in;
            }

            100% {
                bottom: 30px;
                margin-left: -10px;
                width: 20px;
                height: 5px;
                background: rgba(20, 20, 20, .3);
                box-shadow: 0 0 20px 35px rgba(20, 20, 20, .3);
                border-radius: 20px / 20px;
                -moz-animation-timing-function: ease-out;
            }
        }

        @keyframes pace-compress {
            0% {
                bottom: 0;
                margin-left: -30px;
                width: 60px;
                height: 75px;
                background: rgba(20, 20, 20, .1);
                box-shadow: 0 0 20px 35px rgba(20, 20, 20, .1);
                border-radius: 30px / 40px;
                animation-timing-function: ease-in;
            }

            100% {
                bottom: 30px;
                margin-left: -10px;
                width: 20px;
                height: 5px;
                background: rgba(20, 20, 20, .3);
                box-shadow: 0 0 20px 35px rgba(20, 20, 20, .3);
                border-radius: 20px / 20px;
                animation-timing-function: ease-out;
            }
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

    <script>
        paceOptions = {
          elements: true
        };
    </script>
</head>

<body style="background-color: white">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 style="font-family: 'Anton', sans-serif;"> {{$title}}</h1>
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
                                style="text-decoration:none">{{$title}}
                            </a>
                            <p class="mt-3">{!!$deskripsi!!}</p>
                            <!-- Rights-->
                            <p>{!! $copyright !!}</p>
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