@extends('layouts.master')







@section('header')
	<h2>New Postie Blog</h2>
    <p class="lead blog-description">Write something amazing!</p>
@stop






@section('main')
	


	
	
	<div class="row">
	
	{!! Form::open(['method'=>'POST','action'=>'UserPostController@store']) !!}
	
	<div class="form-group">
	
	{!! Form::label('title','Title:')!!}
	{!!Form::text('title',null,['class'=>'form-control']) !!}
	
	</div>
	
	<div class="form-group">
	
	{!! Form::label('body','Text:')!!}
	{!!Form::textarea('body',null,['class'=>'form-control']) !!}
	
	</div>
	
	
	<div class="form-group">
	
	
	{!!Form::submit('Create Post',['class'=>'btn btn-primary form-control']) !!}
	
	</div>

	{!! Form::close() !!}
	</div>
	
	@include('includes.errors')
	
@stop