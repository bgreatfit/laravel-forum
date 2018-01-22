@extends('layouts.app')
@section('content')
<div class="container">
    <div class="panel-header">
        <h1>
            {{$profileUser->name}}  <small>posted {{$profileUser->created_at->diffForHumans()}}</small>
        </h1>

        <span>

        </span>

    </div>
    @foreach($profileUser->threads as $thread)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="level">
                    <span class="flex">
                      <a href="{{'/profile/'.$thread->creatorName()}}">
                        {{$thread->creatorName()}}
                    </a>
                    posted
                    <a href="{{$thread->path()}}">
                        {{$thread->title}}
                    </a>
                    </span>
                    <span>
                        {{$thread->created_at->diffForHumans()}}
                    </span>

                </div>

            </div>

            <div class="panel-body">
                {{$thread->body}}
            </div>
        </div>
    @endforeach
</div>



@endsection