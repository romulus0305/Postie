@extends('layouts.master')














@section('main')
	@if ($post)
	

		<div class="blog-post">

			<h2 class="blog-post-title">{{$post->title}}</h2>
			<p class="blog-post-meta">{{$post->created_at}}&nbsp;&nbsp;<a href="#">{{$post->user->name}}</a></p>

			<div>{{$post->body}}</div>
		</div>

		
	@endif
@stop