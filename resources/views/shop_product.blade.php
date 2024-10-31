@extends('layouts.app')

@section('title',' - Shop - Product')

@section('content')
<div class="container" style="margin-bottom:2% !important;">
  <div class="row" style="margin-top:3%;">
    <!-- To img tou ka8e proiontos -->
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align:center;">
      <img class="product_page_image" src="{{$product->img}}" width="70%" alt="Card image cap">
    </div>
    <!-- Ta stoixeia tou ka8e proiontos -->
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h4>{{$product->name}}</h4>
      <label class="product_labels"><b>{{$product->type}} {{$product->abv}} Abv.</b></label>
      <p>{{$product->info}}</p>
      <label>Price: {{$product->price}}$</label>
      <br>
      <label>Brewery: {{$product->brewery}}</label>
      <br>
      <!-- To button allazei href analoga me ton an o user einai guest 'h oxi -->
      @guest
        <a href="{{ route('login') }}" class="btn btn-primary btn-md" style="margin-top:1%;">Add to Chart</a>
      @else
        <a href="{{ route('profile.cart') }}" class="btn btn-primary btn-md" style="margin-top:1%;" onclick="event.preventDefault();document.getElementById('add_to_cart_form').submit();document.getElementById('add_message').style.display='block';">Add to Chart</a>
        <form id="add_to_cart_form" action="{{ route('profile.cart_add', ['product_id' => $product->id]) }}" method="POST" style="display: none;">
            @csrf
        </form>
      @endguest
      <div id="add_message">
        <hr>
        <label>This item was added to your cart!</label>
        <br>
        <a href="{{ route('profile.cart') }}" class="btn btn-md btn-primary" style="margin-top:1%;">My Cart</a>
      </div>
    </div>
  </div>
</div>
@endsection
