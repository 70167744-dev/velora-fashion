<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('cart.view');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('cart.view');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => 'cod',
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        foreach ($cart as $productId => $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('order.confirmation', $order->id);
    }

    public function confirmation($id)
    {
        $order = \App\Models\Order::with('items.product')->findOrFail($id);

        return view('order-confirmation', compact('order'));
    }
}
