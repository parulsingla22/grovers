<?php $__env->startSection('content'); ?>
    <div class="hero-wrap hero-bread" style="background-image: url('<?php echo e(URL::asset('assets/images/bg_1.jpg')); ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
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
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
							<input type="hidden" value="<?php echo e($subtotal=0); ?>"/>
							<?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="text-center">
								
						        <td class="product-remove">
									<form method="POST" id="form1<?php echo e($product->id); ?>" action="<?php echo e(route('cart.remove')); ?>" >
										<?php echo csrf_field(); ?>
										<input name="id" type="hidden" value="<?php echo e($product->id); ?>">
										<a href="#" onclick="document.getElementById('form1<?php echo e($product->id); ?>').submit();" class="buy-now d-flex justify-content-center align-items-center mx-1"><span class="ion-ios-close"></span></a>
									</form>
								</td>
						        <td class="image-prod"><img src="<?php echo e(URL::asset('images/products/')); ?>/<?php echo e($product->productimg); ?>" alt="This is an image" width="50px" height="50px"/></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo e($product->name); ?></h3>
						        </td>
						        <?php if($product->saleprice=="no"): ?>
									<td class="price">Rs.<?php echo e($product->price); ?></td>
									<td class="quantity">
										<div class="input-group mb-3">
											<button type="button" name="quantity-left-minus" data-quantity="<?php echo e($product->id); ?>" class="quantity-left-minus">-</button>
												<input type="text" name="quantity" readonly id="quantity<?php echo e($product->id); ?>"  class="quantity form-control input-number" value="<?php echo e($product->quantity); ?>" min="1" max="100">
											
												<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
											<button type="button" name="quantity-right-plus" data-quantity="<?php echo e($product->id); ?>" class="quantity-right-plus">+</button>
									</div>
								  </td>
								  <td class="total"><?php echo e('Rs' . $product->price * $product->quantity); ?></td>
									  <input type="hidden" value="<?php echo e($subtotal=$subtotal+$product->price * $product->quantity); ?>"/>
								<?php else: ?>
									<td class="price">Rs.<?php echo e($product->saleprice); ?></td>
									<td class="quantity">
										<div class="input-group mb-3">
											<button type="button" name="quantity-left-minus" data-quantity="<?php echo e($product->id); ?>" class="quantity-left-minus">-</button>
												<input type="text" name="quantity" readonly id="quantity<?php echo e($product->id); ?>"  class="quantity form-control input-number" value="<?php echo e($product->quantity); ?>" min="1" max="100">
											
												<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
											<button type="button" name="quantity-right-plus" data-quantity="<?php echo e($product->id); ?>" class="quantity-right-plus">+</button>
									</div>
								  </td>
								  <td class="total"><?php echo e('Rs' . $product->saleprice * $product->quantity); ?></td>
									  <input type="hidden" value="<?php echo e($subtotal=$subtotal+$product->saleprice * $product->quantity); ?>"/>
								 <?php endif; ?>
						      </tr><!-- END TR-->
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						       </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
						<form action="#" class="info">
						  <div class="form-group">
							<label for="">Coupon code</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						  </div>
					
    				<p><a href="" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
					
    				</div>
				</form>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Estimate shipping and tax</h3>
    					<p>Enter your destination to get a shipping estimate</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Country</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">State/Province</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Zip/Postal Code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rs.<?php echo e($subtotal); ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>Rs.<?php echo e($delivery=10); ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>Rs.<?php echo e($discount=5); ?></span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rs.<?php echo e($total=($subtotal+$delivery)-$discount); ?></span>
    					</p>
    				</div>
					<div class="row">
						<div class="col-md-12">	
							<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
						</div>
						<div class="col-md-12">
							<p>
								<form action="<?php echo e(route('cart.clear')); ?>" method="POST">
									<?php echo csrf_field(); ?>
									<a href="#" class="btn btn-danger py-3 px-4">Clear Cart</a>
								</form>
							</p>
						</div>
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
					var id = $(this).data("quantity");
					var quant = "#quantity"+id;
		        var quantity = parseInt($(quant).val());
		       
		        // If is not undefined
		            
		            $(quant).val(quantity + 1);
					
		          var quantitynew = parseInt($(quant).val());
		       
				var token = $("meta[name='csrf-token']").attr("content");
		            // Increment
					$.ajax(
					{
						url: "<?php echo e(route('cart.update')); ?>",
						type:"Post",
						data: {
							"id": id,
							"quantity":quantitynew,
							"_token": token,
						},
						success: function ($data){
							 window.location.reload();
						}
					});
					return false;
				});
					
		        
		    

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
				
					var id = $(this).data("quantity");
					var quant = "#quantity"+id;
		        var quantity = parseInt($(quant).val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $(quant).val(quantity - 1);
		            }
					
					var quantitynew = parseInt($(quant).val());
		       
					var token = $("meta[name='csrf-token']").attr("content");
					
					$.ajax(
					{
						url: "<?php echo e(route('cart.update')); ?>",
						type:"Post",
						data: {
							"id": id,
							"quantity":quantitynew,
							"_token": token,
						},
						success: function ($data){
							 window.location.reload();
						}
					});
					return false;
		    });
		    
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/cart.blade.php ENDPATH**/ ?>