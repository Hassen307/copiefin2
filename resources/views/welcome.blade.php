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
                    <h3>our solution can be used to secure any website</h3>
                    <br>
                    <h3>Now, you can ensure what User</h3>
                    <a class="btn btn-primary my-btn">Can Do</a>
                   <font size="6"> OR </font>
                    <a class="btn btn-primary my-btn2">Can <b><u><font size="3">Not</font></u></b> Do</a>
                </div>
            </div>
        </div>
    </div>

    <div id="tf-service">
        <div class="container">

            <div class="col-md-4">

                <div class="media">
                  <div class="media-left media-middle">
                    <i class="fa fa-motorcycle"></i>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Easy to use</h4>
                    <p>Our solution is easy to use, you dont need to be a web developer to implement it.</p>
                  </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="media">
                  <div class="media-left media-middle">
                    <i class="fa fa-gears"></i>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Less code more better</h4>
                    <p> fewer lines are often better than more lines</p>
                  </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="media">
                  <div class="media-left media-middle">
                    <i class="fa fa-heartbeat"></i>
                  </div>
                  <div class="media-body">
                      <h4 class="media-heading"><b>Maxime Chattam</b></h4>
                    <p> L'homme est hypocrite, il adapte les codes selon ses besoins.</p>
                  </div>
                </div>

            </div>
            
        </div>
    </div>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
