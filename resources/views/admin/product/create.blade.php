@extends('admin.layout.admin')




@section('content')
    <html lang="fr">
    <h3 style="color: #2a88bd" lang="fr">Add Product</h3>


<div class="row">
    <div class="col-md-8 col-md-offset-2">
    {!! Form::open(['method'=>'POST','action'=>'ProductsController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name :') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description','Description :') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
    </div>

        <div class="form-group">
            {!! Form::label('category_id','Categories :') !!}
            {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Select Category']) !!}
        </div>
    <div class="form-group">
        {!! Form::label('size','Size :') !!}
        {!! Form::select('size',array('small'=>'small','medium'=>'medium','large'=>'large'),null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image','Image :') !!}
        {!! Form::file('image',['class'=>'form-control']) !!}
    </div>
        <div class="form-group">
            {!! Form::label('price','Price :') !!}
            {!! Form::text('price',null,['class'=>'form-control']) !!}
        </div>
    <div class="form-group ">

        {!! Form::submit('Add Product',['class'=>'btn btn-primary col-sm-12']) !!}
    </div>

{!! Form::close() !!}
</div>
</div>
</html>
    @endsection
