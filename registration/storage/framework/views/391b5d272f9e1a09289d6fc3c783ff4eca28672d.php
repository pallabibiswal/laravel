<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Privilege</div>
            <div class="panel-body">
			<form class="form-horizontal" method="POST" action="/postprivilege">
            <?php echo csrf_field(); ?>

                <div class="form-group col-md-3">
                    <label><h5>Select Role:</h5></label>
                </div>
                <div class="form-group col-md-8">
                <select id="selectrole" name="selectrole" 
                 class="form-control">
                <option>select role</option>
                    <?php foreach($role as $key): ?>
                        <option value="<?php echo e($key->role_id); ?>">
                        <?php echo e($key->role); ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </form>	
			</div>
		</div>
    	</div><br/><br/>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div id="display"></div>
            </div>
        </div>
	</div>
</div>
<!--<script>
    $(document).ready(function () { 
    $("#selectrole").on("change",function() {
        var role_id = $("#selectrole").val();
        var request = 'postprivilege';
        $.ajax({
          method: 'GET',
          url: request,
          dataType: 'html',
          data: {
            role: role_id
          },
          success: function( htmldata ) {
              $("#display").html(htmldata);
          }
        }); 
    });
    });
    function editPrivilege(result,role_id,resource_id,operation_id)
    { 
        $(document).ready(function () {  
        $.ajax({
            method: 'POST',
            url: 'editprivilege',
            dataType: 'json',
            data: {
              result:result,
              role_id: role_id,
              resource_id: resource_id,
              operation_id: operation_id
            },
            success: function(response){

            }
        }); 
        }); 
    }
</script>-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>