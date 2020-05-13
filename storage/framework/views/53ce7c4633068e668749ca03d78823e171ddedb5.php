<?php $__env->startSection('content'); ?>
    <div class="hero-wrap hero-bread" style="background-image: url('<?php echo e(URL::asset('assets/images/bg_1.jpg')); ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Wishlist</span></p>
            <h1 class="mb-0 bread">My Wishlist</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
								<th>Product Image</th>
								<th>Product Name</th>
								<th>Product Price</th>
						      </tr>
						    </thead>
						    <tbody>
								
								<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($wish->user_id==auth()->user()->id): ?>
								<tr class="text-center">
									<td class="product-remove"><a href="<?php echo e(route('wishlist.destroy', ['id' => $wish->product_id])); ?>"><span class="ion-ios-close"></span></a></td>
									
									<td class="image-prod"><img src="<?php echo e(URL::asset('images/products/')); ?>/<?php echo e($wish->productimg); ?>" alt="This is an image" width="50px" height="50px"/></td>
									
									<td class="product-name">
										<h3><?php echo e($wish->name); ?></h3>
									</td>
									<td class="productprice">
									<?php if($wish->saleprice=="no"): ?>
									<?php echo e($wish->price); ?>

									<?php else: ?>
									<?php echo e($wish->saleprice); ?>

									<?php endif; ?>
									</td>
								</tr><!-- END TR-->
								<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    </tbody>
						</table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/wishlist.blade.php ENDPATH**/ ?>