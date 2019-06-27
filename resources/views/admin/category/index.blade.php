@extends('admin.layout.admin')


@section('content')

    <div class="navbar">
        <a class="navbar-brand" href="#">Categories</a>
        @if(!empty($categories))
            @forelse($categories as $category)
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{route('category.show',$category->id)}}">{{$category->name}}</a>
            </li>
            @empty
                <li>No Data</li>
@endforelse
            @endif
        </ul>
    </div>
<a class="btn btn-primary" data-toggle="modal" href="#modal-id">Add Category</a>
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            {!! Form::open(['method'=>'POST','action'=>'CategoriesController@store','files'=>true]) !!}
            <div class="modal-content">
                <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>

<h4 class="modal-title">Add Category</h4>


                </div>
<div class="modal-body">
    <div class="form-group">
        {!! Form::label('name','Name :') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
</div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" >Save changes</button>
                </div>
            </div>
{!! Form::Close() !!}
        </div>
    </div>




    @if(!empty($products))
    <section>
        <h3>products</h3>
 <table class="table">
         <tr>
             <th>Product</th>

         </tr>
     @forelse($products as $product)
         <tr>
             <td>{{$product->name}}</td>

         </tr>
@empty
         <h3>No Data</h3>
 @endforelse
     </table>

@endif



    </section>


    @endsection












