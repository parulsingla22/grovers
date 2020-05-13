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
					Promocode edit
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="promoeditform" id="promoeditform" method="post" action="/discount/update/{{$test->id}}" enctype="multipart/form-data">
						{{ csrf_field() }}
					<input type="hidden" name="id" id="id" value="{{$test->id}}"/>
					<div class="form-group">
						<label>Promocode title</label>
						<input class="form-control" name="title" id="title" placeholder="Enter Promo title" value="{{$test->promocode}}">
					</div>
					<div class="form-group">
						<label>Discount</label>
						<input class="form-control" name="discount" id="discount" placeholder="Enter Discount Price" value="{{$test->discount}}">
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="pactive" id="pactive">
							<option value="{{$test->active}}">{{$test->active}}</option>
							@if($test->active==1)
								<option value="0">0</option>
							@else
								<option value="1">1</option>
							@endif
						</select>
					</div>
					<button type="submit" id="butsave" class="btn btn-responsive btn-default">Submit Button</button>
					<button type="reset" class="btn btn-responsive btn-default" id="reset">Reset Button</button>
				</form>
			</div>
		</div>
		
	</div>
	
 @endsection             
                    