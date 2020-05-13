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
					Portfolio edit
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="porteditform" id="porteditform" action="/portfolio/update/{{$test->id}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						
					<input type="hidden" name="id" id="id" value="{{$test->id}}"/>
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="porttitle" id="porttitle" placeholder="Enter Title" value="{{$test->porttitle}}">
					</div>
					<div class="form-group">
						<label>Image</label>
						<img src="{{URL::asset('assetfront/images/photos')}}/{{$test->portimage}}" alt="Image" width="100px" height="100px"/>
						<input type="file" name="portnewphoto" id="portnewphoto" class="form-control" placeholder="Upload image">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control resize_vertical" name="portdescription" id="portdescription" rows="3">{{$test->portdes}}</textarea>
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="porttype" id="porttype">
							<option value="{{$test->porttype}}">{{$test->porttype}}</option>
							@foreach($category as $cat)
								@if($cat->category!=$test->porttype)
									<option value="{{$cat->category}}">{{$cat->category}}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="active" id="active">
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
                    