<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        return view('cart', [
            'cart' => $user->cart,
            'total' => $user->cart_total()
        ]);
    }

    public function add(Book $book)
    {
        $user = Auth::user();
        $cart_item = $user->cart->where('book_id', $book->id)->first();
        if(!$cart_item){
            $cart_item = CartItem::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'quantity' => 1
            ]);
        } else{
            $cart_item->quantity += 1;
            $cart_item->save();
        }
        return back();
    }

    public function sub(Book $book)
    {
        $user = Auth::user();
        $cart_item = $user->cart->where('book_id', $book->id)->first();
        if($cart_item && $cart_item->quantity >= 2){
            $cart_item->quantity -= 1;
            $cart_item->save();
        }
        return back();
    }

    public function remove(Book $book)
    {
        $user = Auth::user();
        $user->cart->where('book_id', $book->id)->first()->delete();
        return back();
    }
}
