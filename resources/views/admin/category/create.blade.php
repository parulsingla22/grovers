@extends('admin.layouts.master')
@section('pagelevel')
	<!--page level css -->
	<style>
		.menustyle
		{
			padding:40px 190px;
		}
	</style>
    <!--end of page level css-->
@endsection
@section('content')

	<div class="menustyle">
		<div class="alert" id="msg">
			<p>
			</p>
		</div>
		
		<div class="panel panel-default" id="hidepanel6">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="livicon" data-name="share" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
					Add Category
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="categoryform" id="categoryform" enctype="multipart/form-data" >
						{{ csrf_field() }}
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" name="name" id="name" placeholder="Enter Name" required>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="photo" id="photo" class="form-control" placeholder="Upload image" required>
						<img id="blah" src="#" alt="your image" width="200px" height="200px"/>
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="active" id="active" required>
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

	$("#photo").change(function() {
	  readURL(this);
	});						
			$('#butsave').on('click', function() {
				var name = document.forms["categoryform"]["name"].value;
				var photo = document.forms["categoryform"]["photo"].value;
				var active = document.forms["categoryform"]["active"].value;
				$(".error").remove();
				if (name==null || name=="")
				{
					$('#name').after('<span class="error">This field is required</span>');
					return false;
				}else if (photo==null || photo=="")
				{
					$('#photo').after('<span class="error">This field is required</span>');
					return false;
				}else if (active==null || active=="")
				{
					$('#active').after('<span class="error">This field is required</span>');
					return false;
				}						
				var form = $('#categoryform')[0]; // You need to use standard javascript object here
				var formData = new FormData(form);
				$.ajax({
						url: "{{ route('category.store')}}",
						type: "Post",
						data: formData,
						contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
						processData: false,
						success: function(data)
						{
							$('form input:text').val('');
							$('#active').val('');
							$('form input:file').val('');
							$('#blah').src('');
							$('#msg').addClass("alert-success");
							$('#msg').html("success");
						},
						error: function(){
							$('form input:text').val('');
							$('#active').val('');
							$('form input:file').val('');
							$('#blah').src('');
							$('#msg').addClass("alert-danger");
							$('#msg').html("error");
						}
					});
			return false;
			});
		</script>
@endsection
