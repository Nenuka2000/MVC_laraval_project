<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Order::query();
        return view('admin.orders.index', [
            'orders' => $query->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.manage', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);

        $order->update($data);
        return redirect('/admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/admin/orders');
    }

    public function index_client()
    {
        return view('orders.index', [
            'orders' => Auth::user()->orders
        ]);
    }

    public function show_client(Order $order)
    {
        if(!$order->user_id == Auth::user()->id)
        {
            abort(404);
        }

        return view('orders.show', compact('order'));
    }

    public function checkout_form()
    {
        if(Auth::user()->cart->count()){
            return view('checkout');
        }
        return redirect()->intended('/cart');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = $user->cart;

        // Is cart empty?
        if(!$cart->count()){
            return redirect()->intended('/cart');
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            'cardholder_name' => 'required|string|max:255',
            'card_number' => 'required|numeric|digits:16',
            'expiration_month' => 'required|string|max:12',
            'expiration_year' => 'required|numeric|min:' . Carbon::today()->format('Y'),
            'cvv' => 'required|string|min:3|max:4',
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'company' => $request->company,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'zip' => $request->zip
        ]);

        foreach($cart as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $item->book_id,
                'quantity' => $item->quantity,
                'price' => $item->book->price
            ]);
        }

        $user->cart()->delete();

        return redirect('/orders/' . $order->id);
    }
}
