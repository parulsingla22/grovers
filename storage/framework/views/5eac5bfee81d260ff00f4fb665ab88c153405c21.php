<?php $__env->startSection('pagelevel'); ?>
	<!--page level css -->

    <!--end of page level css-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div>
		<div class="alert" id="msg">
			<p>
			</p>
		</div>
		
		<div class="panel panel-primary" id="hidepanel6">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="livicon" data-name="share" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
					Category edit
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="categoryeditform" id="categoryeditform" action="/category/update/<?php echo e($test->id); ?>" method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

						
					<input type="hidden" name="id" id="id" value="<?php echo e($test->id); ?>"/>
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo e($test->name); ?>">
					</div>
					<div class="form-group">
						<label>Image</label>
						<img src="<?php echo e(URL::asset('images/category/')); ?>/<?php echo e($test->img); ?>" alt="Image" width="100px" height="100px"/>
						<input type="file" name="newphoto" id="newphoto" class="form-control" placeholder="Upload image">
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="active" id="active">
							<option value="<?php echo e($test->active); ?>"><?php echo e($test->active); ?></option>
							<?php if($test->active==1): ?>
								<option value="0">0</option>
							<?php else: ?>
								<option value="1">1</option>
							<?php endif; ?>
						</select>
					</div>
					<button type="submit" id="butsave" class="btn btn-responsive btn-default">Submit Button</button>
					<button type="reset" class="btn btn-responsive btn-default" id="reset">Reset Button</button>
				</form>
			</div>
		</div>
		
	</div>
	<?php $__env->stopSection(); ?>             
                    
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>