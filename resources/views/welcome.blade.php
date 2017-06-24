<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
 
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/apple-touch-icon-114x114.png')}}">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome/css/font-awesome.css')}}">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
      
    </head>
    <body>
              
        
        <div id="tf-home">
        <div class="overlay">
            <div id="sticky-anchor"></div>
            <nav id="tf-menu" class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand logo">GCR</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                       
             @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" class="btn btn-primary my-btn">Home</a>
                    @else
                    <a href="{{ url('/login') }}" class="btn btn-primary my-btn">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ url('/register') }}" class="btn btn-primary my-btn2">Register</a>
                    @endif
                </div>
            @endif
                        
                      </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div class="container">
                <div class="content">
                    <h1>Generic solution</h1>
                    
                    <br><br><br><br><br><br><br>
                    
                    
                   
                </div>
            </div>
        </div>
    </div>

    <div id="tf-service">
        <div class="container">

         

       
            
            
        </div>
    </div>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
