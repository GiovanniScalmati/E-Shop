@extends('layouts.user_profile')

@section('title',' - Billing Info')

@section('account_pages')
<div class="card dashboard_card">
  <div class="card-header">Billing Info</div>

  <div class="card-body">
    <!-- Form with billing info of the user -->
    <form method="POST" action="{{ route('profile.billing_info_save') }}">
      @csrf
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Billing Name:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $billing_info[0] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Billing Address:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{ $billing_info[1] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Billing Town:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="town" value="{{ $billing_info[2] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Billing State:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="state" value="{{ $billing_info[3] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Billing ZipCode:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="zip" value="{{ $billing_info[4] }}" required autocomplete="name" autofocus>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Billing Country:') }}</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="country" value="{{ $billing_info[5] }}" required autocomplete="name" autofocus>
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
