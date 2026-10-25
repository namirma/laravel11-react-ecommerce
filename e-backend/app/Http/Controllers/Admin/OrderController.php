<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(): Application|Factory|View
    {
        $orders = Order::with(['products','user','coupon'])->latest()->get();
        return view('admin.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function updateDeliveredDate(Order $order)
    {
        $order->update([
            'delivered_at' => now()
        ]);
        return redirect()->route('admin.orders.index')->with([
            'success' => 'Order Successfully delivered',
        ]);
    }

    public function delete(Order $order): RedirectResponse
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with([
            'success' => 'Order deleted successfully',
        ]);
    }
}
