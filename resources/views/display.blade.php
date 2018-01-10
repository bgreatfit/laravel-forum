@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Display Data</div>


                    <div class="panel-body">
                        <form action="{{url('/runtest')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group ">
                                <p>Name: {{$data[0]}}</p>
                                <p>Email: {{$data[1]}}</p>
                                <p>Gender: {{$data[2]}}</p>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
