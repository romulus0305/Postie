@extends('layouts.master')














@section('main')
	@if ($data['post'])
		@if ($data['edit_button'])
			<button class="pull-right" onclick="window.location='{{ route("postie.edit",$data['post']->id) }}'">Edit</button>
			
		@endif
		<div class="jumbotron">
			<div class="blog-post">

				<h2 class="blog-post-title">{{$data['post']->title}}</h2>
				<p class="blog-post-meta">{{$data['post']->created_at->format('l jS \\of F Y')}}&nbsp;&nbsp;<a href="{{ route('user.index',$data['post']->user->id) }}">{{$data['post']->user->name}}</a></p> 
				<div style="white-space: pre-wrap;">{{($data['post']->body)}}</div>

			</div>
			@include('includes.errors')
			<hr>
			<div class="row">
				
				{!! Form::open(['method'=>'POST','action'=>'PostCommentController@store']) !!}
				
				
				<div class="form-group">
				
				
				{!!Form::textarea('comment',null,['class'=>'form-control','rows'=>2,'placeholder'=>'Write a comments here...']) !!}
				
				</div>
				
				
				{{ Form::hidden('post_id',$data['post']->id) }}

				<div class="form-group">
				
				
				{!!Form::submit('Comment',['class'=>'btn btn-primary form-control']) !!}
				
				</div>


				{!! Form::close() !!}
				
				</div>
					@if ($data['comments'])
						
						@foreach ($data['comments'] as $comment)
							
						
					<div>
					{{-- razmisli o ovome ispod i dodaj vreme komentara
						{!!$id = $comment->post->user->whereName($comment->user_name)->get()!!}
						{{$id[0]->id}} --}}
						<span class="label label-info inverse"><a href=" {{ route('user.index',$comment->user->id) }} ">{{$comment->user->name}}</a></span>

						<p> {{$comment->body}} </p>
					</div>
						@endforeach
					@endif


					
				

		</div> {{-- jumbotron --}}
		
	@endif
@stop