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
					Add item
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="Menuform" id="Menuform" >
						{{ csrf_field() }}
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="title" id="title" placeholder="Enter title">
					</div>
					<div class="form-group">
						<label>Reference</label>
						<input class="form-control" name="refer" id="refer" placeholder="Enter reference page">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="category" id="category">
							<option value="">Select</option>
							<option value="0">None</option>
							<option value="d">Dropdown</option>
							@foreach ($menu as $item)
							<option value="{{$item->id}}">{{$item->item}}</option>
							@endforeach
						</select>
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
				var title = document.forms["Menuform"]["title"].value;
				var refer = document.forms["Menuform"]["refer"].value;
				var category = document.forms["Menuform"]["category"].value;
				var active = document.forms["Menuform"]["active"].value;
				$(".error").remove();
				if (title==null || title=="")
				{
					$('#title').after('<span class="error">This field is required</span>');
					return false;
				}else if (refer==null || refer=="")
				{
					$('#refer').after('<span class="error">This field is required</span>');
					return false;
				}else if (category==null || category=="")
				{
					$('#category').after('<span class="error">This field is required</span>');
					return false;
				}else if (active==null || active=="")
				{
					$('#active').after('<span class="error">This field is required</span>');
					return false;
				}				
				var form = $('#Menuform')[0]; // You need to use standard javascript object here
				var formData = new FormData(form);
				$.ajax({
						url: "{{ route('menu.store')}}",
						type: "Post",
						data: formData,
						contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
						processData: false,
						success: function(data)
						{
							$('form input:text').val('');
							$('#category').val('');
							$('#active').val('');
							$('#msg').addClass("alert-success");
							$('#msg').html("success");
						},
						error: function(){
							$('form input:text').val('');
							$('#category').val('');
							$('#active').val('');
							$('#msg').addClass("alert-danger");
							$('#msg').html("error");
						}
					});
			return false;
			});
		</script>
@endsection
