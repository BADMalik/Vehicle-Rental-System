<!DOCTYPE html>
<html>
<head>
    <title>CARS ON LINE|HONDA</title>
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
{{-- {{dd($product)}} --}}
    <div class="navigation">
        <div class="container">
            <div class="row">
            <div class="logo col-md-2 col-sm-6">
            <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}"></a></div>
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
                    <li><a href="{{route('home')}}">Home</a></li>
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
    <div class="banner1">
        <div class="container">
            <div class="carousel-caption">
                <h1>LET GIVE YOUR SELF OPPORTUNITY</h1>
                <p>CONTACT US,AWAITING FOR YOU</p>
                <!-- <a href="#"><button>VIEW PRODUCTS</button></a> -->

        </div>


        </div>
    </div>


     			<div class="Links">
            <div class="container">
                <div class="col-md-12">

                      <ul>
                                    <li><a href=""><i class="fa fa-facebook-square"></i></a></li>
                                    <li><a href=""><i class="fa fa-linkedin-square"></i></a></li>
                                    <li><a href=""><i class="fa fa-twitter-square"></i></a></li>
                                    <li><a href=""><i class="fa fa-google-plus-square"></i></a></li>
                                </ul>
                                    <p><a href="{{route('home')}}">HOME | </a>Edit Profile</p>
                </div>
            </div>
        </div>

            {{-- dd{{$product}} --}}
  				<div class="addPost ">

                    <div class="container">
                    @if (session('success'))
                   <div style="margin: 0 auto;text-align: center;font-size: 25px; background-color: green; color: aliceblue;"  class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                    @endif
                    @if($errors->any())
                        <h4 style="margin: 0 auto;text-align: center;font-size: 25px; color:red; " class="alert alert-danger">{{$errors->first()}}</h4>
                    @endif
                        <div  class="rows">
                                <div class="col-md-5">

                                    <h1>Edit Product</h1>
                                    <ul>

                    {{-- {{dd($user)}} --}}
                      <form enctype="multipart/form-data" action="{{route('updatePost',['id'=>$product->id])}}" method="post">
                        @method('put')
                        @csrf

                        <p>Title</p>
                        <input type="text" placeholder="Name" value="{{$product->title}}" name="title">
                        <p>Condition</p>
                        <input type="text" placeholder="Condition" name="condition" value="{{$product->condition}}">
                        <p>Location</p>
                        <input type="text" value="{{$product->location ? $product->location : 'Doesn\'t Exists'}}" name="location" placeholder="Enter Location">
                         {{-- <p>Phone</p>
                         <input type="number" placeholder="Enter Your Number"> --}}
                         <p>Description</p>
                            <textarea placeholder="Enter Your description" style="color:red" name="description">{{$product->description }}</textarea>
                                                    <br><br>
                                                    <button type="submit">Save Changes</button>
                                                </form>
                                        </li>
                                    </ul>
                                </div>
                                    <div class="col-md-1"></div>
                                <div class="col-md-6 uploadImg">
                                        <img src="{{asset('images').'/'.$product->profile_picture}}" class="">
                                        <form method="post" action="{{route('updatePostProfilePicture',['id'=>$product->id])}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    {{-- {{ csrf_field() }} --}}
                                                    <label for="img">Change image:</label>
                                                    <input type="file" name="profile_picture" accept="image/*">
                                                    <button type="submit">Save Ad Picture</button>
                                                </form>




                                </div>
                            </div>

                    </div>

  				</div>

                    <br><br><br>
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



<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
