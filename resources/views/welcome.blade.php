<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>A simple Laravel Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel='stylesheet' id='font-awesome-css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=5.4.2' type='text/css' media='all' />

        <!-- Anime.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
        <!-- Jquery -->
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
            }
            .heart{
                margin-top: 15%;
                text-align: center;
            }
            .like{
                -webkit-transition: color 200ms linear;
                -ms-transition: color 200ms linear;
                transition: color 200ms linear;
                font-size: 150px;
            }
            .count{
                font-size:19px;
                font-weight: bold;
            }
            .cp{
                text-align:center;
                font-size:13px;
            }
            .cp a{
                text-decoration: none;
                color: #555555;
            }
            @media (max-width:600px){
                .heart{
                    margin-top:40%;
                }
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="heart">
            <i class="fa fa-heart like" aria-hidden="true"></i>
            <p class="count">{"count":{{ $count }}}</p>
            </div>
            <p class="cp"> Made with &lt;3 by <a href="https://mahdyar.me">Mahdyar</a>
        </div>
        <script>
            // Counter - Made with <3 by mahdyar.me
            var objCount = document.querySelector('.count');
            var counter = {
                count: 0
            }
            anime({
            targets: counter,
            count: {{ $count }},
            easing: 'linear',
            round: 1,
            update: function() {
                objCount.innerHTML = JSON.stringify(counter);
            }
            });

            // Ajax - Made with <3 by mahdyar.me
            $(".like").click(function(event){
                let _token   = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "/",
                    type:"POST",
                    data:{
                    _token: _token
                    },
                    success:function(response){
                    console.log(response);
                    if(response) {
                        $('.heart').css("color","#9b1515");
                        anime({
                            targets: counter,
                            count: response.count,
                            easing: 'linear',
                            round: 1,
                            update: function() {
                                objCount.innerHTML = JSON.stringify(counter);
                            }
                            });
                    }
                    },
                });
            });
        </script>
    </body>
</html>
