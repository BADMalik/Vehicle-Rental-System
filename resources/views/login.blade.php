<!DOCTYPE html>
<html>
<head>
    <title>CARS ON LINE|HOME</title>
    <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="John Doe">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="fontawesome/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
    <!-- <script type="text/javascript" src="js/js.js"></script>

    <script type="text/javascript" src="js/js11.js"></script> -->
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="{{ url('css/login_style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style1.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/rwd.css')}}">

</head>
<body>

<div id="boxes">
<div style="top: 50%; left: 50%; display: none;" id="dialog" class="window">
<div id="san">
<a href="#" class="close agree"><img src=".png" width="25" style="float:right; margin-right: -25px; margin-top: -20px;"></a>
<img src="images/suplogo.png" width="450">
</div>
</div>
<div style="width: 2478px; font-size: 32pt;;color:white; height: 1202px; display: none; opacity: 0.4;" id="mask"><div class="maintext">

</div></div>
</div>


    <div class="navigation">
        <div class="container">
            <div class="row">
            <div class="logo col-md-2 col-sm-6">
            <a href="#"><img src="images/logo.png"></a></div>
            <div class="navv col-md-10 col-sm-6">
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
          </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                            <li></li>
          		</ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('signup')}}"> Sign Up </a></li>
                  </ul>
                </div>
              </div>
            </nav>
        </div>
    </div>
        </div>
    </div>
    <div class="banner">
        <div class="container">
            <div class="carousel-caption">
                <h1>LET'S FIND YOUR NEXT CAR</h1>
                <p>Stay safe and confident on the road</p>
              

        </div>


        </div>
    </div>

 <style>
      .navbar-nav a{
        font-size: 17px!important;
        color: #000000;
/*        color: #fbfbfb!important;
*/      }

    </style>
    <div class="contact">
        <div class="container">
        @if (session('success'))
            <div style="margin: 0 auto;text-align: center;font-size: 25px; background-color: green; color: aliceblue;"  class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        @if($errors->any())
        <h4 style="margin: 0 auto;text-align: center;text-size: 2px;font-size: 25px; color:red " class="alert alert-danger">{{$errors->first()}}</h4>
        @endif
            <div class="row">
                <div class="col-md-2"> </div>
            <div class="inner col-md-8">
             <form method="post" action={{route('verifyUser')}}>
            @csrf
            @method('post')
                <ul>
                    <li>
                        <p>Email</p>
                        <input type="text" name="email" placeholder="Enter Your Email">
                    </li>
                        <li>
                            <p>Password</p>
                            <input type="password" placeholder="Enter Your Password" name="password">
                        </li>
                                <li>
                                    <button type="submit">Login</button>
                                </li>
                    </ul>
              </form>
                         <h5  style="color: white;"><span style="color:red;">Note:</span> We will not spam you and your contact information will not be shared.</h5>

                </div>
                <div class="col-md-2" ></div>
            </div>
        </div>

    </div>

      <footer>
        <div class="footer">
            <div class="row">
        <div class="col-md-4">
          
        </div>
        <div class="col-md-4">
          <h2>download our app</h2>
          <h3 >Coming Soon!</h3>
          <p class="download-icon"><i class="fa fa-apple"></i>
          <i class="fa fa-android"></i></p>
          <p class="social"><a href="#"><i class="fa fa-facebook-square"></i></a>
          <a href="#"><i class="fa fa-twitter-square"></i></a>
          <a href="#"><i class="fa fa-google-plus-square"></i></a>
          <a href="#"><i class="fa fa-linkedin-square"></i></a></p>
        </div>
        
        <div class="col-md-4 ">
          
        </div>
        </div>
    </footer>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>


<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
