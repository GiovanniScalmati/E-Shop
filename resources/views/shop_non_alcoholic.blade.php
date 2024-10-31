@extends('layouts.app')

@section('title',' - Non Alcoholic')

@section('content')
<div class="container" style="margin-top:4% !important;margin-bottom:4% !important;">
  <div class="row justify-content-center">
    <!-- To plaino menu -->
    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
      <ul class="list-group list-group-flush" id="shop_side_menu">
        <li class="list-group-item list-group-item-action"><a href="{{ route('shop.index') }}" class="shop_links">All Products</a></li>
        @foreach($categories as $category)
        <li class="list-group-item list-group-item-action">
          <div class="btn-group">
            @if($category->name == "Beers")
              <a href="{{ route('shop.beers_index') }}" class="shop_links">{{$category->name}}</a>
            @elseif($category->name == "Ciders")
              <a href="{{ route('shop.ciders_index') }}" class="shop_links">{{$category->name}}</a>
            @elseif($category->name == "Non Alcoholic")
              <a href="{{ route('shop.non_alcoholic_index') }}" class="shop_links category_active">{{$category->name}}</a>
            @elseif($category->name == "Accessories")
              <a href="{{ route('shop.accessories_index') }}" class="shop_links">{{$category->name}}</a>
            @elseif($category->name == "Home Kit")
              <a href="{{ route('shop.home_kit_index') }}" class="shop_links">{{$category->name}}</a>
            @elseif($category->name == "Barley")
              <a href="{{ route('shop.barley_index') }}" class="shop_links">{{$category->name}}</a>
            @endif
            @if($category->name == "Beers")
            <a type="button" class="dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
            </a>
            <div class="dropdown-menu">
              <a href="{{ route('shop.type_index') }}" class="dropdown-item shop_links">Types</a>
              <a href="{{ route('shop.brewery_index') }}" class="dropdown-item shop_links">Breweries</a>
              <a href="{{ route('shop.abv_index') }}" class="dropdown-item shop_links">ABV</a>
            </div>
            @endif
          </div>
        </li>
        @endforeach
      </ul>
    </div>
    <!-- To card pou dhmiourgeitai gia ka8e product -->
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 shop_card">
      <div class="card" style="margin-bottom:1%;">
        <div class="card-header">Non Alcoholic</div>

        <div class="card-body">
          <div class="row" style="margin-left:-25px;">
            @if($non_alcoholics->count() == 0)
              <div class="col-12">
                <h6>No products in this category yet</h6>
              </div>
            @else
              @foreach ($non_alcoholics as $non_alcoholic)
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 product_col">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$non_alcoholic->img}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$non_alcoholic->name}}</h5>
                      <p class="card-text">{{$non_alcoholic->info}}</p>
                      <label>Price: {{$non_alcoholic->price}}$</label>
                      <br>
                      <label>Type: {{$non_alcoholic->type}}</label>
                      <br>
                      <label>Brewery: {{$non_alcoholic->brewery}}</label>
                      <br>
                      <label>ABV: {{$non_alcoholic->abv}}</label>
                      <br>
                      <a href="{{route('shop.page', ['name' => $non_alcoholic->name])}}" class="btn btn-primary" style="margin-top:5px;">Check it</a>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
