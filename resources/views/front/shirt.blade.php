
@extends('layout.main')
@extends('admin.layout.admin2')

@section('title','shirt')




@section('content')



    <div class="row">
        <div class="small-5 small-offset-1 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="#">
                        <img height="100" width="100" src="{{$shirt->image?asset('images/'.$shirt->image):'Not Found Image'}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="item-wrapper">
                <h3 class="subheader">
                    <span class="price-tag">{{$shirt->price}}$</span> {{$shirt->name}}
                </h3>
                <div class="row">
                    <div class="large-12 columns">
                        <label>
                            Select Size
                        </label>

                            <div class="form-group">
                                {!! Form::select('size',[''=>'select size',0=>'small',1=>'medium',2=>'large'],null,['class'=>'form-control']) !!}
                              <a href="{{route('cart.additem',$shirt->id)}}"><input type="submit" value="Add To Cart" class="button expanded add-to-cart"></a>
{!! Form::close() !!}
                            </div>



                    </div>
                </div>
                <p class="text-left subheader"><small>* Designed by <a href="https://www.youtube.com/webdevmatics">Webdevmatics</a></small></p>

            </div>
        </div>


 <div class="small-6 small-centered columns">
<div style="height: 30px; width: 30%;" ></div>
<star-rating></star-rating>
    <a class="btn btn-primary pull-right" data-toggle="modal" href="#modal-id">Write a review</a>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            {!! Form::open(['method'=>'POST','action'=>'ProductReviewController@store','files'=>true]) !!}
            {{Csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>

                    <h4 class="modal-title">Form Title</h4>


                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('headline','HeadLine :') !!}
                        {!! Form::text('headline',null,['class'=>'form-control']) !!}
                    </div>



                    <div class="form-group">
                        {!! Form::label('description','Tell Us More :') !!}
                        {!! Form::text('description',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('rating','Rate Ie :') !!}
                        {!! Form::text('rating',null,['class'=>'form-control']) !!}
                    </div>
                     <input type="hidden" name="product_id" value="{{$shirt->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
            </div>
            {!! Form::Close() !!}
        </div>
    </div>


 </div>
    </div>

    <div class="item-arapper">

        @forelse($shirt->reviews as $pro)
            <li>
                <h1>{{$pro->headline?$pro->headline:'N/A'}}</h1>
                <h2>{{$pro->description?$pro->description:'N/A'}}</h2>
                <h3>{{$pro->rating?$pro->rating:'N/A'}}</h3>

            </li>
      @empty
            <h1>Not Review</h1>

        @endforelse
    </div>


@endsection

