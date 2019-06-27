<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable=['user_id','total','delivered'];


    public function orderItems()
    {

        return $this->belongsToMany(Product::class)->withPivot('qty','total');

    }


    public function user()
    {

        return $this->belongsTo(User::class);
    }


    public static function CreateOrder()
    {

        $order=Auth::user()->orders()->create([
            'total'=>Cart::total(),
            'delivered'=>0
        ]);
        $cartitems=Cart::content();
        foreach ($cartitems as $cartitem)
        {
            $order->orderItems()->attach($cartitem->id,[
                'qty'=>$cartitem->qty,
                'total'=>$cartitem->qty*$cartitem->price
            ]);
        }




    }
}
