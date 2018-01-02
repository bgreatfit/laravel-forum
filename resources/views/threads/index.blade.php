@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        <div class="panel-body">
                            <article>
                                @foreach($threads as $thread)
                                    <div class="level">
                                        <h4 class="flex">
                                            {{--{{$thread->user->name}} posted--}}
                                            <a href="{{$thread->path()}}">
                                                {{$thread->title}}
                                            </a>
                                        </h4>
                                        <strong>{{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count )}}</strong>
                                    </div>
                                <div class="body">{{$thread->body}}</div>
                            </article>
                            <hr>
                            @endforeach
                        </div>

                        </div>
                    </div>
            </div>
    </div>
@endsection
