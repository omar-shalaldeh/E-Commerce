@extends('admin.layout.admin')

@section('content')

    <h1>Orders</h1>
    <hr>
    <ul>
        @foreach($orders as $order)
            <li>

                <h4>Order By: {{$order->user->name}}</h4>
                <h4>the sum total: {{$order->total}}</h4>
                <form action="{{route('toggle.deliver',$order->id)}}" method="post" class="pull-right">
                    {{Csrf_field()}}
                    <label for="delivered">Delivered</label>
                    <input type="checkbox" value="1" name="delivered" {{$order->delivered==1?"checked":""}}>
                    <input type="submit" value="ok">
                </form>

                <hr>
                <h5>Items</h5>
           <table class="table table-bordered">
               <tr>

                <th style="text-align: center">name</th>
                <th style="text-align: center">qty</th>
                <th style="text-align: center">price</th>

            </tr>
             @foreach($order->orderItems as $item)
                 <tr>

                         <td>{{$item->name}}</td>
                         <td>{{$item->pivot->qty}}</td>
                         <td>{{$item->pivot->total}}</td>


                 </tr>


                     @endforeach
           </table>
<strong><hr></strong>

            </li>




            @endforeach




    </ul>



    @endsection