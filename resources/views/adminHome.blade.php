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




    <div class="navigation" style="position: relative;">
        <div class="container">
            <div class="row">
            <div class="logo col-md-2 col-sm-6">
            <a href="index.html"><img src="{{asset('images/logo.png')}}"></a></div>
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
                  <ul  class="nav navbar-nav navbar-right">
                    <li><a href="{{route('logout')}}">Logout</a></li>

                  </ul>
                </div>
              </div>
            </nav>
        </div>
    </div>
        </div>
    </div>
    @if (session('success'))
       <div style="margin: 0 auto;text-align: center;font-size: 25px; background-color: green; color: aliceblue;"  class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif
    <div class="admin_panel" style="padding: 15px;">
        <div class="hd_panel" style="text-align: center;">
            <div class="container">
                <h1 style="color: #fbfbfb;">ADMIN PANEL: Pending Ads</h1>
                <hr>
            </div>
        </div>
    <div class="Posts_Details" style="text-align: center; " >
        <div class="container">
            <table style="color: cornsilk; border: 1px solid cornsilk;" class="table">
                <thead>
                  <tr>
                    <th  scope="col">TITLE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">CONDITION</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">UnApprove</th>
                    <th scope="col">Approve</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ads as $ad)
                        <tr>
                            <td>{{$ad->title}}</td>
                            <td>{{Str::limit($ad->description,20)}}</td>
                            <td>{{$ad->condition}}</td>
                            <td>{{$ad->status}}</td>
                            <td><a href="{{route('unApproveAd',$ad->id)}}">UnApprove Post</a></td>
                            <td ><a id="approve" href="{{route('approveAd',['id'=>$ad->id])}}">Approve</a></td>
                        </tr>
                  @endforeach

                </tbody>
              </table>
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
    <div class="hd_panel" style="text-align: center;">
        <div class="container">
            <h2 style="color: #fbfbfb;">UNAPPROVED POSTS</h2>
            <hr>
        </div>
    </div>
    <div class="Posts_Details" style="text-align: center; " >
        <div class="container">
            <table style="color: cornsilk; border: 1px solid cornsilk;" class="table">
                <thead>
                  <tr>
                    <th  scope="col">TITLE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">CONDITION</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">Restore</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

                   @foreach ($deleted as $deleted)
                        <tr>
                            <td>{{$deleted->title}}</td>
                            <td>{{Str::limit($deleted->description,20)}}</td>
                            <td>{{$deleted->condition}}</td>
                            <td>{{$deleted->status}}</td>
                            <td><a href="{{route('addToPending',$deleted->id)}}">Add To Pending</a></td>
                            <td ><a id="approve" href="{{route('deleteAd',['id'=>$deleted->id])}}">Delete Ad</a></td>
                        </tr>
                  @endforeach


                </tbody>
              </table>
        </div>
    </div>
<style>
    .Posts_Details th{
        text-align: center;
    }
    .Posts_Details td{
        border: 0.5px solid #fbfbfb;
    }
    .Posts_Details td a{
        font-size: 14px;
        color: red;
    }
     #approve{
        color: green;
    }
    .hd_panel hr{
        text-align: center;
        width: 100%;
        border: 1px solid #fbfbfb;
    }
    .hd_panel h1,h2{
        padding: 0px;
    }
</style>

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
