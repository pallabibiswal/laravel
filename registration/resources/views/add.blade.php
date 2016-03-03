@extends('layouts.master')

@section('content')

<!--add new roles-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADD ROLES</div>
                <div class="panel-body">
					<form class="form-horizontal" method="POST"
					 action="/postrole">
                        {!! csrf_field() !!}
                    <label class="col-md-4 control-label">
                    <h5>Roles</h5></label>
					<div class="col-md-6">
                        <input type="text" class="form-control" 
                        name="role" value="{{ old('role') }}">
					<div>
						@if ($errors->has('role'))
							<span class="text-danger">
							{{ $errors->first('role') }}
							</span>
						@endif
					</div><br/><br/>
					<div class="col-md-12">
						<input type="submit" id='data' 
						class="btn btn-lg btn-info submit_button" 
						name='rolebtn' value="Submit" >
					</div>
					</div>
					</form>
				</div>
			</div>
		</div><br/><br/>
		
		<!--add new resources-->
		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADD RESOURCES</div>
                <div class="panel-body">
					<form class="form-horizontal" method="POST" 
					action="/postresource">
                        {!! csrf_field() !!}
                    <label class="col-md-4 control-label">
                    <h5>Resource</h5></label>
					<div class="col-md-6">
                        <input type="text" class="form-control" 
                        name="resource" value="{{ old('resource') }}">
					<div>
						@if ($errors->has('resource'))
							<span class="text-danger">
							{{ $errors->first('resource') }}
							</span>
						@endif
					</div><br/><br/>
					<div class="col-md-12">
						<input type="submit" id='data' 
						class="btn btn-lg btn-info submit_button" 
						name='resourcebtn' value="Submit" >
					</div>
					</div>
					</form>
				</div>
			</div>
		</div><br/><br/>
		
		<!--add new operations-->
		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADD OPERATIONS</div>
                <div class="panel-body">
					<form class="form-horizontal" method="POST" 
					action="/postoperation">
                        {!! csrf_field() !!}
                    <label class="col-md-4 control-label">
                    <h5>Operation</h5></label>
					<div class="col-md-6">
                        <input type="text" class="form-control" 
                        name="operation" value="{{ old('operation') }}">
						<div>
						@if ($errors->has('operation'))
							<span class="text-danger">
							{{ $errors->first('operation') }}
							</span>
						@endif
						</div><br/><br/>
						<div class="col-md-12">
							<input type="submit" id='data' 
							class="btn btn-lg btn-info submit_button" 
							name='operationbtn' value="Submit" >
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection