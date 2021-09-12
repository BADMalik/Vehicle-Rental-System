<!DOCTYPE html>
<html>
<head>
    <title>OVRS|HOME</title>
    <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Salman Zahid">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="fontawesome/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
  
    <link rel="stylesheet" type="text/css" id="applicationStylesheet" href="{{ url('css/login_style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style1.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/rwd.css')}}">

</head>
<body>




    <div class="navigation">
        <div class="container">
            <div class="row">
            <div class="logo col-md-2 col-sm-6">
            <a href="{{route('home')}}"><img src="images/logo.png"></a></div>
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
                    {{-- <li><a href="index.html">HOME</a></li> --}}
                    {{-- <li><a href="login.html">Login</a></li> --}}
                    {{-- <li><a href="signup.html"> Sign Up </a></li> --}}
                    <li><a href="{{route('addPost')}}"> Add Post </a></li>
                    <li><a href="{{route('editProfile',['id'=>Auth::user()->id])}}">Edit Profile</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                  </ul>
                </div>
              </div>
            </nav>
        </div>
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
    <div class="banner">
        <div class="container">
            <div class="carousel-caption">
                <h1>LET'S FIND YOUR NEXT CAR</h1>
                <p>Stay safe and confident on the road</p>
                <!-- <a href="brands.html"><button>Featured Ads</button></a> -->

        </div>
        </div>
    </div>


                <div class="heading">

                    <div class="container">

                        <h5 style="font-size: 25px; color: white;">RECENT ADS</h5>
                        <hr  class="line">
                    </div>

                </div>
                @if (session('success'))
                    <div style="margin: 0 auto;text-align: center;font-size: 25px; color:aliceblue;background-color: green; " class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                @endif
                @if($errors->any())
                    <h4 style="margin: 0 auto;text-align: center;text-size: 2px;font-size: 25px; color:white; " class="alert alert-danger">{{$errors->first()}}</h4>
                @endif
                <div style="margin-bottom: 10px;" class="products">
                        <div class="container">
                            <div class="row">
                                {{-- <div  class=" p1 col-md-3 col-sm-6">
                                    <div class="carousel-caption">
                                     <a href="cart.html" style="margin-bottom: 15px;">Honda BRV</a>
                                        <div class="cost">
                                            <p>$13734.72</p>
                                        </div>
 							 	    </div>
                                </div> --}}
                    @foreach($ads as $ad)
                    
                    <div class="col-md-3" style=" text-align:center">
                    <img height="200px" width="200px" style="margin-bottom: 15px;" src="{{asset('images').'/'.$ad->profile_picture}}" alt="">
                        <br>
                        <a href="{{route('product.view',['id'=>$ad->id])}}"  class="mt-2">{{$ad->title}}</a>
                        <p class="lead" style="font-size: 15px; color: #fbfbfb!important; opacity: .7">{{Str::limit($ad->description,100)}}</p>
                        <a  href="{{route('userProfile',['user_id'=>$ad->user_id])}}">Contact Owner</a>

                    </div>


                    @endforeach
                    
                            </div>

                        </div>
                       
                        
                </div>




    <footer>
        <div class="footer">
            <div class="row">
  			<div class="col-md-4">
  				<h2>ABOUT</h2>
          <ul>
            <li> <a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('editProfile',['id'=>Auth::user()->id])}}">Edit Profile</a></li>
            <li><a href="{{route('addPost')}}">Add Post</a></li>
            
          </ul>
  			</div>
  			<div class="col-md-4">
  				<h2>Top Vehicles</h2>
  				<ul>
            <li><a href="#">Civic</a></li>
            <li><a href="#">WagonR</a></li>
            <li><a href="#">Corolla</a></li>
            <li><a href="#">Honda City</a></li>
          </ul>
  			</div>
  			
  			<div class="col-md-4 ">
  				<h2>download our app</h2>
          <h3 >Coming Soon!</h3>
          <p class="download-icon"><i class="fa fa-apple"></i>
          <i class="fa fa-android"></i></p>
          <p class="social"><a href="#"><i class="fa fa-facebook-square"></i></a>
          <a href="#"><i class="fa fa-twitter-square"></i></a>
          <a href="#"><i class="fa fa-google-plus-square"></i></a>
          <a href="#"><i class="fa fa-linkedin-square"></i></a></p>
  			</div>
        </div>
    </footer>
    <!-- <script>
        $(document).ready(function() {
  var id = '#dialog';
  var maskHeight = $(document).height();
  var maskWidth = $(window).width();
  $('#mask').css({'width':maskWidth,'height':maskHeight});
  $('#mask').fadeIn(500);
  $('#mask').fadeTo("slow",0.9);
        var winH = $(window).height();
  var winW = $(window).width();
        $(id).css('top',  winH/2-$(id).height()/2);
  $(id).css('left', winW/2-$(id).width()/2);
     $(id).fadeIn(2000);
     $('.window .close').click(function (e) {
  e.preventDefault();
  $('#mask').hide();
  $('.window').hide();
     });
     $('#mask').click(function () {
  $(this).hide();
  $('.window').hide();
 });

});
    </script> -->








<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>


<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
