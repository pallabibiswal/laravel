@extends('layouts.master')

@section('content')

<div class="container">
	<div>
		<h1 class="well cen">Profile page</h1>
	</div>
	<div class="col-lg-12 well">
		<div class="row">
			<form action="" method="">
			 {!! csrf_field() !!}  
				<div class="col-sm-12">
					<div class="row">
							<img width="130" height="140" 
							src="profilepic/{{ $data->photo }}"/>
					</div><br/><br/>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label>Full Name: </label> 
							{{ $data->first }} {{ $data->middle }} {{ $data->last }}
						</div>
						<div class="col-sm-3 form-group">
							<label>Date Of Birth: </label> 
							{{ $data->dob }} 
						</div>
						<div class="col-sm-3 form-group">
							<label>Gender: </label> 
							{{ $data->gender }} 
						</div>
						<div class="col-sm-3 form-group">
							<label>Email Id: </label> 
							{{ $data->email }} 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label>Suffix: </label> 
							{{ $data->suffix }} 
						</div>
						<div class="col-sm-3 form-group">
							<label>Employement: </label> 
							{{ $data->employement }} 
						</div>
						<div class="col-sm-3 form-group">
							<label>Employer: </label> 
							{{ $data->employer }} 
						</div>
						<div class="col-sm-3 form-group">
							<label>Marital status:: </label> 
							{{ $data->status }} 
						</div>
					</div><br/><br/>
					<div class="row">
						<div class="col-sm-8 form-group">
							<label>Residential Address: </label> 
							{{ $data->rstreet }}, {{ $data->rcity }}, {{ $data->rstate }}
						</div>
						<div class="col-sm-4 form-group">
							<label>Residential Phone no: </label> 
							{{ $data->rphone }} 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8 form-group">
							<label>Office Address: </label> 
							{{ $data->ostreet }}, {{ $data->ocity }}, {{ $data->ostate }}
						</div>
						<div class="col-sm-4 form-group">
							<label>Office Phone no: </label> 
							{{ $data->ophone }} 
						</div>
					</div><br/><br/>
					<div class="row">
						<div class="form-group">
							<label>Username: </label> 
							{{ $data->username }}
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label>Twitter Username: </label> 
							{{ $data->tweet }}
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label>Extra Comment: </label> 
							{{ $data->extra }}
						</div>
					</div>
						
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection