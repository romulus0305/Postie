@extends('layouts.master')







@section('header')
	<h1 class="blog-title">Create new Postie Blog</h1>
    <p class="lead blog-description">Write something amazing</p>
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
	
	
	
@stop