@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                            <div class="alert alert-success">
                                {{$thread->body}}
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                   @include('threads.reply');
                @endforeach
             </div>
        </div>
        @if(auth()->check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{$thread->path()}}./replies" class="action">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea  name="body" rows="5" class="form-control" placeholder="Have something to saY?"></textarea>
                    </div>
                    <button class="btn btn-default">Post</button>


                </form>
                <p class="text-center">Please <a href="{{route('login')}}">sign</a>  in to participate in this discussion</p>

            </div>
        </div>
        @endif

    </div>
@endsection
