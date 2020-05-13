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
					Product edit
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="productform" id="productform" method="post" action="/products/update/<?php echo e($test->id); ?>" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

					<input type="hidden" name="id" id="id" value="<?php echo e($test->id); ?>"/>
					<div class="form-group">
						<label>Product name</label>
						<input class="form-control" name="name" id="name" placeholder="Enter Product name" value="<?php echo e($test->name); ?>">
					</div>
					<div class="form-group">
						<label>Product image</label>
						<input type="file" name="newproductimg" id="newproductimg" class="form-control" placeholder="Upload image">
						<img id="blah" src="<?php echo e(URL::asset('images/products/')); ?>/<?php echo e($test->productimg); ?>" alt="your image" width="200px" height="200px"/>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" name="price" id="price" placeholder="Enter Product Price" value="<?php echo e($test->price); ?>">
					</div>
					<div class="form-group">
						<label>Sale Price</label>
						<input class="form-control" name="saleprice" id="saleprice" placeholder="Enter Product Sale Price if any" value="<?php echo e($test->saleprice); ?>">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="category" id="category">
							
							<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($cat->id==$test->categoryid): ?>
									<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
								<?php else: ?>
									<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="pactive" id="pactive">
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
                    
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>