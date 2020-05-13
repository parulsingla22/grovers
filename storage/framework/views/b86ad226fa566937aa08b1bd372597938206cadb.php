<?php $__env->startSection('pagelevel'); ?>
    <!--page level css -->
	
    <link href="<?php echo e(URL::asset('adminassets/vendors/summernote/summernote.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('adminassets/vendors/jasny-bootstrap/css/jasny-bootstrap.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('adminassets/vendors/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('adminassets/vendors/select2/css/select2-bootstrap.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('adminassets/css/pages/blog.css')); ?>" />
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
	<style>
		.datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-bottom {
    color: black;
	background-color:#82ae46;
}
.datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-top {
    color: black;
}
.select2-container--bootstrap .select2-results__option {
    color: black;
}
	</style>
	<!--end of page level css-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
            <section class="content-header">
                <!--section starts-->
                <h1>Add new blog</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Blog</a>
                    </li>
                    <li class="active">Add new blog</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content paddingleft_right15">
                <!--main content-->
				<div name="msg" id=msg">
				</div>
                <div class="row blogcol">
                    <div class="the-box no-border">
                        <form role="form" method="post" name="blogform" id="blogform" enctype="multipart/form-data">
										<?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" name="title" id="title" placeholder="Post title here...">
                                    </div>
                                    <div class='box-body pad'>
										<textarea id="summernote" name="editordata"></textarea> 	
									</div>
                                </div>
                                <!-- /.col-sm-8 -->
                                <div class="col-sm-4">
									  <div class="form-group">
										<strong>Date : </strong>
										<input class="date form-control"  type="text" id="datepicker" name="datepicker">
									 </div>
									
									<script type="text/javascript">
										$('#datepicker').datepicker({
											autoclose: true,
											format: 'yyyy-mm-dd'
										 });
									</script>
                                    <div class="form-group">
                                        <label for="category">Post category</label>
                                        <select class="form-control category" name="category" id="category">
                                            <option value="">Select category </option>
                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                        
										</select>
                                    </div>
									<div class="form-group">
                                        <label for="activeon">Active</label>
                                        <select class="form-control" name="activeon" id="activeon">
                                            <option>Choose Option</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="selecttag"></label>
                                        <select class="form-control" id="selecttag" name="selecttag" multiple="multiple"></select>
                                    </div>
                                    <div class="form-group">
                                        <label>Blog image</label>
                                        
                                            <input type="file" name="blogphoto" id="blogphoto" class="form-control" placeholder="Upload image">
						<img id="blah" src="#" alt="your image" width="200px" height="200px"/>
				
						            </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" id="butsave">Save and post</button>
                                        <button class="btn btn-danger">Discard</button>
                                    </div>
                                </div>
                                <!-- /.col-sm-4 -->
                            </div>
							
                            <!-- /.row -->
                        </form>
                    </div>
                </div>
                <!--main content ends-->
            </section>
			
            <!-- content -->
			</body>
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

		$("#blogphoto").change(function() {
		  readURL(this);
		});						
		$('#butsave').on('click', function() {
			//console.log("Hell");
			var title = document.forms["blogform"]["title"].value;
			var published = document.forms["blogform"]["datepicker"].value;
			var selecttag = document.forms["blogform"]["selecttag"].value;
			var photo = document.forms["blogform"]["blogphoto"].value;
			var category = document.forms["blogform"]["category"].value;
			var active = document.forms["blogform"]["activeon"].value;
			var note=document.forms["blogform"]["summernote"].value;
			console.log(note);
			$(".error").remove();
			if (title==null || title=="")
			{
				$('#title').after('<span class="error">This field is required</span>');
				return false;
			}
			else if (note==null || note=="")
			{
				$('#summernote').after('<span class="error">This field is required</span>');
				return false;
			}
			else if (published==null || published=="")
			{
				$('#datepicker').after('<span class="error">This field is required</span>');
				return false;
			}
			else if (photo==null || photo=="")
			{
				$('#blogphoto').after('<span class="error">This field is required</span>');
				return false;
			}else if (category==null || category=="")
			{
				$('#category').after('<span class="error">This field is required</span>');
				return false;
			}else if (active==null || active=="")
			{
				$('#activeon').after('<span class="error">This field is required</span>');
				return false;
			}
			else if (selecttag==null || selecttag=="")
			{
				$('#selecttag').after('<span class="error">This is required</span>');
				return false;
			}
			var form = $('#blogform')[0]; // You need to use standard javascript object here
			var formData = new FormData(form);
			$.ajax({
					url: "<?php echo e(route('blog.store')); ?>",
					type: "Post",
					data: formData,
					contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
					processData: false,
					success: function(data)
					{
						$('form input:text').val('');
						$('#activeon').val('');
						$('#category').val('');
						$('#summernote').val('');
						$('form input:file').val('');
						$('#blah').val('');
						$('#msg').addClass("alert-success");
						$('#msg').html("success");
					},
					error: function(){
						$('form input:text').val('');
						$('category').val('');
						$('#activeon').val('');
						$('#summernote').val('');
						$('form input:file').val('');
						$('#blah').val('');
						$('#msg').addClass("alert-danger");
						$('#msg').html("error");
					}
				});
		return false;
		});
	</script>
    <!-- begining of page level js -->
    <!--new blog-->
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/summernote/summernote.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/jasny-bootstrap/js/jasny-bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/vendors/select2/js/select2.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('adminassets/js/pages/add_newblog.js')); ?>"></script>
	

	
    <!-- end of page level js -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\grovers\resources\views/admin/blog/create.blade.php ENDPATH**/ ?>