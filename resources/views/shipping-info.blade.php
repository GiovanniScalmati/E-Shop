@extends('layouts.user_profile')

@section('title',' - Shipping Info')

@section('account_pages')
<div class="card dashboard_card">
  <div class="card-header">Shipping Info</div>

  <div class="card-body">
    <!-- Form with shipping info of the user -->
    <form method="POST" action="{{ route('profile.shipping_info_save') }}">
      @csrf
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Name:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $shipping_info[0] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{ $shipping_info[1] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Town:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="town" value="{{ $shipping_info[2] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shipping State:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="state" value="{{ $shipping_info[3] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shipping ZipCode:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="zip" value="{{ $shipping_info[4] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Country:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="country" value="{{ $shipping_info[5] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
              {{ __('Submit') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
