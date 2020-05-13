
<?php echo $__env->make('admin/header1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('admin/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('pagelevel'); ?>
  <!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		
		<!-- Main content -->
		
		<?php echo $__env->yieldContent('content'); ?>
		
	</aside>
	</div>
	<!-- right-side -->
<?php echo $__env->make('admin/footer1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>