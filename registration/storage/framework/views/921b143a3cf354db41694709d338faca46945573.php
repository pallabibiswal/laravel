<?php $__env->startSection('content'); ?>
<div class="container">
    <div><h1 class="well cen">Registration Form</h1></div>
        <div class="col-lg-12 well">
            <div class="row">
                <form action="/postData" enctype="multipart/form-data" 
                method='post' name = 'registration'>
                <?php echo csrf_field(); ?>            
                            <div class = "row">
                                <div class="col-sm-3 form-group">
                                    <label>First Name</label>
                                    <input type="text" id="first_input" 
                                    placeholder="Enter first name" 
                                    class="form-control" name='first' 
                                    value="<?php echo e(old('first')); ?>"/>
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
                                    value="<?php echo e(old('last')); ?>">
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
                                    value="<?php echo e(old('middle')); ?>">
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
                                    name="suffix" value="<?php echo e(old('suffix')); ?>">
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
                                    <select class="form-control" name="employement">
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
                                     name="employer" value="<?php echo e(old('employer')); ?>">
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
                                    value="<?php echo e(old('dob')); ?>">
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
                                    name="email" value="<?php echo e(old('email')); ?>">
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
                                    value="<?php echo e(old('rstreet')); ?>"/>
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
                                    value="<?php echo e(old('rcity')); ?>"/>
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
                                    value="<?php echo e(old('rstate')); ?>"/>
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
                                    value="<?php echo e(old('rphone')); ?>"/>
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
                                value="<?php echo e(old('ostreet')); ?>"/>
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
                                value="<?php echo e(old('ocity')); ?>"/>
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
                                value="<?php echo e(old('ostate')); ?>"/>
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
                                    value="<?php echo e(old('ophone')); ?>"/>
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
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                    <label>Password:</label>
                                    </div>
                                    <div class="col-md-9">
                                    <input id='password_input' type="password" 
                                    placeholder='type..' name="password" >
                                    <div>
                                        <?php if($errors->has('password')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('password')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                    <label>Re type Password:</label>
                                    </div>
                                    <div class="col-md-9">
                                    <input type="password" placeholder="retype.." 
                                    name="repassword" id="repassword_input"/>
                                    <div>
                                        <?php if($errors->has('repassword')): ?>
                                            <span class="  text-danger">
                                            <?php echo e($errors->first('repassword')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                                </div>
                            </div><br/>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                    <label>Select photo:</label>
                                    </div>
                                    <div class="col-md-9">   
                                    <input type="file" name="photo" id="photo"
                                     accept="image/x-png, image/gif, image/jpeg"
                                     value="<?php echo e(old('photo')); ?>"/>
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
                            value="<?php echo e(old('username')); ?>">
                            </div>
                        </div><br/></br>
                        <div class="col-md-12">
                            <div class="col-md-2">
                            <label>Twitter Username</label>
                            </div>
                            <div class="col-md-4">  
                            <input type="text" id = "tweet" 
                            placeholder="Twitter username" 
                            class="form-control" name="tweet" 
                            value="<?php echo e(old('tweet')); ?>">
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
                            value="<?php echo e(old('extra')); ?>">
                            </textarea>
                            </div>
                        </div>
                        </div><br/><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Register
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