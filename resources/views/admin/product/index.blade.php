@extends('admin.layout.admin')



@section('content')
    <h3>Products</h3>

    <ul>
        @forelse($products as $product)
         <h4>Name Of Product : {{$product->name}}</h4>
            <li><strong> Name Of Category : </strong>{{count($product->category)?$product->category->name:'N/A'}}
            {!! Form::open(['method'=>'DELETE','saction'=>['ProductsController@destroy',$product->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}

                    </div>
                    {!! Form::close() !!}



            </li>


            @empty
            <h2>Not Product</h2>
            @endforelse
    </ul>


    @endsection