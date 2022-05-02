<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Bookmark;
use App\Models\Comment;
use Auth;
use DB;

class ProductController extends Controller
{
    public function textbook() {
        $textbooks = Product::select('products.*')
        ->where('products.genre','=', 1)
        ->get();

        return view('product.list',[
            'products' => $textbooks,
        ]);
    }

    public function technology() {
        $technology = Product::select('products.*')
        ->where('products.genre','=', 2)
        ->get();

        return view('product.list',[
            'products' => $technology,
        ]);
    }

    public function ticket() {
        $ticket = Product::select('products.*')
        ->where('products.genre','=', 3)
        ->get();

        return view('product.list',[
            'products' => $ticket,
        ]);
    }

    public function other() {
        $other = Product::select('products.*')
        ->where('products.genre','=', 4)
        ->get();

        return view('product.list',[
            'products' => $other,
        ]);
    }
    
    public function searchform() {
        return view('product.search');
    }

    public function search(Request $request) {
        $genre = (int)$request->genre;
        if($request->item_name == NULL) {
            $item_name = '%%';
        }
        else {
            $item_name = '%' . strtolower($request->item_name) . '%';
        }
        if($genre != 0) {
            $result = Product::select('products.*')
            ->where('products.genre','=', $genre)
            ->where('name', 'ilike', $item_name)
            ->get();
        }
        else {
            $result = Product::select('products.*')
            ->where('name', 'ilike', $item_name)
            ->get();
        }

        return view('product.list',[
            'products' => $result,
        ]);
    }

    // product CURD
    public function index($id)
    {
        $product = Product::where('id', '=', $id)->first();
        $shop = Shop::where('id', '=', $product->shop_id)->first();
        $bookmark = Bookmark::where('user_id', '=', Auth::id())
                            ->where('product_id', '=', $id)
                            ->first();
        return view('product.index', [
            'product' => $product,
            'shop' => $shop,
            'bookmark' => $bookmark,
        ]);
    }

    public function create() {
        $genres = Genre::orderBy('id')->get();
        return view('product.create', [
            'genres' => $genres,
        ]);
    }

    public function store(Request $request) {
        $shop = Shop::where('user_id', '=', Auth::id())->first();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'url' => 'required',
            'genre' => 'required',
        ]);

        // Product::insert([
        //     'name' => $request->input('name'), 
        //     'description' => $request->input('description'),
        //     'price' => $request->input('price'),
        //     'picture_path' => $request->input('url'),
        //     'shop_id' => $shop->id,
        //     'genre' => $request->input('genre'),
        // ]);
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->picture_path = $request->input('url');
        $product->shop_id = $shop->id;
        $product->genre = $request->input('genre');
        $product->save();

        $name = $request->input('name');

        return redirect()
        ->route('product.edit', [ 'id' => $product->id ])
        ->with('success', "Successfully created {$name}");
    }

    public function edit($id)
    {
        $product = Product::where('id', '=', $id)->first();
        $shop = Shop::where('id', '=', $product->shop_id)->first();
        $genres = Genre::orderBy('id')->get();

        return view('product.edit', [
            'product' => $product,
            'shop' => $shop,
            'genres' => $genres,
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'url' => 'required',
            'genre' => 'required',
        ]);

        Product::where('id', $id)->update([
            'name' => $request->input('name'), 
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'picture_path' => $request->input('url'),
            'genre' => $request->input('genre'),
        ]);

        return redirect()
            ->route('product.edit', [ 'id' => $id ])
            ->with('success', "Successfully updated {$request->input('name')}");
    }

    public function delete($id) {
        Bookmark::where('product_id', '=', $id)
                ->delete();
        Comment::where('product_id', '=', $id)
                ->delete();
        Product::where('id', '=', $id)
                ->delete();
        
        return redirect()
        ->route('shop.index')
        ->with('success', "Successfully delete product!");
    }
}
