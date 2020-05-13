@extends('layouts.master')
@section('pagelevel')
	<!--page level css -->

    <!--end of page level css-->
@endsection
@section('content')
	<div>
		<div class="alert" id="msg">
			<p>
			</p>
		</div>
		
		<div class="panel panel-primary" id="hidepanel6">
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
				<form role="form" name="pcategoryform" id="pcategoryform" >
						{{ csrf_field() }}
					<div class="form-group">
						<label>Category</label>
						<input class="form-control" name="pcategory" id="pcategory" placeholder="Enter Category">
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="active" id="active">
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
			$('#butsave').on('click', function() {
				var a = document.forms["pcategoryform"]["pcategory"].value;
				var c = document.forms["pcategoryform"]["active"].value;
				$(".error").remove();
				if (a==null || a=="")
				{
					$('#pcategory').after('<span class="error">This field is required</span>');
					return false;
				}else if (c==null || c=="")
				{
					$('#active').after('<span class="error">This field is required</span>');
					return false;
				}						
				var form = $('#pcategoryform')[0]; // You need to use standard javascript object here
				var formData = new FormData(form);
				$.ajax({
						url: "{{ route('pcategory.store')}}",
						type: "Post",
						data: formData,
						contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
						processData: false,
						success: function(data)
						{
							$('form input:text').val('');
							$('#active').val('');
							$('#msg').addClass("alert-success");
							$('#msg').html("success");
						},
						error: function(){
							$('form input:text').val('');
							$('#active').val('');
							$('#msg').addClass("alert-danger");
							$('#msg').html("error");
						}
					});
			return false;
			});
		</script>
@endsection
