<div class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <h5 class="flex">
                <a href="#">{{$reply->user->name}}</a> said {{$reply->created_at->diffForHumans()}}

            </h5>
            <div>{{$reply->getFavouriteCount()}}
                <form method="post" action="{{url('/replies/'.$reply->id.'/favourite')}}">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-default" {{($reply->isfavourite())?'disabled':''}}>{{str_plural('Favourite'),$reply->favourites_count}}</button>

                </form>
            </div>
        </div>
    </div>

    <div class="panel-body">
            {{$reply->body}}
    </div>
</div>