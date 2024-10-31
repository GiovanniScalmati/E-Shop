<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\Category;
use Illuminate\Http\Request;

class shopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('shop')->with('products', $products)->with('categories', $categories);
    }

    public function type_index()
    {
        $products = Product::all();
        $types = array();
        $types = Product::pluck('type')->unique();
        $categories = Category::all();
        return view('shop_types')->with('products', $products)->with('types', $types)->with('categories', $categories);
    }

    public function ciders_index()
    {
        $categories = Category::all();
        $ciders = Product::where('category_id', 2)->get();
        return view('shop_ciders')->with('ciders', $ciders)->with('categories', $categories);
    }

    public function non_alcoholic_index() {
      $categories = Category::all();
      $non_alcoholics = Product::where('category_id', 3)->get();
      return view('shop_non_alcoholic')->with('non_alcoholics', $non_alcoholics)->with('categories', $categories);
    }

    public function accessories_index()
    {
        $categories = Category::all();
        $acccessories = Product::where('category_id', 4)->get();
        return view('shop_accessories')->with('acccessories', $acccessories)->with('categories', $categories);
    }

    public function home_kit_index()
    {
        $categories = Category::all();
        $home_kit = Product::where('category_id', 5)->get();
        return view('shop_home_kit')->with('home_kit', $home_kit)->with('categories', $categories);
    }

    public function barley_index()
    {
        $categories = Category::all();
        $barley = Product::where('category_id', 6)->get();
        return view('shop_barley')->with('barley', $barley)->with('categories', $categories);
    }

    public function beers_index()
    {
        $categories = Category::all();
        $beers = Product::where('category_id', 1)->get();
        return view('shop_beers')->with('beers', $beers)->with('categories', $categories);
    }

    public function brewery_index()
    {
        $categories = Category::all();
        $products = Product::all();
        $breweries = array();
        $breweries = Product::pluck('brewery')->unique();
        return view('shop_breweries')->with('products', $products)->with('breweries', $breweries)->with('categories', $categories);
    }

    public function abv_index()
    {
        $products = Product::all();
        $categories = Category::all();
        $abv = array();
        $abv = Product::pluck('abv')->unique();
        return view('shop_abv')->with('products', $products)->with('abv', $abv)->with('categories', $categories);
    }

    public function page($name)
    {
        $product = Product::where('name', $name)->first();

        return view('shop_product')->with('product', $product);
    }

    public function order_store($total_price)
    {
        $user_id = Auth::id();
        $new_order = new Order;
        $new_order->customer_id = $user_id;
        $new_order->total_price = $total_price;
        dd($new_order);
        $new_order->save();
        return route('profile.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
