<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>School App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            a {color: #fbfaf6;}
        </style>
    </head>
    <body>
        <div class="container demo">
           <div class="content">
              <div id="large-header" class="large-header">
                 <canvas id="demo-canvas"></canvas>
                 <h1 class="main-title"><a href="/student/create"><span class="thin"></span>Explore App</a> </h1>
              </div>
           </div>
        </div>
        <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/TweenLite.min.js'></script>
        <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/EasePack.min.js'></script>
        <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/demo.js'></script>
        <script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
    </body>
</html>
