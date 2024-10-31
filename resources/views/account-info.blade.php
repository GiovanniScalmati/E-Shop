@extends('layouts.user_profile')

@section('title',' - Account Info')

@section('account_pages')
<div class="card dashboard_card">
  <div class="card-header">Account Info</div>

  <div class="card-body">
    <label>Username:</label>
    <label><b>{{$username}}</b></label>
    <br>
    <label>Email address:</label>
    <label><b>{{$email}}</b></label>
    <br>
    <!-- Button to complete billing info or list of them if the user has submitted them -->
    <h4 class="account_info_headers">Billing Information</h4>
    @if($billing_info[0] == null)
      <a class="btn btn-info" href="{{ route('profile.billing_info') }}">Add Info</a>
    @else
      @for($i=0;$i < count($billing_info);$i++)
        <label>{{$billing_info[$i]}}</label><br>
      @endfor
      <!-- Button to edit billing info -->
      <a class="btn btn-success" href="{{ route('profile.billing_info') }}">Edit</a>
    @endif
    <!-- Button to complete shipping info or list of them if the user has submitted them -->
    <h4 class="account_info_headers">Shipping Information</h4>
    @if($shipping_info[0] == null)
      <a class="btn btn-info" href="{{ route('profile.shipping_info') }}">Add Info</a>
    @else
      @for($i=0;$i < count($shipping_info);$i++)
        <label>{{$shipping_info[$i]}}</label><br>
      @endfor
      <!-- Button to edit shipping info -->
      <a class="btn btn-success" href="{{ route('profile.shipping_info') }}">Edit</a>
    @endif
  </div>
</div>
@endsection
