@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{$thread->user->name}} posted <a href="{{$thread->path()}}">{{$thread->title}}</a></div>

                        <div class="panel-body">
                                {{$thread->body}}
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
@endsection
