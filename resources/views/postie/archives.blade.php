@extends('layouts.master')


@section('header')
    <h2>Archives</h2>
@stop


@section('main')
@if (count($posts)>0)
@foreach ($posts as $archive)

<div class="blog-post">
    <h2 class="blog-post-title"><a href="{{ route('postie.show',$archive['id']) }}">{{$archive['title']}}</a></h2>
    <div>{{str_limit($archive['body'],350)}}</div>
</div>

@endforeach
@else
<div class="text-center">
    <h3 class="noPosts"><i> Welcom To Postie,write a Blog Post!</i></h3>
</div>
@endif
<div class="row">
    <div class="col-sm-6 col-sm-offset-5">
        {{$posts->appends($_GET)->links()}}
    </div>
</div>
@stop

