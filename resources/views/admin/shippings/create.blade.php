@extends('admin.layouts.master')
@section('pagelevel')
	<!--page level css -->
	<style>
		.menustyle
		{
			padding:10px 190px;
		}
		body
		{
			color:black;
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
					Add Shipping
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="shipform" id="shipform" enctype="multipart/form-data">
						{{ csrf_field() }}
					<div class="form-group">
						<label>State</label>
						<input class="form-control" name="state" id="state" placeholder="Enter State" value="">
					</div>
					<div class="form-group">
						<label>Country</label>
						<input class="form-control" name="country" id="country" placeholder="Enter Country" value="">
					</div>
					<div class="form-group">
						<label>Zipcode</label>
						<input class="form-control" name="zipcode" id="zipcode" placeholder="Enter Zipcode" value="">
					</div>
					<div class="form-group">
						<label>Delivery Amount</label>
						<input class="form-control" name="amount" id="amount" placeholder="Enter Delivery Amount" value="">
					</div>
					
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="pactive" id="pactive">
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

		$("#productimg").change(function() {
		  readURL(this);
		});						
		$('#butsave').on('click', function() {
			var state= document.forms["shipform"]["state"].value;
			
			var country= document.forms["shipform"]["country"].value;
			var zipcode= document.forms["shipform"]["zipcode"].value;
			var amount = document.forms["shipform"]["amount"].value;
			var active = document.forms["shipform"]["pactive"].value;
			$(".error").remove();
			if (state==null || state=="")
			{
				$('#state').after('<span class="error">This field is required</span>');
				return false;
			}
			else if (country==null || country=="")
			{
				$('#country').after('<span class="error">This field is required</span>');
				return false;
			}
			else if (zipcode==null || zipcode=="")
			{
				$('#zipcode').after('<span class="error">This field is required</span>');
				return false;
			}
			else if (amount==null || amount=="")
			{
				$('#amount').after('<span class="error">This field is required</span>');
				return false;
			}else if (active==null || active=="")
			{
				$('#pactive').after('<span class="error">This field is required</span>');
				return false;
			}
			var form = $('#shipform')[0]; // You need to use standard javascript object here
			var formData = new FormData(form);
			$.ajax({
					url: "{{ route('shipping.store')}}",
					type: "Post",
					data: formData,
					contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
					processData: false,
					success: function(data)
					{
						$('form input:text').val('');
						$('#pactive').val('');
						$('#blah').val('');
						$('#msg').addClass("alert-success");
						$('#msg').html("success");
					},
					error: function(){
						$('form input:text').val('');
						$('#pactive').val('');
						$('#blah').val('');
						$('#msg').addClass("alert-danger");
						$('#msg').html("error");
					}
				});
		return false;
		});
	</script>
 @endsection             
                    