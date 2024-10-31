@extends('layouts.app')

@section('title',' - Shop - Checkout')

@section('content')
<div class="container" style="margin-bottom:2% !important;">
  <div class="row" style="margin-top:3%;">
    <!-- O pinakas twn proiontwn -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-header">Checkout</div>

        <div class="card-body">
          <!-- The products -->
          <div>
            <table class="table checkout_table">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Brewery</th>
                  <th scope="col">Abv.</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                @for($i=0;$i<$products->count();$i++)
                <tr>
                  <th scope="row">{{$products->get($i)->name}}</th>
                  <td>{{$product_amounts[$i]}}</td>
                  <td>{{$products->get($i)->brewery}}</td>
                  <td>{{$products->get($i)->abv}}</td>
                  <td>{{$products->get($i)->price}}$</td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>
          <form method="POST" id="payment-form"  action="{{ route('checkout.payWithpaypal') }}">
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <!-- Shipping info of the user -->
                <h4 class="checkout_headers">Shipping Information</h4>
                <div class="row">
                  <!-- To aristera col gia ta stoixeia tou user -->
                  <div class="col-md-6">
                    @csrf
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="name" value="{{ $shipping_info[0] }}" required autocomplete="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="address" value="{{ $shipping_info[1] }}" required autocomplete="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Town:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="town" value="{{ $shipping_info[2] }}" required autocomplete="name">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="state" value="{{ $shipping_info[3] }}" required autocomplete="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="zip" value="{{ $shipping_info[4] }}" required autocomplete="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="country" value="{{ $shipping_info[5] }}" required autocomplete="name">
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <!-- Billing info of the user -->
                <h4 class="checkout_headers">Billing Information</h4>
                <a class="btn" id="checkout_diff_info_link">Is billing info different than shipping info?</a>
                <div class="row">
                  <div class="col-md-6" id="billing_info_col1">
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="name" value="{{ $billing_info[0] }}" required autocomplete="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="address" value="{{ $billing_info[1] }}" required autocomplete="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Town:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="town" value="{{ $billing_info[2] }}" required autocomplete="name">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6" id="billing_info_col2">
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="state" value="{{ $billing_info[3] }}" required autocomplete="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="zip" value="{{ $billing_info[4] }}" required autocomplete="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country:') }}</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="country" value="{{ $billing_info[5] }}" required autocomplete="name">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- To de3ia col gia to payment -->
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pay_col">

                <div class="card" style="text-align:left;">
                  <div class="card-header">Billing Summary</div>

                  <div class="card-body">
                    <table class="table">
                      <thead>

                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Items Total:</th>
                          <th scope="row">{{$total_price}}$</th>
                        </tr>
                        <tr>
                          <th scope="row">Shipping:</th>
                          <th scope="row"><i>Free</i></th>
                        </tr>
                        <tr>
                          <th scope="row" class="total_price_row">Total for your Order:</th>
                          <th scope="row" class="total_price_row">{{$total_price}}$</th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <hr>
                <h4 class="checkout_headers pay_header">Pay and Place Order</h4>

                <!-- hidden inputs gia thn forma -->
                <input style="display:none;" type="text" value="{{$total_price}}" name="amount">
                <input style="display:none;" type="number" value="{{$products->count()}}" name="products_quantity">
                @for($i=0;$i<$products->count();$i++)
                  <input style="display:none;" type="text" value="{{$products->get($i)->name}}" name="product_name_{{$i}}">
                  <input style="display:none;" type="text" value="{{$product_amounts[$i]}}" name="product_quantity_{{$i}}">
                  <input style="display:none;" type="text" value="{{$products->get($i)->price}}" name="product_price_{{$i}}">
                @endfor

                <button type="submit" class="btn btn-primary btn-block btn-lg" id="paypal_btn">
                    <img src="/photos/paypal.png" width="18px" style="margin-right:5px;margin-bottom:2px;"></img>
                    {{ __('Pay with Paypal') }}
                </button>
              </div>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
