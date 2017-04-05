@extends('layouts.master')














@section('main')
	@if ($postie)
		@if ($isOwner)
			<button class="pull-right" onclick="window.location='{{ route("postie.edit",$postie->id) }}'">Edit</button>
			
		@endif
		
		<div class="blog-post">

			<h2 class="blog-post-title">{{$postie->title}}</h2>
			<p class="blog-post-meta">{{$postie->created_at->format('l jS \\of F Y')}}&nbsp;&nbsp;<a href="{{ route('user.index',$postie->user->id) }}">{{$postie->user->name}}</a></p> 

			<div style="white-space: pre-wrap;">{{($postie->body)}}</div>
		</div>

		
	@endif
@stop