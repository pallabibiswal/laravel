@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ASSIGN ROLES TO USERS</div>
                <div class="panel-body">
					<form class="form-horizontal" method="POST" action="/assignrole">
                        {!! csrf_field() !!}
                    <div class="row">
                    <label class="col-md-4 control-label"><h5>Username</h5></label>
					<div class="col-md-6">
                        <select class="form-control" name="username">
                        	@foreach($user as $key)
                        		<option value="{{ $key->id }}">
                        		{{ $key->username }}</option>
                        	@endforeach
                        </select>
                    </div>
                    </div><br/>
                    <div class="row">
                    <label class="col-md-4 control-label"><h5>Roles</h5></label>
					<div class="col-md-6">
                        <select class="form-control" name="role">
                        	@foreach($role as $key)
                        		<option value="{{ $key->role_id }}">
                        		{{ $key->role }}</option>
                        	@endforeach
                        </select>
                    </div><br/><br/>
                    <div class="col-md-4">
						<input type="submit" id='data' 
						class="btn btn-lg btn-info submit_button" 
						name='rolebtn' value="Submit" >
					</div>
                    </div>
					</form>
				</div>
			</div>
		</div><br/><br/>
	</div>
</div>
@endsection