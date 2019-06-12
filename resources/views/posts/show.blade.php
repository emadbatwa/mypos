@extends('layouts.app')

@section('content')

<a href="/posts" class="btn btn-outline-dark">Go Back</a>

<h1>{{$posts->title}}</h1>
<img style="width: 30%;"  src="/storage/cover_images/{{$posts->cover_image}}">

    <div>
        {!!$posts->body!!}
    </div>
    <hr/>
    <small>Written on {{$posts->created_at}} by {{$posts->user->name}}</small>
    <hr/>
@if(!Auth::guest())
    @if(auth()->user()->id == $posts->user_id)
    <a href="/posts/{{$posts->id}}/edit" class="btn btn-outline-secondary">Edit</a>
    {!! Form::open(['action' => ['PostController@destroy',$posts->id],'method' => 'POST' , 'class'=> 'float-right']) !!}
        {!! Form::hidden('_method','DELETE') !!}
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endif
    @endif
@endsection
