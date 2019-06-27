@extends('layout.main')



@section('content')
    <div class="row">


<div class="small-6 small-centered columns">
    {!! Form::open(['method'=>'POST','route'=>'address.store']) !!}
    <div cصlass="form-group">
        {!! Form::label('addressLine','Addressing : ') !!}
        {!! Form::text('addressLine',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city','City : ') !!}
        {!! Form::text('city',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('state','State : ') !!}
        {!! Form::text('state',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('zip','Zip : ') !!}
        {!! Form::text('zip',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('country','Country : ') !!}
        {!! Form::text('country',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone','Phone : ') !!}
        {!! Form::text('phone',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('translate payment',['class'=>'button']) !!}

    </div>
    {!! Form::close() !!}



</div>
</div>




    @endsection