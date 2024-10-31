@extends('layouts.app')

@section('title',' - Shop - My Cart')

@section('content')
<div class="container" style="margin-bottom:8% !important;">
  <div class="row" style="margin-top:3%;">
    <!-- O pinakas twn proiontwn -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-header">My Cart</div>
        <!-- The table with the content of the user's cart -->
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Brewery</th>
                <th scope="col">Abv.</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @for($i=0;$i<$products->count();$i++)
              <tr>
                <th scope="row">{{$products->get($i)->name}}</th>
                <td>{{$product_amounts[$i]}}<a href="{{ route('my_cart.more', ['product_id' => $products->get($i)->id])}}"><i class="fa fa-angle-up cart_amounts"></i></a><a href="{{ route('my_cart.less', ['product_id' => $products->get($i)->id])}}"><i class="fa fa-angle-down cart_amounts"></i></a></td>
                <td>{{$products->get($i)->brewery}}</td>
                <td>{{$products->get($i)->abv}}</td>
                <td>{{$products->get($i)->price}}$</td>
                <td><a class="btn btn-sm btn-danger" style="color:white;" href="{{route('my_cart.remove', ['product_id' => $products->get($i)->id])}}">Remove</a></td>
              </tr>
              @endfor
            </tbody>
          </table>
          <hr>
          <!-- The cart's total price -->
          <label>Total Price: {{$total_price}}$</label>
          <a class="btn btn-md btn-info" href="{{ route('profile.checkout') }}" style="margin-left:2%;">Checkout</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
