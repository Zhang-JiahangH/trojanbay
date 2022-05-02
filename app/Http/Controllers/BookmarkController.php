<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Product;
use Auth;

class BookmarkController extends Controller
{
    public function store($user_id, $product_id) {

        Bookmark::insert([
            'user_id' => $user_id,
            'product_id' => $product_id,
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        return redirect()
        ->route('product.detail', [ 'id' => $product_id ])
        ->with('success', "Successfully add Bookmark!");
    }
    
    public function delete($user_id, $product_id) {
        Bookmark::where('user_id', '=', $user_id)
                ->where('product_id', '=', $product_id)
                ->delete();
        
        return redirect()
        ->route('product.detail', [ 'id' => $product_id ])
        ->with('success', "Successfully delete Bookmark!");
    }

    public function index() {
        $bookmarks = Bookmark::select('bookmarks.*')
        ->join('products', 'bookmarks.product_id', '=', 'products.id')
        ->where('bookmarks.user_id','=', Auth::id())
        ->get();


        return view('profile.bookmark',[
            'bookmarks' => $bookmarks,
        ]);
    }
}
