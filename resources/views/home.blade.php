@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="cke_panel_block">
                        <div class="cke_panel_container">
                                <a href="/posts/create" class="btn btn-primary">Create Post</a>
                                <h4>Your Blog Posts</h4>
                            @if(count($posts) > 0)
                            <table class="table table-striped">

                                    <tr>
                                        <th>Tittle</th>
                                        <th></th>
                                        <th></th>
                                    </tr>

                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST' , 'class'=> 'float-right']) !!}
                                            {!! Form::hidden('_method','DELETE') !!}
                                            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                                @else
                            <p>No Post For You</p>
                                @endif





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
