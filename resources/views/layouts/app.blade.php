<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @if (auth()->check())
     @if  ((explode("/", Request::path())[0]=="switchinfo"))
     <title>{{ucfirst(substr(Request::path(), strpos(Request::path(), "/") + 1))}} </title>
     @else
     <title> {{ ucfirst(Request::path()) }}  </title>
     @endif
     @endif
    
  
	<!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" >
     <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" >
        <!-- CUSTOM STYLES-->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" >
     <!-- GOOGLE FONTS-->
     <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' >
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><i class="fa fa-square-o "></i>&nbsp;GCR</a>
                    
                </div>
                
                <div class="navbar-collapse collapse">
                    
                    <ul class="nav navbar-nav navbar-header">
                        @if (auth()->check())
                    @permission('USERS')
                    <li class="{{ Request::path() == 'users' ? 'active' : '' }}"><a href="{{ route('users.index') }}">Users</a></li>
                    @endpermission
                    @permission('ROLES')
                    <li class="{{ Request::path() == 'roles' ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Roles</a></li>
                    @endpermission
                    @permission('PERMISSIONS')
                    <li class="{{ Request::path() == 'permissions' ? 'active' : '' }}"><a href="{{ route('permissions.index') }}">Privileges</a></li>
                    @endpermission
                    @if ( !empty ( $permissi ) )
                    @permission('PERMISSIONS')
                     <li class="{{ Request::path() == 'viewcontent' ? 'active' : '' }}"><a href="{{ route('viewcontent') }}">ViewContent</a></li>
                     @endpermission
                     @endif
                           @endif
                    </ul>
                     <ul class="nav navbar-nav navbar-right">
                         
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                </div>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        @if (auth()->check())
                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:100px; height:100px;   border-radius:50%">
                     @endif
                    </li>


                  @if (auth()->check())
                    <li class="{{ Request::path() == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>

                  
                @if ( !empty ( $permissi ) )
                
                @foreach ($permissi as $key => $value)
                @if(view()->exists($value))
                @permission($value)
                  <li  class="{{ Request::path() == 'switchinfo/'.$value ? 'active' : '' }}"><a href="{{route('page', ['parameter' => $value])}}">{{$value}}</a></li>
                 @endpermission
                 @endif
                 @endforeach
                 
                 @endif 
                 @endif


                 
                
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        @if (auth()->check())
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
        @if (auth()->check())
                      @if  ((explode("/", Request::path())[0]=="switchinfo"))
                     <h2>{{ucfirst(substr(Request::path(), strpos(Request::path(), "/") + 1))}} Management</h2>
                      @else
                      <h2> {{ ucfirst(explode("/", Request::path())[0]) }} Management </h2>
                   @endif
@endif
                    </div>
                    
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <div>
                     @yield('content')
                  </div>
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
             
            </div>
        
        @endif
        
        @if (Auth::guest())
        @yield('content')
        @endif
         <!-- /. PAGE WRAPPER  -->
        </div>
    
    
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
      <!-- BOOTSTRAP SCRIPTS -->
    
    <!-- METISMENU SCRIPTS -->
  
    
    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>
      <!-- CUSTOM SCRIPTS -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
   
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.7.2/parsley.min.js"></script>
     
    
    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script>
   
</body>
</html>
