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
					Product edit
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="productform" id="productform" method="post" action="/products/update/{{$test->id}}" enctype="multipart/form-data">
						{{ csrf_field() }}
					<input type="hidden" name="id" id="id" value="{{$test->id}}"/>
					<div class="form-group">
						<label>Product name</label>
						<input class="form-control" name="name" id="name" placeholder="Enter Product name" value="{{$test->name}}">
					</div>
					<div class="form-group">
						<label>Product image</label>
						<input type="file" name="newproductimg" id="newproductimg" class="form-control" placeholder="Upload image">
						<img id="blah" src="{{URL::asset('images/products/')}}/{{$test->productimg}}" alt="your image" width="200px" height="200px"/>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input class="form-control" name="price" id="price" placeholder="Enter Product Price" value="{{$test->price}}">
					</div>
					<div class="form-group">
						<label>Sale Price</label>
						<input class="form-control" name="saleprice" id="saleprice" placeholder="Enter Product Sale Price if any" value="{{$test->saleprice}}">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="category" id="category">
							
							@foreach($category as $cat)
								@if($cat->id==$test->categoryid)
									<option value="{{$cat->id}}">{{$cat->name}}</option>
								@else
									<option value="{{$cat->id}}">{{$cat->name}}</option>
								@endif
							@endforeach
						</select>
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
                    