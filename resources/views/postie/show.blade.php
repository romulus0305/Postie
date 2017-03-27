@extends('layouts.master')














@section('main')
	@if ($postie)
		@if ($isOwner)
			<button class="pull-right" onclick="window.location='{{ route("postie.edit",$postie->id) }}'">Edit</button>
			
		@endif
		
		<div class="blog-post">

			<h2 class="blog-post-title">{{$postie->title}}</h2>
			<p class="blog-post-meta">{{$postie->created_at}}&nbsp;&nbsp;<a href="#">{{$postie->user->name}}</a></p> 

			<div style="white-space: pre-wrap;">{{($postie->body)}}</div>
		</div>

		
	@endif
@stop