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
                    <div class="form-group">
                        <label for=""></label>
                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                    </div>
                @endforeach
            </div>
    </div>
@endsection
