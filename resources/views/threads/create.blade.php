@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Create a New Tgh</div>

                        <form action="{{url('/threads')}}" method="post">
                            {{csrf_field()}}
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" id="" aria-describedby="helpId"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Body</label>
                                <textarea class="form-control" name="body" id="" rows="8"></textarea>
                            </div>
                        </form>

                    </div>
            </div>
        </div>
@endsection
