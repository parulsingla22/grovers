<?php $__env->startSection('pagelevel'); ?>
	<!--page level css -->
	<style>
	.menustyle
	{
		padding:40px 190px;
	}
	</style>
    <!--end of page level css-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="menustyle">
		<div class="alert" id="msg">
			<p>
			</p>
		</div>
		
		<div class="panel panel-default" id="hidepanel6">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="livicon" data-name="share" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
					Menu Item Edit
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="menueditform" id="menueditform" action="/menu/update/<?php echo e($menu->id); ?>" method="post">
						<?php echo e(csrf_field()); ?>

						
					<input type="hidden" name="id" id="id" value="<?php echo e($menu->id); ?>"/>
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="title" id="title" required placeholder="Enter title" value="<?php echo e($menu->item); ?>">
					</div>
					<div class="form-group">
						<label>Reference</label>
						<input class="form-control" name="refer" id="refer" required placeholder="Enter reference page" value="<?php echo e($menu->ref); ?>">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="category" id="category" required>
							<option value="">Select</option>
							<option value="0">None</option>
							<option value="d">Dropdown</option>
							<?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($item->id); ?>"><?php echo e($item->item); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="active" id="active" required>
							<option value="<?php echo e($menu->active); ?>"><?php echo e($menu->active); ?></option>
							<option value="0">0</option>
							<option value="1">1</option>
						</select>
					</div>
					<button type="submit" id="butsave" class="btn btn-responsive btn-default">Submit Button</button>
					<button type="reset" class="btn btn-responsive btn-default" id="reset">Reset Button</button>
				</form>
			</div>
		</div>
		
	</div>
	<?php $__env->stopSection(); ?>             
                    
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/admin/menu/edit.blade.php ENDPATH**/ ?>