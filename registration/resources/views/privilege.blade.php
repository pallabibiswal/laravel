@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Privilege</div>
            <div class="panel-body">
			<form class="form-horizontal" method="POST" action="/postprivilege">
            {!! csrf_field() !!}
                <div class="form-group col-md-3">
                    <label><h5>Select Role:</h5></label>
                </div>
                <div class="form-group col-md-8">
                <select id="selectrole" name="selectrole" 
                 class="form-control">
                <option>select role</option>
                    @foreach($role as $key)
                        <option value="{{ $key->role_id }}">
                        {{ $key->role }}</option>
                    @endforeach
                </select>
                </div>
            </form>	
			</div>
		</div>
    	</div><br/><br/>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div id="display"></div>
            </div>
        </div>
	</div>
</div>

@endsection