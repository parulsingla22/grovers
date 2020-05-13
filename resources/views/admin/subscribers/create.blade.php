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
					MenuTop
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="menuform" id="menuform" >
						{{ csrf_field() }}
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="menutitle" id="menutitle" placeholder="Enter title">
					</div>
					<div class="form-group"> 
						<label>Icon</label>
							<input class="form-control" name="menuicon" id="menuicon" placeholder="Enter Icon name">
					</div>
					<div class="form-group"> 
						<label>Content</label>
							<input class="form-control" name="menucontent" id="menucontent" placeholder="Enter Content">
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
				var title = document.forms["menuform"]["menutitle"].value;
				var icon = document.forms["menuform"]["menuicon"].value;
				var content = document.forms["menuform"]["menucontent"].value;
				var active = document.forms["menuform"]["active"].value;
				$(".error").remove();
				if (title==null || title=="")
				{
					$('#menutitle').after('<span class="error">This field is required</span>');
					return false;
				}else if (icon==null || icon=="")
				{
					$('#menuicon').after('<span class="error">This field is required</span>');
					return false;
				}else if (content==null || content=="")
				{
					$('#menucontent').after('<span class="error">This field is required</span>');
					return false;
				}else if (active==null || active=="")
				{
					$('#menuactive').after('<span class="error">This field is required</span>');
					return false;
				}						
				var form = $('#menuform')[0]; // You need to use standard javascript object here
				var formData = new FormData(form);
				$.ajax({
						url: "{{ route('tmenu.store')}}",
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
