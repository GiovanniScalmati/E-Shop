@extends('layouts.user_profile')

@section('title',' - Dashboard')

@section('account_pages')
<!-- User's dashboard -->
<div class="card dashboard_card">
  <div class="card-header">Dashboard</div>

  <div class="card-body">
    <h4>Hello {{$username}}!</h4>
    <br><br>
    <p>
      From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.
    </p>

  </div>
</div>
@endsection
