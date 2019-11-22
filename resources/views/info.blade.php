@extends('layouts.app')

@section('content')
    {{--        @foreach($dataReturned as $data)--}}
    @foreach($dataReturned['Search'] as $d)
        <div class="row">

            <div class="col-4">
                <h1>{{$d['Title']}}</h1>


            </div>
            <div class="col-8">
                <h3> Year : {{$d['Year']}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="{{$d['Poster']}}">
            </div>


            <div class="col-4">
                <h3> Type : {{$d['Type']}}</h3>
            </div>
                <div class="col-4">
                    <form class="cke_button__form_icon" action="/savemovie" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" name="imdbid" value="{{$d['imdbID']}}">
                    </form>

                </div>


            </div>




    @endforeach

    {{--            @endforeach--}}



@endsection
