<?php $__env->startSection('content'); ?>

<div class="top-content">
 	<div class="inner-bg">
    	<div class="container">
    	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        	<div class="row">
                <div class="form-top">
                <!--for jqgrid-->
					<table id="list_records">
					<tr><td></td></tr></table>
					<div id="perpage"></div>
				<!--for tweets-->
					<div id="tweetdialog" title="tweets">
					<span id="tweet"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>