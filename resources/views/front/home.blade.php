@extends('layout.main')



@section('content')


<section class="hero text-center">
    <br/>
    <br/>
    <br/>
    <br/>
    <h2 >
        <strong style="color: black">
            Hey! Welcome to MC- Mykey's Store
        </strong>
    </h2>
    <br>
    <a href="{{url('/shirts')}}">
        <button class="button large ">Check out My Shirts</button>
    </a>
</section>
<br/>
<div class="subheader text-center">
    <h2>
        MyKey&rsquo;s Latest Shirts
    </h2>
</div>

<!-- Latest SHirts -->
<div class="row">
    @forelse($shirts->chunk(3) as $chunk)
        @foreach($chunk as $shirt)
    <div class="small-3 columns">
        <div class="item-wrapper">
            <div class="img-wrapper" style="height: 150px">
                <a href="{{route('cart.additem',$shirt->id)}}" class="button expanded add-to-cart">
                    Add to Cart
                </a>
                <a href="#">
                    <img src="{{url('images',$shirt->image)}}"/>
                </a>
            </div>
            <a href="{{auth()->check()?route('product.show',$shirt->id):''}}">
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
        @endforeach
    @empty
    <h3>Not Shirt</h3>

        @endforelse
</div>
<!-- Footer -->
<br>


    @endsection