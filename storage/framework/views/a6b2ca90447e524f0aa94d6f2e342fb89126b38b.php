<?php $__env->startSection('content'); ?>
    <div class="hero-wrap hero-bread" style="background-image: url(<?php echo e(URL::asset('assets/images/bg_1.jpg')); ?>)">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span></p>
            <h1 class="mb-0 bread">Contact us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Website</span> <a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" enctype="multipart/form-data" class="bg-white p-5 contact-form" method="post" id="contactform" name="contactform">
              <div class="form-group">
			  <?php echo e(csrf_field()); ?>

                <input type="text" class="form-control" placeholder="Your Name" id="cname" name="cname">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" id="cemailid" name="cemailid">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" id="csubject" name="csubject">
              </div>
              <div class="form-group">
                <textarea name="cmessage" id="cmessage" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" name="butsave" id="butsave" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>
	
	<script>					
		$('#butsave').on('click', function() {
			var name = document.forms["contactform"]["cname"].value;
			var emailid = document.forms["contactform"]["cemailid"].value;
			var subject = document.forms["contactform"]["csubject"].value;
			var message = document.forms["contactform"]["cmessage"].value;
			$(".error").remove();
			if (name==null || name=="")
			{
				$('#cname').after('<span class="error">This field is required</span>');
				return false;
			}else if (emailid==null || emailid=="")
			{
				$('#cemailid').after('<span class="error">This field is required</span>');
				return false;
			}else if (subject==null || subject=="")
			{
				$('#csubject').after('<span class="error">This field is required</span>');
				return false;
			}else if (message==null || message=="")
			{
				$('#cmessage').after('<span class="error">This field is required</span>');
				return false;
			}
			var form = $('#contactform')[0]; // You need to use standard javascript object here
			var formData = new FormData(form);
			$.ajax({
					url: "<?php echo e(route('contact.store')); ?>",
					type: "Post",
					data: formData,
					contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
					processData: false,
					success: function(data)
					{
						$('form input:text').val('');
						$('form textarea').val('');
						$('#msg').addClass("alert-success");
						$('#msg').html("success");
					},
					error: function(){
						$('form input:text').val('');
						$('form textarea').val('');
						$('#msg').addClass("alert-danger");
						$('#msg').html("error");
					}
				});
		return false;
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/contact.blade.php ENDPATH**/ ?>