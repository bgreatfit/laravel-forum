<div class="panel panel-default">
    <div class="panel-heading">{{$reply->user->name}} replied {{$reply->created_at->diffForHumans()}}</div>

    <div class="panel-body">

        <div class="alert alert-success">
            {{$reply->body}}
        </div>

    </div>
</div>