<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Mail\OrderShippedex;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function orders($type='')
    {
        if ($type=='pending')
        {
            $orders=Order::where('delivered','0')->get();
        }
        elseif ($type=='delivered')
        {
            $orders=Order::where('delivered','1')->get();
        }
        elseif($type=='index')
        {
            $orders=Order::all();
        }
        return view('admin.orders',compact('orders'));
    }

    public function toggledeliverd(Request $request,$orderId)
    {
        $order=Order::find($orderId);
        if ($request->has('delivered')) {
            Mail::to($order->user)->send(new OrderShippedex($order));
            $order->delivered = $request->delivered;
        }
        else
        {

            $order->delivered="0";

        }
        $order->save();
        return back();

    }
}
