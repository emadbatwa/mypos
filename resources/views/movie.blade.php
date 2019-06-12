@extends('layouts.app')

@section('content')
    <form action="/find" method="get">
        First name: <input type="text" name="name"><br>
        <input type="submit" value="Submit">
    </form>
{{--    <h1>Search For Movie</h1>--}}
{{--    {!! Form::open(['action' => 'movieController@find', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}--}}
{{--    <div class="form-group">--}}
{{--        {{Form::label('title', 'Title')}}--}}
{{--        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {{Form::label('body', 'Body')}}--}}
{{--        {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {{Form::file('cover_image')}}--}}
{{--    </div>--}}
{{--    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}--}}
{{--    {!! Form::close() !!}--}}
@endsection
