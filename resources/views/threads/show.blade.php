@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$thread->creatorName()}} posted <a href="{{$thread->path()}}">{{$thread->title}}</a></div>

                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                </div>
                @foreach($replies as $reply)
                    @include('threads.reply');
                @endforeach
                {{ $replies->links() }}
                @if(auth()->check())
                    <form action="{{$thread->path()}}/replies" class="action" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea  name="body" rows="5" class="form-control" placeholder="Have something to saY?"></textarea>
                        </div>
                        <button class="btn btn-default">Post</button>


                    </form>


                @else
                    <p class="text-center">Please <a href="{{route('login')}}">sign</a>  in to participate in this discussion</p>

                @endif
                </div>


                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>
                                This thread was published {{ $thread->created_at->diffForHumans() }} by
                                <a href="#">{{ $thread->user->name }}</a>, and currently
                                has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
