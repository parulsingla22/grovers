<?php $__env->startSection('pagelevel'); ?>
	<!--page level css -->
	<style>
		.menustyle
		{
			padding:10px 190px;
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
					Add Product
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="productform" id="productform" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>

					<div class="form-group">
						<label>Product name</label>
						<input class="form-control" name="name" id="name" placeholder="Enter Product name" value="">
					</div>
					<div class="form-group">
						<label>Product image</label>
						<input type="file" name="productimg" id="productimg" class="form-control" placeholder="Upload image">
						<img id="blah" src="#" alt="your image" width="200px" height="200px"/>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" name="price" id="price" placeholder="Enter Product Price" value="">
					</div>
					<div class="form-group">
						<label>Sale Price</label>
						<input class="form-control" name="saleprice" id="saleprice" placeholder="Enter Product Sale Price if any" value="">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="category" id="category">
							<option value="">Select</option>
							<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="pactive" id="pactive">
							<option value="">Select</option>
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
	<script>
		function readURL(input) {
		  if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function(e) {
			  $('#blah').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]);
		  }
		}

		$("#productimg").change(function() {
		  readURL(this);
		});						
		$('#butsave').on('click', function() {
			var name = document.forms["productform"]["name"].value;
			var price = document.forms["productform"]["price"].value;
			var saleprice = document.forms["productform"]["saleprice"].value;
			var photo = document.forms["productform"]["productimg"].value;
			var category = document.forms["productform"]["category"].value;
			var active = document.forms["productform"]["pactive"].value;
			$(".error").remove();
			if (name==null || name=="")
			{
				$('#name').after('<span class="error">This field is required</span>');
				return false;
			}else if (price==null || price=="")
			{
				$('#price').after('<span class="error">This field is required</span>');
				return false;
			}else if (photo==null || photo=="")
			{
				$('#productimg').after('<span class="error">This field is required</span>');
				return false;
			}else if (category==null || category=="")
			{
				$('#category').after('<span class="error">This field is required</span>');
				return false;
			}else if (active==null || active=="")
			{
				$('#pactive').after('<span class="error">This field is required</span>');
				return false;
			}
			else if (saleprice==null || saleprice=="")
			{
				$('#saleprice').val('no');
				return false;
			}
			var form = $('#productform')[0]; // You need to use standard javascript object here
			var formData = new FormData(form);
			$.ajax({
					url: "<?php echo e(route('products.store')); ?>",
					type: "Post",
					data: formData,
					contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
					processData: false,
					success: function(data)
					{
						$('form input:text').val('');
						$('#pactive').val('');
						$('#category').val('');
						$('#saleprice').val('no');
						$('form input:file').val('');
						$('#blah').val('');
						$('#msg').addClass("alert-success");
						$('#msg').html("success");
					},
					error: function(){
						$('form input:text').val('');
						$('form textarea').val('');
						$('#pactive').val('');
						$('#saleprice').val('no');
						$('form input:file').val('');
						$('#blah').val('');
						$('#msg').addClass("alert-danger");
						$('#msg').html("error");
					}
				});
		return false;
		});
	</script>
 <?php $__env->stopSection(); ?>             
                    
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/admin/products/create.blade.php ENDPATH**/ ?>