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
					Add Portfolio
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="portfolioform" id="portfolioform" enctype="multipart/form-data" >
						{{ csrf_field() }}
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="porttitle" id="porttitle" placeholder="Enter Title">
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="portphoto" id="portphoto" class="form-control" placeholder="Upload image">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control resize_vertical" name="portdescription" id="portdescription" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Portfolio Category</label>
						<select class="form-control" name="porttype" id="porttype">
							@foreach($category as $cat)
								<option value="{{$cat->category}}">{{$cat->category}}</option>
							@endforeach
						</select>	</div>
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
				var name = document.forms["portfolioform"]["porttitle"].value;
				var description = document.forms["portfolioform"]["portdescription"].value;
				var photo = document.forms["portfolioform"]["portphoto"].value;
				var refer = document.forms["portfolioform"]["porttype"].value;
				var active = document.forms["portfolioform"]["active"].value;
				$(".error").remove();
				if (name==null || name=="")
				{
					$('#porttitle').after('<span class="error">This field is required</span>');
					return false;
				}else if (description==null || description=="")
				{
					$('#portdescription').after('<span class="error">This field is required</span>');
					return false;
				}else if (photo==null || photo=="")
				{
					$('#portphoto').after('<span class="error">This field is required</span>');
					return false;
				}else if (refer==null || refer=="")
				{
					$('#porttype').after('<span class="error">This field is required</span>');
					return false;
				}else if (active==null || active=="")
				{
					$('#active').after('<span class="error">This field is required</span>');
					return false;
				}						
				var form = $('#portfolioform')[0]; // You need to use standard javascript object here
				var formData = new FormData(form);
				$.ajax({
						url: "{{ route('portfolio.store')}}",
						type: "Post",
						data: formData,
						contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
						processData: false,
						success: function(data)
						{
							$('form input:text').val('');
							$('form textarea').val('');
							$('#active').val('');
							$('form input:file').val('');
							$('#msg').addClass("alert-success");
							$('#msg').html("success");
						},
						error: function(){
							$('form input:text').val('');
							$('form textarea').val('');
							$('#active').val('');
							$('form input:file').val('');
							$('#msg').addClass("alert-danger");
							$('#msg').html("error");
						}
					});
			return false;
			});
		</script>
@endsection
