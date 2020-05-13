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
					Menu Item Edit
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="menueditform" id="menueditform" action="/menu/update/{{$menu->id}}" method="post">
						{{ csrf_field() }}
						
					<input type="hidden" name="id" id="id" value="{{$menu->id}}"/>
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="title" id="title" required placeholder="Enter title" value="{{$menu->item}}">
					</div>
					<div class="form-group">
						<label>Reference</label>
						<input class="form-control" name="refer" id="refer" required placeholder="Enter reference page" value="{{$menu->ref}}">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select class="form-control" name="category" id="category" required>
							<option value="">Select</option>
							<option value="0">None</option>
							<option value="d">Dropdown</option>
							@foreach ($cat as $item)
							<option value="{{$item->id}}">{{$item->item}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="active" id="active" required>
							<option value="{{$menu->active}}">{{$menu->active}}</option>
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
	@endsection             
                    