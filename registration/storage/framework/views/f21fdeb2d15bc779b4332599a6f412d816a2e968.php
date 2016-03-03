<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Assignment</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" 
                    action="<?php echo e(url('/assignment')); ?>">
                        <?php echo csrf_field(); ?>

                        <h1> Assignment Page</h1>
                        <?php foreach( $name as $button ): ?>
                            <button type="submit" class="btn btn-primary">
                        	<?php echo e($button); ?></button>
	                    <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>