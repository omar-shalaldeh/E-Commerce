@extends('layout.main')



@section('title','shirts')




@section('content')

    <div class="row">
        @forelse($shirts as $shirt)
        <div class="small-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper" style="height: 180px">
                    <a href="{{route('cart.additem',$shirt->id)}}" class="button expanded add-to-cart">
                        Add to Cart
                    </a>
                    <a href="#">
                        <img src="{{$shirt->image?'images/'.$shirt->image:'Not Found Image'}}"/>
                    </a>
                </div>

                <a href="{{auth()->check()?route('product.show',$shirt->id):route('shirts')}}">
                    <h3>
                        {{$shirt->name}}
                    </h3>
                </a>
                <h5>
                    {{$shirt->price}}
                </h5>
                <p>
                  {{$shirt->description}}
                </p>
            </div>
        </div>

        @empty
            <h3>Not products</h3>
        @endforelse
    </div>
<br>
    @endsection