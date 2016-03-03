@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Assignment</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" 
                    action="{{ url('/assignment') }}">
                        {!! csrf_field() !!}
                        <h1> Assignment Page</h1>
                        @foreach ( $name as $button )
                            <button type="submit" class="btn btn-primary">
                        	{{ $button }}</button>
	                    @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
