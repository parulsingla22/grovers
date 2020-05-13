@extends('admin.layouts.master')
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
					Add Feature
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="featureform" id="featureform" enctype="multipart/form-data" >
						{{ csrf_field() }}
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="title" id="title" placeholder="Enter Title" value="">
					</div>
					<div class="form-group">
						<label>Icon</label>
						<input type="text" name="icon" id="icon" class="form-control" placeholder="Enter icon name">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control resize_vertical" name="description" id="description" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="factive" id="factive">
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
			$('#butsave').on('click', function(){
				var title = document.forms["featureform"]["title"].value;
				var description = document.forms["featureform"]["description"].value;
				var icon = document.forms["featureform"]["icon"].value;
				var active = document.forms["featureform"]["factive"].value;
				$(".error").remove();
				if (title==null || title=="")
				{
					$('#title').after('<span class="error">This field is required</span>');
					return false;
				}else if (description==null || description=="")
				{
					$('#description').after('<span class="error">This field is required</span>');
					return false;
				}else if (icon==null || icon=="")
				{
					$('#icon').after('<span class="error">This field is required</span>');
					return false;
				}else if (active==null || active=="")
				{
					$('#factive').after('<span class="error">This field is required</span>');
					return false;
				}						
				var form = $('#featureform')[0]; // You need to use standard javascript object here
				var formData = new FormData(form);
				$.ajax({
						url: "{{ route('features.store')}}",
						type: "Post",
						data: formData,
						contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
						processData: false,
						success: function(data)
						{
							$('form input:text').val('');
							$('form textarea').val('');
							$('#factive').val('');
							$('#msg').addClass("alert-success");
							$('#msg').html("success");
						},
						error: function(){
							$('form input:text').val('');
							$('form textarea').val('');
							$('#factive').val('');
							$('#msg').addClass("alert-danger");
							$('#msg').html("error");
						}
					});
			return false;
			});
	</script>
@endsection
