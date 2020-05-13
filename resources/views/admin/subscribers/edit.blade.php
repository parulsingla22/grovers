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
					Menu Edit
				</h3>
				<span class="pull-right">
					<i class="glyphicon glyphicon-chevron-up clickable"></i>
				</span>
			</div>
			<div class="panel-body">
				<form role="form" name="menueditform" id="menueditform" action="/tmenu/update/{{$menutop->id}}" method="post">
						{{ csrf_field() }}
						
					<input type="hidden" name="id" id="id" value="{{$menutop->id}}"/>
					<div class="form-group">
						<label>Title</label>
						<input class="form-control" name="menutitle" id="menutitle" placeholder="Enter title" value="{{$menutop->menutitle}}" />
					</div>
					<div class="form-group"> 
						<label>Icon</label>
							<input class="form-control" name="menuicon" id="menuicon" placeholder="Enter Icon name" value="{{$menutop->menuicon}}" />
					</div>
					<div class="form-group"> 
						<label>Content</label>
							<input class="form-control" name="menucontent" id="menucontent" placeholder="Enter Content" value="{{$menutop->menucontent}}" />
					</div>
					<div class="form-group">
						<label>Active</label>
						<select class="form-control" name="active" id="active">
							<option value="{{$menutop->active}}">{{$menutop->active}}</option>
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
                    