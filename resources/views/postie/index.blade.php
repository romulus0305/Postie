@extends('layouts.master')


@section('css')
 <link href="/css/postie.css" rel="stylesheet">
@stop











@section('main')
	@if (count($posts)>0)
		@foreach ($posts as $post)

		<div class="blog-post">

			<h2 class="blog-post-title"><a href="{{ route('postie.show',$post->id) }}">{{$post->title}}</a></h2>
			<p class="blog-post-meta">{{$post->created_at}}&nbsp;&nbsp;<a href="#">{{$post->user->name}}</a></p>

			<div>{{str_limit($post->body,150)}}</div>
		</div>

		@endforeach
	@else
	<div class="text-center">
	<h3 class="noPosts"><i> Welcom To Postie,write a Blog Post!</i></h3>
	
	</div>
	@endif
@stop

