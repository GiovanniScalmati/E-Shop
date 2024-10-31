<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lorem') }}@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <!--CSS Spinner-->
<div class="spinner-wrapper">
<div class="spinner"><img src="/photos/pre.gif"></img></div>
</div>
    <div id="app">
      <nav class="" id="topbar">
          <div class="container">
            <label>info@lorem.com | +66 859038213</label>
            <div class="topbar_social">
              <a href="#"><i class="fa fa-facebook-square topbar_icons" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter-square topbar_icons" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-instagram topbar_icons" aria-hidden="true"></i></a>
            </div>
          </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="banner">
            <div class="container">
                <a class="navbar-brand" href="{{ route('homepage_index') }}">
                    <img src="{{ asset('photos/sample-logo3.png') }}" width="" height="90" id="banner_logo"></img>
                    <!-- <h2 style="color:#fff;">Lorem</h2> -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->



                    <!-- Right Side Of Navbar -->

                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.index') }}"><img class="menu_icon_img" src="{{url('/photos/bag.png')}}" width="25px"></img><label class="menu_icon_labels">Shop</label></a>
                        </li>
                          <!-- Authentication Links -->
                          @guest
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}"><img class="menu_icon_img" src="{{url('/photos/user.png')}}" width="27px"></img><label class="menu_icon_labels">User Account</label></a>
                              </li>
                          @else
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('profile.dashboard') }}"><img class="menu_icon_img" src="{{url('/photos/user.png')}}" width="27px"></img><label class="menu_icon_labels">Dashboard</label></a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('profile.cart') }}"><img class="menu_icon_img" src="{{url('/photos/cart.png')}}" width="27px"></img><label class="menu_icon_labels">My Cart</label></a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><img class="menu_icon_img" src="{{url('/photos/logoff.png')}}" width="27px"></img><label class="menu_icon_labels">Logout</label></a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </li>
                          @endguest
                      </ul>


                </div>

          </div>
        </nav>

        <!-- 2o navbar -->
        <nav class="navbar navbar-expand-lg navbar-light second_navbar">
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler nav2" type="button" data-toggle="collapse" data-target="#navbarNav2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav2">
              <ul class="navbar-nav nav2bar">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('homepage_index') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                  </a>
                  <div class="dropdown-menu dropright" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item dropdown-toggle" id="beersmenulink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{ route('shop.beers_index') }}">Beers</a>
                    <div class="dropdown-menu" aria-labelledby="beersmenulink">
                      <a class="dropdown-item" href="{{ route('shop.type_index') }}#Lager">Lager</a>
                      <a class="dropdown-item" href="{{ route('shop.type_index') }}#Bock">Bock</a>
                      <a class="dropdown-item" href="{{ route('shop.type_index') }}#Stout">Stout</a>
                      <a class="dropdown-item" href="{{ route('shop.type_index') }}#Viess">Viess</a>
                    </div>
                    <a class="dropdown-item" href="{{ route('shop.ciders_index') }}">Ciders</a>
                    <a class="dropdown-item" href="{{ route('shop.non_alcoholic_index') }}">Non Alcoholic</a>
                    <a class="dropdown-item" href="{{ route('shop.accessories_index') }}">Accessories</a>
                    <a class="dropdown-item" href="{{ route('shop.home_kit_index') }}">Home Kit</a>
                    <a class="dropdown-item" href="{{ route('shop.barley_index') }}">Barley</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/about_us">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/contact">Contact</a>
                </li>

              </ul>
              <input type="text" name="search" onfocus="this.value=''"data-toggle="dropdown" autocomplete="off" id="search" class="form-control dropdown-toggle" placeholder="Search" />

               <table class="table table-striped table-bordered dropdown-menu show" aria-labelledby="search" style="display:none;" id="search_table">
                <thead>
                 <tr style="display:none;">
                  <th class="dropdown-item">Image</th>
                  <th class="dropdown-item">Name</th>
                  <th class="dropdown-item">Type</th>
                  <th class="dropdown-item">Brewery</th>
                  <th class="dropdown-item">Abv%</th>
                 </tr>
                </thead>
                <tbody>

                </tbody>
               </table>
               <button class="btn button btn-danger" style="display:none;" id="close_search">x</button>

            </div>
          </div>
        </nav>

        <main class="py-4" style="padding-top: 0rem!important;">
            @yield('content')
        </main>


        <div id="footer_links" class="container">
          <div class="row" style="margin-left:0;margin-right:0;">
          <div class="col-md-3 col-sm-12 col-xs-12 footer_menu_divs footer_boxes">
            <h5>Contact Info</h5>
            <hr class="footer_menu_hr">
            <ul class="footer_menu">
              <li class="footer_li_links"><a href="javascript:void(0)"><i class="fa fa-map-marker footer_fa" aria-hidden="true"></i>Celeste Slater 606, Ullamcorper</a></li>
              <li class="footer_li_links"><a href="tel:+66 859038213"><i class="fa fa-phone footer_fa" aria-hidden="true"></i>+66 859038213</a></li>
              <li class="footer_li_links"><a href="mailto:info@lorem.com"><i class="fa fa-envelope footer_fa" aria-hidden="true"></i>info@lorem.com</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-12 col-xs-12 footer_menu_divs footer_boxes">
            <h5>Our Company</h5>
            <hr class="footer_menu_hr">
            <ul class="footer_menu footer_menu_lists">
              <li class="footer_li_links"><a href="/about_us">About Us</a></li>
              <li class="footer_li_links"><a href="{{ route('shop.index') }}">Shop</a></li>
              <li class="footer_li_links"><a href="/contact">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-12 col-xs-12 footer_menu_divs footer_boxes">
            <h5>Usefull Links</h5>
            <hr class="footer_menu_hr">
            <ul class="footer_menu footer_menu_lists">
              <li class="footer_li_links"><a href="/payment-methods">Payment Methods</a></li>
              <li class="footer_li_links"><a href="/shipping-methods">Shipping Methods</a></li>
              <li class="footer_li_links"><a href="/privacy-policy">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-12 col-xs-12 footer_menu_divs">
            <h5>Your Account</h5>
            <hr class="footer_menu_hr">
            <ul class="footer_menu footer_menu_lists">
              <li class="footer_li_links"><a href="{{ route('profile.dashboard') }}">My Dashboard</a></li>
              <li class="footer_li_links"><a href="{{ route('profile.info') }}">Profile Info</a></li>
              <li class="footer_li_links"><a href="{{ route('profile.cart') }}">My Cart</a></li>
            </ul>
          </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm the_footer" id="footer">
          <div id="footer">
            <label id="footer_label">©2020 Lorem Ipsum – All rights reserved</label>
          </div>
        </nav>
      </div>
    </div>

    <script>
    $(document).ready(function() {
    //Preloader
    preloaderFadeOutTime = 3000;
    function hidePreloader() {
    var preloader = $('.spinner-wrapper');
    preloader.fadeOut(preloaderFadeOutTime);
    }
    hidePreloader();
    });
    </script>
</body>
</html>
<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
  $('table').show();
  $('#close_search').show();
 });
});
</script>
<script>
document.getElementById("close_search").addEventListener("click", function(){
  document.getElementById("close_search").style.display = "none";
  document.getElementById("search_table").style.display = "none";
  document.getElementById("search_table").style.display = "none";
});
</script>
