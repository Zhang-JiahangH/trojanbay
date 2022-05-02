<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function index($product_id) {
        $product = Product::where('id', '=', $product_id)->first();

        $comments = Comment::select('comments.*')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->where('comments.product_id','=', $product_id)
        ->orderBy('created_at', 'DESC')
        ->get();


        return view('comment.index',[
            'comments' => $comments,
            'product' => $product,
        ]);
    }

    public function create($product_id) {
        return view('comment.create', [
            'product_id' => $product_id,
        ]);
    }

    public function store(Request $request) {
        Comment::insert([
            'user_id' => Auth::id(),
            'product_id' => $request->input('product_id'),
            'body' => $request->input('comment'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        return redirect()
        ->route('comment.index', [ 'product_id' => $request->input('product_id') ])
        ->with('success', "Successfully created Comment");
    }

    public function edit($id)
    {
        $comment = Comment::where('id', '=', $id)->first();

        return view('comment.edit', [
            'comment' => $comment,
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        Comment::where('id', $id)->update([
            'body' => $request->input('comment'),
        ]);

        return redirect()
            ->route('comment.index', [ 'product_id' => $request->input('product_id') ])
            ->with('success', "Successfully edit Comment");
    }

    public function delete($id, $product_id) {
        Comment::where('id', '=', $id)
                ->delete();
        
        return redirect()
            ->route('comment.index', [ 'product_id' => $product_id ])
            ->with('success', "Successfully delete Comment");
    }
}
