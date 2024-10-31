@extends('layouts.app')

@section('title',' - My Profile')

@section('content')
<div class="container" style="margin-top:4% !important;margin-bottom:4% !important;">
  <div class="row justify-content-center">
    <!-- To plaino menu -->
    <div class="col-md-2">
      <ul class="list-group list-group-flush" id="shop_side_menu">
        <li class="list-group-item"><a href="{{ route('profile.dashboard') }}" class="shop_links">Dashboard</a></li>
        <li class="list-group-item"><a href="#" class="shop_links">Orders</a></li>
        <li class="list-group-item"><a href="{{ route('profile.cart') }}" class="shop_links">Cart</a></li>
        <li class="list-group-item"><a href="{{ route('profile.info') }}" class="shop_links">Account Info</a></li>
        <li class="list-group-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="shop_links">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </ul>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
      @yield('account_pages')
    </div>
  </div>
</div>
@endsection
