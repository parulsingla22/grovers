
@include('admin/header1')
	@include('admin/sidebar')
	@yield('pagelevel')
  <!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		
		<!-- Main content -->
		
		@yield('content')
		
	</aside>
	</div>
	<!-- right-side -->
@include('admin/footer1')