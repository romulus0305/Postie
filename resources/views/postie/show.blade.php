@extends('layouts.master')














@section('main')
	@if ($postie)
	

		<div class="blog-post">

			<h2 class="blog-post-title">{{$postie->title}}</h2>
			<p class="blog-post-meta">{{$postie->created_at}}&nbsp;&nbsp;<a href="#">{{$postie->user->name}}</a></p>

			<div>{{$postie->body}}</div>
		</div>

		
	@endif
@stop