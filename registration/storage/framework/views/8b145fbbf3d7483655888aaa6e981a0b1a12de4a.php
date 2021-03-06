<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADD ROLES</div>
                <div class="panel-body">
					<form class="form-horizontal" method="POST" action="/postrole">
                        <?php echo csrf_field(); ?>

                    <label class="col-md-4 control-label"><h5>Roles</h5></label>
					<div class="col-md-6">
                        <input type="text" class="form-control" 
                        name="role" value="<?php echo e(old('role')); ?>">
					<div>
						<?php if($errors->has('role')): ?>
							<span class="text-danger">
							<?php echo e($errors->first('role')); ?>

							</span>
						<?php endif; ?>
					</div><br/><br/>
					<div class="col-md-12">
						<input type="submit" id='data' 
						class="btn btn-lg btn-info submit_button" 
						name='data' value="Submit" >
					</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>