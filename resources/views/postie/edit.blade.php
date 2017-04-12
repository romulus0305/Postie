@extends('layouts.master')






@section('header')
    <h2>Edit Post <u>{{$post->title}}</u></h2>
    <p class="lead blog-description">Here you can edit your post.</p>
@stop





@section('main')

    @include('includes.errors')


<div class="row">

    {!! Form::model($post,['method'=>'PATCH','action'=>['UserPostController@update',$post->id]]) !!}  <!--Edit form-->

    <div class="form-group">
        {!! Form::label('title','Title:')!!}
        {!!Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body','Text:')!!}
        {!!Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!!Form::submit('Edit Post',['class'=>'btn btn-primary col-sm-6']) !!}
    </div>

    {!! Form::close() !!}  <!--/ Edit form-->


    {!! Form::open(['method'=>'DELETE','action'=>['UserPostController@destroy',$post->id]]) !!} <!--Delete Form-->

    <div class="form-group">
        {!!Form::submit('Delete',['class'=>'btn btn-danger  col-sm-6']) !!}
    </div>

    {!! Form::close() !!} <!--/ Delete Form-->

</div>



@stop
