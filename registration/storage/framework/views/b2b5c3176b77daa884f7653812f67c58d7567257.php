<?php $__env->startSection('content'); ?>    

<div class="container">
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box well">
			<div class="row">
				<div class="form-top">
					<div class="form-top-left">
                    	<p><h3>Log in:</h3></p>
                	</div>
				<form action="/profile" method='post' name ='login'>
				<div class="form-group">
			        <label>Email id</label>
			        <input type="text" placeholder="Email id..." 
			        class="form-control" id="email" name="email" 
			        value="<?php echo e(old('email')); ?>"/>
			        <div>
						<?php if($errors->has('email')): ?>
							<span class="text-danger">
							<?php echo e($errors->first('email')); ?>

							</span>
						<?php endif; ?>
					</div>
			    </div>
			    <div class="form-group">
			        <label>Password</label>
			        <input type="password" placeholder="password..." 
			        class="form-control" id="password" name="password" 
			        value=""/>
			        <div>
						<?php if($errors->has('password')): ?>
							<span class="text-danger">
							<?php echo e($errors->first('password')); ?>

							</span>
						<?php endif; ?>
					</div>
			    </div>
			    <div class="row">
                    <div class="col-md-8">
			            <input type="submit" id = "signin" 
			            class="btn btn-info" value="signin"
			            name="signin" placeholder="sign in!">
                    </div>
                </div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>