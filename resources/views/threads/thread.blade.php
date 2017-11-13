@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="{{$thread->path()}}">{{$thread->title}}</a></div>

                        <div class="panel-body">
                            <p>{{$thread->creatorName()}}</p>
                            <div class="alert alert-success">
                                {{$thread->body}}
                            </div>

                        </div>
                    </div>
                @endforeach
            </div
    </div>
@endsection
