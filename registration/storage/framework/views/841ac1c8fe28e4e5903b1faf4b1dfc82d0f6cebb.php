<?php $__env->startSection('content'); ?>

<div class="container">
	<div>
		<h1 class="well cen">Profile page</h1>
	</div>
	<div class="col-lg-12 well">
		<div class="row">
			<form action="" method="">
			 <?php echo csrf_field(); ?>  
				<div class="col-sm-12">
					<div class="row">
							<img width="130" height="140" 
							src="profilepic/<?php echo e($data->photo); ?>"/>
					</div><br/><br/>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label>Full Name: </label> 
							<?php echo e($data->first); ?> <?php echo e($data->middle); ?> <?php echo e($data->last); ?>

						</div>
						<div class="col-sm-3 form-group">
							<label>Date Of Birth: </label> 
							<?php echo e($data->dob); ?> 
						</div>
						<div class="col-sm-3 form-group">
							<label>Gender: </label> 
							<?php echo e($data->gender); ?> 
						</div>
						<div class="col-sm-3 form-group">
							<label>Email Id: </label> 
							<?php echo e($data->email); ?> 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 form-group">
							<label>Suffix: </label> 
							<?php echo e($data->suffix); ?> 
						</div>
						<div class="col-sm-3 form-group">
							<label>Employement: </label> 
							<?php echo e($data->employement); ?> 
						</div>
						<div class="col-sm-3 form-group">
							<label>Employer: </label> 
							<?php echo e($data->employer); ?> 
						</div>
						<div class="col-sm-3 form-group">
							<label>Marital status:: </label> 
							<?php echo e($data->status); ?> 
						</div>
					</div><br/><br/>
					<div class="row">
						<div class="col-sm-8 form-group">
							<label>Residential Address: </label> 
							<?php echo e($data->rstreet); ?>, <?php echo e($data->rcity); ?>, <?php echo e($data->rstate); ?>

						</div>
						<div class="col-sm-4 form-group">
							<label>Residential Phone no: </label> 
							<?php echo e($data->rphone); ?> 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8 form-group">
							<label>Office Address: </label> 
							<?php echo e($data->ostreet); ?>, <?php echo e($data->ocity); ?>, <?php echo e($data->ostate); ?>

						</div>
						<div class="col-sm-4 form-group">
							<label>Office Phone no: </label> 
							<?php echo e($data->ophone); ?> 
						</div>
					</div><br/><br/>
					<div class="row">
						<div class="form-group">
							<label>Username: </label> 
							<?php echo e($data->username); ?>

						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label>Twitter Username: </label> 
							<?php echo e($data->tweet); ?>

						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label>Extra Comment: </label> 
							<?php echo e($data->extra); ?>

						</div>
					</div>
						
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>