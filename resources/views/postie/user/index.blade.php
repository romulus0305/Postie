@extends('layouts.master')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
<link href="/css/postie.css" rel="stylesheet">
@stop


@section('main')

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">{{$data['user']->name}}'s Profile</h3>
    </div>
    <div class="panel-body"style="margin-top: 50px">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">User Info</a></li>
            <li role="presentation"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All Posts</a></li>
            @if(Auth::id() == $data['user']->id)
            <li role="presentation"><a href="#edit" aria-controls="edit" role="tab" data-toggle="tab">Edit Post</a></li>
            @endif
        </ul>
        <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 50px">
                <div role="tabpanel" class="tab-pane fade in active" id="info"> <!--user-info-->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p><label>Name:</label>&nbsp;&nbsp;{{$data['user']->name}}</p>
                            <p><label>Email:</label>&nbsp;&nbsp;{{$data['user']->email}}</p>
                            <p><label>Registered:</label>&nbsp;&nbsp;{{$data['user']->created_at->format('l jS \\of F Y')}}</p>
                            @if ($data['users_posts'])
                            <p><label>Number of posts:</label>&nbsp;&nbsp;{{count($data['users_posts'])}}</p>
                            <p><label>Last Post:</label>&nbsp;&nbsp;<a href="{{ route('postie.show',$data['users_last_post']->id) }}">{{$data['users_last_post']->title}}</a>&nbsp;&nbsp;&nbsp;&nbsp;{{$data['users_last_post']->created_at->diffForHumans()}}</p>
                            @else
                            <label>There is no information about Blogs, <a href="{{ route('postie.create') }}">Click here to write one!</a></label>
                            @endif
                        </div>
                    </div>
                </div> <!--/   user-info-->
                <div role="tabpanel" class="tab-pane fade" id="all"> <!--	allPosts-->
                    @if($data['users_posts'])
                    @foreach ($data['users_posts'] as $post)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 id="profileName"><a href="{{ route('postie.show',$post->id) }}">{{$post->title}}</a></h3>
                            <div id="wordBreak" class="lead text-justify">
                                {{str_limit($post->body,220)}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <a href="{{ route('postie.create') }}">Write a Blog post!</a></label>	
                    @endif	
                </div><!--/	allPosts-->
                @if(Auth::id() == $data['user']->id ) 
                <div role="tabpanel" class="tab-pane fade" id="edit"><!--	Section edit-->
                    <div class="col-sm-5">
                        @foreach ($data['comments'] as $data['comments'])
                        {{ $data['comments']->body }}
                        @endforeach
                    </div>
                </div><!--/	Section edit-->
                @endif 
            </div> <!--/	Tab panes-->
    </div> {{-- panel-body --}}
</div> {{-- panel panel-primary --}}

@stop