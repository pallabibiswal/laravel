<?php $__env->startSection('content'); ?>

<div class="container">
    <div><h1 class="well cen">Update/Edit</h1></div>
        <div class="col-lg-12 well">
            <div class="row">
                <form action="/edit" enctype="multipart/form-data" 
                method='post' name = 'update'>
                <?php echo csrf_field(); ?>            
                            <div class = "row">
                                <div class="col-sm-3 form-group">
                                    <label>First Name</label>
                                    <input type="text" id="first_input" 
                                    placeholder="Enter first name" 
                                    class="form-control" name='first' 
                                    value="<?php echo e(displayValue( old('first'),$data->first)); ?>"/>
                                    <div>
                                        <?php if($errors->has('first')): ?>
                                            <span class="text-danger">
                                            <?php echo e($errors->first('first')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Last Name</label>
                                    <input type="text" id="last_input" 
                                    placeholder="Enter last name" 
                                    class="form-control" name="last" 
                                    value="<?php echo e(displayValue( old('last'), $data->last)); ?>">
                                    <div>
                                        <?php if($errors->has('last')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('last')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Middle Name</label>
                                    <input type="text" id = "middle_input" 
                                    placeholder="Enter middle name" 
                                    class="form-control" name="middle" 
                                    value="<?php echo e(displayValue( old('middle'), $data->middle)); ?>">
                                    <div>
                                        <?php if($errors->has('middle')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('middle')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Suffix</label>
                                    <input type="text" id ="suffix_input" 
                                    placeholder="Enter suffix" class="form-control" 
                                    name="suffix" 
                                    value="<?php echo e(displayValue( old('suffix'), $data->suffix)); ?>">
                                    <div>
                                        <?php if($errors->has('suffix')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('suffix')); ?>

                                            </span>
                                        <?php endif; ?>
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
                                     value="<?php echo e(displayValue( old('employer'), $data->employer)); ?>">
                                    <div>
                                        <?php if($errors->has('employer')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('employer')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" id= "dob_input" 
                                    placeholder="yy-mm-dd" 
                                    class="form-control" name="dob"
                                   value="<?php echo e(displayValue( old('dob'), $data->dob)); ?>">
                                    <div>
                                        <?php if($errors->has('dob')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('dob')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Email</label>
                                    <input type="text" id="email_input" 
                                    placeholder="Enter Email" class="form-control" 
                                    name="email" 
                                    value="<?php echo e(displayValue( old('email'), $data->email)); ?>">
                                    <div>
                                        <?php if($errors->has('email')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('email')); ?>

                                            </span>
                                        <?php endif; ?>
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
                                   value="<?php echo e(displayValue( old('rstreet'), $data->rstreet)); ?>">
                                    <div >
                                        <?php if($errors->has('rstreet')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('rstreet')); ?>

                                            </span>
                                        <?php endif; ?>
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
                                   value="<?php echo e(displayValue( old('rcity'), $data->rcity)); ?>">
                                    <div>
                                        <?php if($errors->has('rcity')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('rcity')); ?>

                                            </span>
                                        <?php endif; ?>
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
                                   value="<?php echo e(displayValue( old('rstate'), $data->rstate)); ?>">
									<div>
                                        <?php if($errors->has('rstate')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('rstate')); ?>

                                            </span>
                                        <?php endif; ?>
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
                                   value="<?php echo e(displayValue( old('rphone'), $data->rphone)); ?>">
                                    <div>
                                        <?php if($errors->has('rphone')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('rphone')); ?>

                                            </span>
                                        <?php endif; ?>
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
                               value="<?php echo e(displayValue( old('ostreet'), $data->ostreet)); ?>">
                                <div>
                                    <?php if($errors->has('ostreet')): ?>
                                        <span class="  text-danger">
                                        <?php echo e($errors->first('ostreet')); ?>

                                        </span>
                                    <?php endif; ?>
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
                                value="<?php echo e(displayValue( old('ocity'), $data->ocity)); ?>">
                                <div>
                                    <?php if($errors->has('ocity')): ?>
                                        <span class=" text-danger">
                                        <?php echo e($errors->first('ocity')); ?>

                                        </span>
                                    <?php endif; ?>
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
                                value="<?php echo e(displayValue( old('ostate'), $data->ostate)); ?>">
                                <div>
                                    <?php if($errors->has('ostate')): ?>
                                        <span class="  text-danger">
                                        <?php echo e($errors->first('ostate')); ?>

                                        </span>
                                    <?php endif; ?>
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
                                     value="<?php echo e(displayValue( old('ophone'), $data->ophone)); ?>">
                                    <div>
                                        <?php if($errors->has('ophone')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('ophone')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                                    </div>
                            </div>
                        </div><br/><br/><br/>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                               <img width="130" height="140" 
								src="profilepic/<?php echo e($data->photo); ?>"/> 
                            </div><br/>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                    <label>Select photo:</label>
                                    </div>
                                    <div class="col-md-9">   
                                    <input type="file" name="photo" id="photo"
                                     accept="image/x-png, image/gif, image/jpeg"
                                     value="<?php echo e(displayValue( old('photo'), $data->photo)); ?>"/>
                                    </div>
                                    <div>
                                        <?php if($errors->has('photo')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('photo')); ?>

                                            </span>
                                        <?php endif; ?>
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
                            value="<?php echo e(displayValue( old('username'), $data->username)); ?>"/>
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
                            value="<?php echo e(displayValue( old('tweet'), $data->tweet)); ?>"/>
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
                            value="<?php echo e(displayValue( old('extra'), $data->extra)); ?>"/>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>