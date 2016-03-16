@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Search Location</div>
                <div class="panel-body">					 
					
					<!-- enter any address -->
					<form action="/searched" method="post">
						{!! csrf_field() !!}
						<lable class="col-md-4">Choose Location</lable>
					    <select class="form-control col-md-6" name="address">
					    @foreach( $data as $key)
					    	<option 
					    	value="{{ $key->rstreet }}, {{ $key->rcity }}, {{ $key->rstate }}">
					    	{{ $key->rstreet }}, {{ $key->rcity }}, {{ $key->rstate }}</option>
					    	<option 
					    	value="{{ $key->ostreet }}, {{ $key->ocity }}, {{ $key->ostate }}">
					    	{{ $key->ostreet }}, {{ $key->ocity }}, {{ $key->ostate }}</option>
					    @endforeach
					    </select>
					    <div>
					    <input id="location" type='submit' value='Location!' class="btn btn-info" />
					    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection