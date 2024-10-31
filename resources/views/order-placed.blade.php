@extends('layouts.app')

@section('content')
<div class="container" style="margin-bottom:4% !important;margin-top:50px!important;">
  <div class="row">
    <!-- The message that appears when the user completes his order -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
      <img src="/photos/food.png" width="300px" style="margin-bottom:2%;"></img>
      <h4 style="margin-bottom:2%;">Your Order has been placed!</h4>
      <p>
        Check the status of your order from your profile page.
      </p>
      <a class="btn btn-md btn-success" href="{{ route('profile.dashboard') }}" style="margin-top:3%;">Go to my Orders</a>
    </div>
  </div>
</div>
@endsection
