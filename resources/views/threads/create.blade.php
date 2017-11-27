@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Create a New Thread`</div>


                            <div class="panel-body">
                                <form action="{{url('/threads')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" id="" aria-describedby="helpId"
                                           placeholder="">
                                </div>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                <div class="form-group">
                                        <label for="">Body</label>
                                        <textarea class="form-control" name="body" id="" rows="8"></textarea>
                                </div>
                                    @if ($errors->has('body'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif

                                    <input type="text" class="form-control" name="channel_id" value="30" id="" aria-describedby="helpId"
                                           placeholder="">
                                    <button type="submit" class="btn btn-primary">
                                        Publish
                                    </button>
                                </form>

                            </div>

                    </div>
            </div>
        </div>
        </div>
@endsection
