<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ASSIGN ROLES TO USERS</div>
                <div class="panel-body">
					<form class="form-horizontal" method="POST" action="/assignrole">
                        <?php echo csrf_field(); ?>

                    <div class="row">
                    <label class="col-md-4 control-label"><h5>Username</h5></label>
					<div class="col-md-6">
                        <select class="form-control" name="username">
                        	<?php foreach($user as $key): ?>
                        		<option value="<?php echo e($key->id); ?>">
                        		<?php echo e($key->username); ?></option>
                        	<?php endforeach; ?>
                        </select>
                    </div>
                    </div><br/>
                    <div class="row">
                    <label class="col-md-4 control-label"><h5>Roles</h5></label>
					<div class="col-md-6">
                        <select class="form-control" name="role">
                        	<?php foreach($role as $key): ?>
                        		<option value="<?php echo e($key->role_id); ?>">
                        		<?php echo e($key->role); ?></option>
                        	<?php endforeach; ?>
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
		 <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ASSIGN ROLES TO RESOURCES</div>
                <div class="panel-body">
					<form class="form-horizontal" method="POST" 
					action="/assignresource">
                        <?php echo csrf_field(); ?>

                    <div class="row">
                    <label class="col-md-4 control-label"><h5>Roles</h5></label>
					<div class="col-md-6">
                        <select class="form-control" name="role">
                        	<?php foreach($role as $key): ?>
                        		<option value="<?php echo e($key->role_id); ?>">
                        		<?php echo e($key->role); ?></option>
                        	<?php endforeach; ?>
                        </select>
                    </div>
                    </div><br/>
                    <div class="row">
                    <label class="col-md-4 control-label"><h5>Resources</h5></label>
					<div class="col-md-6">
                        <select class="form-control" name="resource">
                        	<?php foreach($resource as $key): ?>
                        		<option value="<?php echo e($key->resource_id); ?>">
                        		<?php echo e($key->resource); ?></option>
                        	<?php endforeach; ?>
                        </select>
                    </div><br/><br/>
                    <div class="col-md-4">
						<input type="submit" id='data' 
						class="btn btn-lg btn-info submit_button" 
						name='btn' value="Submit" >
					</div>
                    </div>
					</form>
				</div>
			</div>
		</div><br/><br/>
		 <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ASSIGN ROLES TO OPERATIONS</div>
                <div class="panel-body">
					<form class="form-horizontal" method="POST" 
					action="/assignoperation">
                        <?php echo csrf_field(); ?>

                    <div class="row">
                    <label class="col-md-4 control-label"><h5>Roles</h5></label>
					<div class="col-md-6">
                        <select class="form-control" name="role">
                        	<?php foreach($role as $key): ?>
                        		<option value="<?php echo e($key->role_id); ?>">
                        		<?php echo e($key->role); ?></option>
                        	<?php endforeach; ?>
                        </select>
                    </div>
                    </div><br/>
                    <div class="row">
                    <label class="col-md-4 control-label"><h5>Operations</h5></label>
					<div class="col-md-6">
                        <select class="form-control" name="operation">
                        	<?php foreach($operation as $key): ?>
                        		<option value="<?php echo e($key->operation_id); ?>">
                        		<?php echo e($key->operation); ?></option>
                        	<?php endforeach; ?>
                        </select>
                    </div><br/><br/>
                    <div class="col-md-4">
						<input type="submit" id='data' 
						class="btn btn-lg btn-info submit_button" 
						name='opbtn' value="Submit" >
					</div>
                    </div>
					</form>
				</div>
			</div>
		</div><br/><br/>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>