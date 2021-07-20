<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public function index() {
        $categories = Category::all();
        $orderId = session('orderId');

        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        } else {
            $order = null;
        }

        return view('basket/index', compact('categories', 'order'));
    }

    public function basketAdd($productId) {
        $categories = Category::all();
        $orderId = session('orderId');

        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        return redirect()->route('basket', compact('categories', 'order'));
    }

    public function basketRemove($productId) {
        $categories = Category::all();
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('basket', compact('categories', 'order'));
        }
        
        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;

            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        return redirect()->route('basket', compact('categories', 'order'));
    }

    public function checkout() {
        $categories = Category::all();
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('basket');
        }

        $order = Order::find($orderId);

        return view('basket/checkout', compact('categories', 'order'));
    }

    public function checkoutConfirm(Request $request) {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('home');
        }

        $order = Order::find($orderId);
        $success = $order->saveOrder($request->firstname, $request->tel);

        if ($success) {
            session()->flash('success', 'Your order is accepted for processing');
        } else {
            session()->flash('warning', 'Error');
        }


        return redirect()->route('home');
    }
}
