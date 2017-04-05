
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
 

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="/css/style.css" rel="stylesheet">



    <!-- Custom styles for this template -->
   @yield('css')
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      #body{

        margin-bottom: 100px;
      }
    </style>
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
          <a class="blog-nav-item" href="{{ route('postie.about') }}"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;&nbsp;&nbsp;About Postie</a>

           @if (!Auth::guest())
     
      <div class="dropdown pull-right">
          <a class="blog-nav-item" id="dLabel" data-target="#" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logged in As&nbsp;&nbsp;
          {{ Auth::user()->name }} 
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" aria-labelledby="dLabel">
            <li><a href="{{ route('user.index',Auth::user()->id) }}"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;&nbsp;Profile</a></li>
            <li><a  href="{{ route('postie.create') }}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp;&nbsp;New Post</a></li>
                         <li role="separator" class="divider"></li>
                          <li><a  href="{{route('logout') }}"onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a>                                
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
          </ul>
      </div>

           
                                                    
          {{--  <a class="blog-nav-item pull-right" href="#"> {{ Auth::user()->name }}</a> --}}

           @else
            <a class="blog-nav-item pull-right" href="{{ route('register') }}"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;&nbsp;&nbsp;Register</a>
            <span class="blog-nav-item pull-right">Or</span>
            <a class="blog-nav-item pull-right" href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;&nbsp;Login</a>
           @endif
            
        </nav>
      </div>
    </div>

    <div class="container"  id="body">

      <div class="blog-header">

        @yield('header')
      
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
  
            @yield('main')

        
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

 @include('layouts.sidebar')
{{-- @include('layouts.sidebar', ['postie',$postie]) --}}

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{{-- <script src="/js/app.js"></script> --}}
  </body>
</html>
