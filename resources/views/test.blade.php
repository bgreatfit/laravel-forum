@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a New Data`</div>


                    <div class="panel-body">
                        <form action="{{url('/runtest')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group ">
                                <select class="form-control" name="data">
                                    <option >Select Name</option>
                                    @foreach($payloads as $payload)
                                        <option value="{{strrev($payload['name']).','.strrev($payload['email']).','.$payload['gender']}}">{{strrev($payload['name'])}}</option>
                                    @endforeach
                                </select>
                            </div>
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
