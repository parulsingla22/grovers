
		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form name="subscribeform" id="subscribeform" class="subscribe-form">
			<?php echo e(csrf_field()); ?>

              <div class="form-group d-flex">
                <input type="text" class="form-control" name="subscribe" id="subscribe" placeholder="Enter email address">
                <input type="submit" value="Subscribe"  name="btnsave" id="btnsave" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo e(URL::asset('assets/js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/popper.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/jquery.easing.1.3.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/jquery.waypoints.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/jquery.stellar.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/owl.carousel.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/aos.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/jquery.animateNumber.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/scrollax.min.js')); ?>"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo e(URL::asset('assets/js/google-map.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('assets/js/main.js')); ?>"></script>
  <script>							
	$('#btnsave').on('click', function() {
		var subscribe = document.forms["subscribeform"]["subscribe"].value;
		$(".error").remove();
		if (subscribe==null || subscribe=="")
		{
			$('#subscribe').after('<span class="error">This field is required</span>');
			return false;
		}				
		var form = $('#subscribeform')[0]; // You need to use standard javascript object here
		var formData = new FormData(form);
		$.ajax({
				url: "<?php echo e(route('subscribers.store')); ?>",
				type: "Post",
				data: formData,
				contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false,
				success: function(data)
				{
					$('form input:text').val('');
				},
				error: function(){
					$('form input:text').val('');
				}
			});
	return false;
	});
</script>
  
  </body>
</html><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/footer.blade.php ENDPATH**/ ?>