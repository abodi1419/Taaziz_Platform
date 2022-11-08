@extends('layouts.app')

@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');

        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body{
            width: 100%;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: #b8dae3;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        a{
            text-decoration: none;
        }


        .h1-text{
            font-size: 1.3rem;
            margin: 40px 0;
            color: #2c2c2c;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .h1-text i{
            background-color: #128c7e;
            color: #fff;
            width: 40px;
            height: 40px;
            box-shadow: 2px 5px 30px rgba(80, 123, 252, 0.4);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1rem;
            margin: 0 20px;
        }

        .container{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }


        .box{
            position: relative;
            min-width: 250px;
            background-color: #fff;
            box-shadow: 2px 3px 30px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            margin: 20px;
            position: relative;
            border-radius: 10px;
        }


        .top-bar{
            width: 50%;
            height: 4px;
            background: #128c7e;
            position: absolute;
            top: 0px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 0px 0px 10px 10px;
        }

        .top{
            display: flex;
            justify-content: space-between;
            align-items:center ;
            width: 100%;
        }

        .fa-check-circle{
            color: #17b667;
        }

        /* creating heart */
        .heart{
            color: rgba(155,155,155);
        }
        .heart::before{
            content: '\f004';
            font-family: fontawesome;
            line-height: 30px;
            cursor: pointer;
            z-index: 1;
            transition: all 0.3s;
        }
        .box .heart-btn:checked ~ .heart::before{
            color:#e41934
        }
        .heart-btn{
            position: absolute;
            top: 25px;
            right: 20px;
            padding: 1rem;
            display: none;
        }


        .content img{
            /*width: 90px;*/
            /*height: 90px;*/
            /*border-radius:100px;*/
            /*overflow: hidden;*/
            /*object-fit: cover;*/
            /*object-position: top;*/
        }
        .content{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .content strong{
            font-weight: 500;
            color: #141414;
            margin-top: 10px;
        }
        .content p{
            font-size: 0.9rem;
            color: #7a7a7a;
            margin: 4px 0px 10px 0px;
            cursor: pointer;
        }
        .content p:hover{
            text-decoration: underline;
        }

        .btn{
            margin-top: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        .btn a i{
            margin-right: 9px;
        }
        .btn a{
            border-radius: 20px;
            color: #8b8b8b;
            padding: 8px 20px;
            font-size: 0.9rem;
        }
        .btn a:hover{
            color: #fff;
            box-shadow: 2px 5px 15px rgba(80,123,252,0.05);
            background-color: #128c7e;
            transition: all ease 0.5s;
        }

    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <h1 class="h1-text">
        <i class="fa fa-users" aria-hidden="true"></i>{{__("Developers Team")}}
    </h1>
    <div class="container">
{{--        Alzahrani--}}
        <div class="box">
            <div class="top-bar"></div>
            <div class="top">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
            </div>
            <div class="content">
                <img src="" alt="">
                <strong>Abdullah Alzhrani</strong>
                <p>Alzhrani@gmail.com</p>
            </div>
            <div class="btn">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                    githup</a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                    twitter</a>
            </div>
        </div>

        {{--        Alqarni--}}
        <div class="box">
            <div class="top-bar"></div>
            <div class="top">
                <div>
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                </div>
            </div>
            <div class="content">
                <img src="" alt="">
                <strong>Abdullah Alqarni</strong>
                <p>abdullah77alqarni@gmail.com</p>
            </div>
            <div class="btn">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                    githup</a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                    twitter</a>
            </div>
        </div>

        {{--        Saber--}}
        <div class="box">
            <div class="top-bar"></div>
            <div class="top">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
            </div>
            <div class="content">
                <img src="" alt="">
                <strong>Abdullah Saber</strong>
                <p>A.Saber@gmail.com</p>
            </div>
            <div class="btn">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                    githup</a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                    twitter</a>
            </div>
        </div>

        <h1 class="h1-text">
            <i class="fa fa-users" aria-hidden="true"></i>{{__("Supervisor")}}
        </h1>
        <div class="container">
        <div class="box">
            <div class="top-bar"></div>
            <div class="top">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
            </div>
            <div class="content">
                <img src="" alt="">
                <strong>Dr. Nabeel Albishry</strong>
                <p>Nabeel@gmail.com</p>
            </div>
        </div>
        </div>
    </div>


@endsection
