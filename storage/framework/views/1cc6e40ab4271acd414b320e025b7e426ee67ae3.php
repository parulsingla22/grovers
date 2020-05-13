<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!-- Main content -->
		<div class="cont">
		<?php echo $__env->yieldContent('content'); ?>
		</div>
	<!-- right-side -->
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/layouts/app.blade.php ENDPATH**/ ?>