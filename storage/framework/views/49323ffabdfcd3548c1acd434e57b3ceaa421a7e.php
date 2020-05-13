<?php $__env->startSection('content'); ?>

    <div class="hero-wrap hero-bread" style="background-image: url(<?php echo e(URL::asset('assets/images/bg_1.jpg')); ?>)">
	
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					
    					<button class="filter-button" data-filter="*">All</button>
							<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    					<button class="filter-button" data-filter="<?php echo e($cat->name); ?>" ><?php echo e($cat->name); ?></button>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			<div class="col-md-6 col-lg-3 ftco-animate filter <?php echo e($product->category); ?>">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="<?php echo e(URL::asset('images/products/')); ?>/<?php echo e($product->productimg); ?>" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?php echo e($product->name); ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
									<?php if($product->saleprice=="no"): ?>
									<p class="price"><span class="price-sale">$<?php echo e($product->price); ?></span></p>
									<?php else: ?>
		    						<p class="price"><span class="mr-2 price-dc">$<?php echo e($product->price); ?></span><span class="price-sale">$<?php echo e($product->saleprice); ?></span></p>
									<?php endif; ?>
								</div>
	    					</div>
							<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
									<form method="POST" id="form1<?php echo e($product->id); ?>" action="<?php echo e(route('cart.add')); ?>" >
										<?php echo csrf_field(); ?>
										<input name="id" type="hidden" value="<?php echo e($product->id); ?>">
										<a href="#" onclick="document.getElementById('form1<?php echo e($product->id); ?>').submit();" class="buy-now d-flex justify-content-center align-items-center mx-1"><span><i class="ion-ios-cart"></i></span></a>
									</form>
									<form method="POST" id="form2<?php echo e($product->id); ?>" action="<?php echo e(route('wishlist.store')); ?>" >
										<?php echo csrf_field(); ?>
										<input name="pid" type="hidden" value="<?php echo e($product->id); ?>">
										<a href="#" onclick="document.getElementById('form2<?php echo e($product->id); ?>').submit();" class="heart d-flex justify-content-center align-items-center ">
										<span><i class="ion-ios-heart"></i></span></a>
									</form>
    							</div>
								
    						</div>
   
    					</div>
    				</div>
    			</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
	<script>
	$(document).ready(function(){
	
    $(".filter-button").click(function(){
		
		$(".filter-button").css('background-color', 'white');
		$(this).css('background-color', '#82ae46');
		
        var value = $(this).attr('data-filter');
		
        
        if(value == "*")
        {
            $('.filter').addClass('fadeInUp');
            //$('.filter').show('1000');
        }
        else
        {   
			//$('.filter[filter-item="'+value+'"]').addClass('fadeInUp');
				//$(".filter").not('.filter[filter-item="'+value+'"]').removeClass('fadeInUp');
            $(".filter").not('.'+value).removeClass('fadeInUp');
            $('.filter').filter('.'+value).addClass('fadeInUp');
            
        }
    });

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/shop.blade.php ENDPATH**/ ?>