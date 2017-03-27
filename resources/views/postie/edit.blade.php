@extends('layouts.master')






@section('header')
	<h2>Edit Post <i>{{$post->title}}</i></h2>
    <p class="lead blog-description">Here you can edit your post.</p>
@stop



{{-- 
https://laravel.com/docs/5.3/authorization 


https://laracasts.com/discuss/channels/general-discussion/laravel-5-middleware-owner?page=1

--}}




@section('main')

@include('includes.errors')


	<div class="row">
	
	{!! Form::model($post,['method'=>'PATCH','action'=>['UserPostController@update',$post->id]]) !!}
	
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

	{!! Form::close() !!}


{!! Form::open(['method'=>'DELETE','action'=>['UserPostController@destroy',$post->id]]) !!} {{-- Delete Forma --}}

<div class="form-group">
	{!!Form::submit('Delete',['class'=>'btn btn-danger  col-sm-6']) !!}
</div>

{!! Form::close() !!}




	</div>
	
	

@stop