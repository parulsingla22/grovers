</head>
<body class="skin-josh adminback">
    <header class="header">
        <a href="index.html" class="logo">
            <img src="{{ URL::asset('adminassets/img/logo.png') }}" alt="Logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="riot">
                                <div>
                                    Options
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header ">
                                <img src="{{ URL::asset('adminassets/img/authors/avatar3.jpg') }}" width="90" class="img-circle img-responsive" height="90" alt="User Image" />
                                <p class="topprofiletext">Riot Zeast</p>
                            </li>
                            <!-- Menu Body -->
                            <li>
                                <a href="view_user.html">
                                    <i class="livicon" data-name="user" data-s="18"></i> My Profile
                                </a>
                            </li>
                            <li role="presentation"></li>
                            <li>
                                <a href="adduser.html">
                                    <i class="livicon" data-name="gears" data-s="18"></i> Account Settings
                                </a>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="lockscreen.html">
                                        <i class="livicon" data-name="lock" data-s="18"></i> Lock
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										<i class="livicon" data-name="sign-out" data-s="18"></i> Logout
									</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas" style="min-height:560px;">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav" id="myDiv">
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
						<li class="menu-link">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">MENU</span>
                                <span class="fa arrow"></span>
                            </a>
							<ul class="sub-menu">
								 <li class="menu-link1">
									<a href="{{ route('menu.create')}}">
										<i class="fa fa-angle-double-right"></i> Add Item
									</a>
								</li>
								</li class="menu-link1">
								<li>
									<a href="{{route('menu.index')}}">
										<i class="fa fa-angle-double-right"></i> Menu List
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-link">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Categories</span>
                                <span class="fa arrow"></span>
                            </a>
							<ul class="sub-menu">
								 <li class="menu-link1">
									<a href="{{ route('category.create')}}">
										<i class="fa fa-angle-double-right"></i>Add Category
									</a>
								</li>
								</li class="menu-link1">
								<li>
									<a href="{{route('category.index')}}">
										<i class="fa fa-angle-double-right"></i> Category List
									</a>
								</li>
							</ul>
						</li>
						
						<li class="menu-link">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Contact</span>
                                <span class="fa arrow"></span>
                            </a>
							<ul class="sub-menu">
								</li class="menu-link1">
								<li>
									<a href="{{route('contact.index')}}">
										<i class="fa fa-angle-double-right"></i> Contact List
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-link">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Products</span>
                                <span class="fa arrow"></span>
                            </a>
							<ul class="sub-menu">
								 <li class="menu-link1">
									<a href="{{ route('products.create')}}">
										<i class="fa fa-angle-double-right"></i>Add Product
									</a>
								</li>
								</li class="menu-link1">
								<li>
									<a href="{{route('products.index')}}">
										<i class="fa fa-angle-double-right"></i> Products List
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-link">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Features</span>
                                <span class="fa arrow"></span>
                            </a>
							<ul class="sub-menu">
								 <li class="menu-link1">
									<a href="{{ route('features.create')}}">
										<i class="fa fa-angle-double-right"></i>Add Feature
									</a>
								</li>
								</li class="menu-link1">
								<li>
									<a href="{{route('features.index')}}">
										<i class="fa fa-angle-double-right"></i>Features List
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-link">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Deals</span>
                                <span class="fa arrow"></span>
                            </a>
							<ul class="sub-menu">
								 <li class="menu-link1">
									<a href="{{ route('deals.create')}}">
										<i class="fa fa-angle-double-right"></i>Add Deal
									</a>
								</li>
								</li class="menu-link1">
								<li>
									<a href="{{route('deals.index')}}">
										<i class="fa fa-angle-double-right"></i> Deals List
									</a>
								</li>
							</ul>
						</li>
						
						<li class="menu-link">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Quality</span>
                                <span class="fa arrow"></span>
                            </a>
							<ul class="sub-menu">
								 <li class="menu-link1">
									<a href="{{ route('quality.create')}}">
										<i class="fa fa-angle-double-right"></i>Add quality
									</a>
								</li>
								</li class="menu-link1">
								<li>
									<a href="{{route('quality.index')}}">
										<i class="fa fa-angle-double-right"></i>Quality List
									</a>
								</li>
							</ul>
						</li>
						
						<li class="menu-link">
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Subscribers</span>
                                <span class="fa arrow"></span>
                            </a>
							<ul class="sub-menu">
								</li class="menu-link1">
								<li>
									<a href="{{route('subscribers.index')}}">
										<i class="fa fa-angle-double-right"></i> Subscribers List
									</a>
								</li>
							</ul>
						</li>
					</ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>
