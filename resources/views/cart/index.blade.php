@extends('layout.main')




@section('content')
    <div class="row">
    <h1 style="color: #843534;text-align: center">Carts</h1>
     <table class="table">
             <tr>
                 <th>name</th>
                 <th>price</th>
                 <th>Qty</th>
                 <th>size</th>
                 <th>Action</th>
             </tr>
         @forelse($cartitems as $cartitem)
             <tr>
                 <td>{{$cartitem->name}}</td>
                 <td>{{$cartitem->price}}</td>
                 <td width="80px">
                 {!! Form::open(['route'=>['cart.update',$cartitem->rowId],'method'=>'Patch']) !!}
                     <input name="qty" type="text" value="{{$cartitem->qty}}">


                 </td>
                 <td>
                     <div>
                         {!! Form::select('size',['small'=>'small','medium'=>'medium','large'=>'large'],$cartitem->options->has('size')?$cartitem->options->size:'') !!}
                     </div></td>
                 <td>
                     <input style="float: left" type="submit" class="button success small" value="ok">
                 {!! Form::close() !!}

                    {!! Form::open(['route'=>['cart.destroy',$cartitem->rowId],'method'=>'DELETE']) !!}
                     {{Csrf_field()}}
                     <input type="submit" style="margin-left: 15px" class="button small alert" value="DELETE">
                 {!! Form::Close() !!}

                 </td>
             </tr>


         @empty
             <h1>Not product the Cart</h1>

@endforelse


         <tr>
             <td></td>
             <td>
                 Tax :{{Cart::tax()}}$<br>
                 sub Total :{{Cart::subtotal()}} $<br>
                 Grand Total :{{Cart::total()}}
             </td>
             <td>Items :{{Cart::count()}}</td>
             <td></td>
             <td></td>
         </tr>
         </table>
    <a class="button large btn-primary " href="{{route('checkout')}}">
    <button>Check out</button>

    </a>

    </div>




    @endsection