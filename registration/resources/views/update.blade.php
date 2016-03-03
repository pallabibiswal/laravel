@extends('layouts.master')

@section('content')

<div class="container">
    <div><h1 class="well cen">Update/Edit</h1></div>
        <div class="col-lg-12 well">
            <div class="row">
                <form action="/edit" enctype="multipart/form-data" 
                method='post' name = 'update'>
                {!! csrf_field() !!}            
                            <div class = "row">
                                <div class="col-sm-3 form-group">
                                    <label>First Name</label>
                                    <input type="text" id="first_input" 
                                    placeholder="Enter first name" 
                                    class="form-control" name='first' 
                                    value="{{ displayValue( old('first'),$data->first) }}"/>
                                    <div>
                                        @if ($errors->has('first'))
                                            <span class="text-danger">
                                            {{ $errors->first('first') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Last Name</label>
                                    <input type="text" id="last_input" 
                                    placeholder="Enter last name" 
                                    class="form-control" name="last" 
                                    value="{{ displayValue( old('last'), $data->last) }}">
                                    <div>
                                        @if ($errors->has('last'))
                                            <span class="  text-danger">
                                            {{ $errors->first('last') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Middle Name</label>
                                    <input type="text" id = "middle_input" 
                                    placeholder="Enter middle name" 
                                    class="form-control" name="middle" 
                                    value="{{ displayValue( old('middle'), $data->middle) }}">
                                    <div>
                                        @if ($errors->has('middle'))
                                            <span class="  text-danger">
                                            {{ $errors->first('middle') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Suffix</label>
                                    <input type="text" id ="suffix_input" 
                                    placeholder="Enter suffix" class="form-control" 
                                    name="suffix" 
                                    value="{{ displayValue( old('suffix'), $data->suffix) }}">
                                    <div>
                                        @if ($errors->has('suffix'))
                                            <span class="  text-danger">
                                            {{ $errors->first('suffix') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class = "row">
                                <div class="col-sm-3 form-group">
                                    <label>Employement:</label>
                                    <select class="form-control" name="employement" >
                                    <option name="student" value="student">
                                    Student</option>
                                    <option name="employed" value="employed">
                                    Employee</option>
                                    <option name="unemployed" value="unemployed">
                                    Unemployed</option>
                                    <option name="other" value="other">
                                    Other</option>
                                    </select>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Employer</label>
                                    <input type="text" id="employer_input" 
                                     placeholder="Employer" class="form-control" 
                                     name="employer" 
                                     value="{{ displayValue( old('employer'), $data->employer) }}">
                                    <div>
                                        @if ($errors->has('employer'))
                                            <span class="  text-danger">
                                            {{ $errors->first('employer') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" id= "dob_input" 
                                    placeholder="yy-mm-dd" 
                                    class="form-control" name="dob"
                                   value="{{ displayValue( old('dob'), $data->dob) }}">
                                    <div>
                                        @if ($errors->has('dob'))
                                            <span class="  text-danger">
                                            {{ $errors->first('dob') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Email</label>
                                    <input type="text" id="email_input" 
                                    placeholder="Enter Email" class="form-control" 
                                    name="email" 
                                    value="{{ displayValue( old('email'), $data->email) }}">
                                    <div>
                                        @if ($errors->has('email'))
                                            <span class="  text-danger">
                                            {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class = "row">             
                                <div class="col-sm-6 form-group">
                                    <label>Gender:</label>
                                    <div class="radio-inline">
                                    <label><input type="radio" name="gender" 
                                    value="male" checked/>Male</label>
                                    </div>
                                    <div class="radio-inline">
                                    <label><input type="radio" name="gender" 
                                    value="female"/>Female</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Marital status:</label>
                                    <div class="radio-inline">
                                    <label><input type="radio" name="status" 
                                    value="married" checked/>Married</label>
                                    </div>
                                    <div class="radio-inline">
                                    <label><input type="radio" name="status" 
                                    value="unmarried" />Unmarried</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label><h4>Residential Address</h4></label> 
                                    <div class="row">
                                    <div class="col-sm-3 form-group">
                                    <label>Street:</label>
                                    </div>
                                    <div class="col-sm-9">
                                    <input type="text" id="rstreet_input" 
                                    placeholder="street" name="rstreet" 
                                   value="{{ displayValue( old('rstreet'), $data->rstreet) }}">
                                    <div >
                                        @if ($errors->has('rstreet'))
                                            <span class="  text-danger">
                                            {{ $errors->first('rstreet') }}
                                            </span>
                                        @endif
                                    </div>
                                    </div> 
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-3 form-group">
                                    <label>City:</label>
                                    </div>
                                    <div class="col-sm-9">
                                    <input type="text" id="rcity_input" 
                                    placeholder="city" name="rcity" 
                                   value="{{ displayValue( old('rcity'), $data->rcity) }}">
                                    <div>
                                        @if ($errors->has('rcity'))
                                            <span class="  text-danger">
                                            {{ $errors->first('rcity') }}
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-3 form-group">
                                    <label>State:</label>
                                    </div>
                                    <div class="col-sm-9">
                                    <input type="text" id="rstate_input" 
                                    placeholder="state" name="rstate" 
                                   value="{{ displayValue( old('rstate'), $data->rstate) }}">
									<div>
                                        @if ($errors->has('rstate'))
                                            <span class="  text-danger">
                                            {{ $errors->first('rstate') }}
                                            </span>
                                        @endif
                                    </div>
                                    </div> 
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-3 form-group">
                                    <label>Phone:</label>
                                    </div>
                                    <div class="col-sm-9">
                                    <input type="text" id="rphone_input" 
                                    placeholder="phone" name="rphone" 
                                   value="{{ displayValue( old('rphone'), $data->rphone) }}">
                                    <div>
                                        @if ($errors->has('rphone'))
                                            <span class="  text-danger">
                                            {{ $errors->first('rphone') }}
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    </div>
                            </div>


                            <div class="col-sm-6">  
                                <label><h4>Office Address</h4></label>  
                                <div class="row">
                                <div class="col-sm-3 form-group">
                                <label>Street:</label>
                                </div>
                                <div class="col-sm-9">
                                <input type="text" id="ostreet_input" 
                                placeholder="street" name="ostreet" 
                               value="{{ displayValue( old('ostreet'), $data->ostreet) }}">
                                <div>
                                    @if ($errors->has('ostreet'))
                                        <span class="  text-danger">
                                        {{ $errors->first('ostreet') }}
                                        </span>
                                    @endif
                                </div>
                                </div> 
                                </div>
                                <div class="row">
                                <div class="col-sm-3 form-group">
                                <label>City:</label>
                                </div>
                                <div class="col-sm-9">
                                <input type="text" id="ocity_input" 
                                placeholder="city" name="ocity" 
                                value="{{ displayValue( old('ocity'), $data->ocity) }}">
                                <div>
                                    @if ($errors->has('ocity'))
                                        <span class=" text-danger">
                                        {{ $errors->first('ocity') }}
                                        </span>
                                    @endif
                                </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-3 form-group">
                                <label>State:</label>
                                </div>
                                <div class="col-sm-9">
                                <input type="text" id="ostate_input" 
                                placeholder="state" name="ostate" 
                                value="{{ displayValue( old('ostate'), $data->ostate) }}">
                                <div>
                                    @if ($errors->has('ostate'))
                                        <span class="  text-danger">
                                        {{ $errors->first('ostate') }}
                                        </span>
                                    @endif
                                </div>
                                </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                    <label>Phone:</label>
                                    </div>
                                    <div class="col-sm-9">
                                    <input type="text" id="ophone_input" 
                                    placeholder="phone" name="ophone" 
                                     value="{{ displayValue( old('ophone'), $data->ophone) }}">
                                    <div>
                                        @if ($errors->has('ophone'))
                                            <span class="  text-danger">
                                            {{ $errors->first('ophone') }}
                                            </span>
                                        @endif
                                    </div>
                                    </div>
                                    </div>
                            </div>
                        </div><br/><br/><br/>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                               <img width="130" height="140" 
								src="profilepic/{{ $data->photo }}"/> 
                            </div><br/>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                    <label>Select photo:</label>
                                    </div>
                                    <div class="col-md-9">   
                                    <input type="file" name="photo" id="photo"
                                     accept="image/x-png, image/gif, image/jpeg"
                                     value="{{ displayValue( old('photo'), $data->photo) }}"/>
                                    </div>
                                    <div>
                                        @if ($errors->has('photo'))
                                            <span class="  text-danger">
                                            {{ $errors->first('photo') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div><br/><br/>
                        <div class="col-md-12">
                            <div class="col-md-2">
                            <label>Username</label>
                            </div>
                            <div class="col-md-4">  
                            <input type="text" id = "username" 
                            placeholder="username" 
                            class="form-control" name="username" 
                            value="{{ displayValue( old('username'), $data->username) }}"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-2">
                            <label>Twitter Username</label>
                            </div>
                            <div class="col-md-4">  
                            <input type="text" id = "tweet" 
                            placeholder="Twitter username" 
                            class="form-control" name="tweet" 
                            value="{{ displayValue( old('tweet'), $data->tweet) }}"/>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="col-md-12">
                            <div class="col-md-2">
                            <label>Extra Note:</label>
                            </div>
                            <div class="col-md-9">  
                            <textarea class="form-control" 
                            rows="5" id="extra" name="extra" 
                            value="{{ displayValue( old('extra'), $data->extra) }}"/>
                            </textarea>
                            </div>
                        </div>
                        </div><br/><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
