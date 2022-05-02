<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use Auth;

class ShopController extends Controller
{
    public function index() {
        $products = Product::select('products.*')
        ->join('shops', 'products.shop_id', '=', 'shops.id')
        ->where('shops.user_id','=', Auth::id())
        ->get();


        return view('profile.shop',[
            'products' => $products,
        ]);
    }
}
