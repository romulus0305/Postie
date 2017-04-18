@extends('layouts.master')




@section('main')
@if (count($posts)>0)
@foreach ($posts as $post)

<div class="blog-post">    <!--Post-->
    <h2 class="blog-post-title"><a href="{{ route('postie.show',$post->id) }}">{{$post->title}}</a></h2>
    <p class="blog-post-meta">{{$post->created_at->format('l jS \\of F Y')}}&nbsp;&nbsp;<a href="{{ route('user.index',$post->user->id) }}">{{$post->user->name}}</a></p>
    <div id="wordBreak" >{{str_limit($post->body,350)}}</div>
</div>    <!--/ Post-->

@endforeach
@else

<div class="text-center"> <!--No Post-->
    <h3 class="noPosts"><i> Welcom To Postie,write a Blog Post!</i></h3>
</div><!--/ No Post-->
@endif
<div class="row">   <!-- Pager-->
    <div class="col-sm-6 col-sm-offset-5">
        {{ $posts->appends(['month'=>request('month'),'year'=>request('year')])->links() }}
    </div>
</div>
@if ($flash=session('created_post'))
<div id="flash" class="alert alert-success animated bounceInDown" style="z-index: 10; position: absolute; top:40px; right: 50px;">
    {{$flash}}
</div>
@endif
@if ($flash=session('deleted_account'))
<div id="flash" class="alert alert-info animated bounceInDown" style="z-index: 10; position: absolute; top:40px; right: 50px;">
    {{$flash}}
</div>
@endif
@stop





@section('script')
    <script type="text/javascript">
        $('#flash').delay(500).fadeIn(250).delay(5000).fadeOut(500)
    </script>
@stop