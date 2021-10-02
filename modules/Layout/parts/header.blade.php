<!-- Main Header Nav -->
<header class="header-nav menu_style_home_one {{ (!empty($row->header_style) and $row->header_style=='transparent') ? "  header-".$row->header_style : "header-normal style2" }} navbar-scrolltofixed stricky main-menu">
	<div class="container-fluid p0">
		<!-- Ace Responsive Menu -->
		<nav>
			<!-- Menu Toggle btn-->
			<div class="menu-toggle">
				<img class="nav_logo_img img-fluid" src="{{get_file_url(setting_item('logo_id'))}}" alt="">
				<button type="button" id="menu-btn">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<a href="{{ url(app_get_locale(false,'/')) }}" class="navbar_brand float-left dn-smd">

				@if(!empty($row->header_style) and $row->header_style=='transparent')
					<img class="logo1 img-fluid" src="{{get_file_url(setting_item('logo_white_id'))}}" alt="header-logo.svg">
				@else
					<img class="logo1 img-fluid" src="{{get_file_url(setting_item('logo_id'))}}" alt="header-logo.svg">
				@endif
				<img class="logo2 img-fluid" src="{{get_file_url(setting_item('logo_id'))}}" alt="header-logo2.svg">
				<span>{{setting_item('site_title')}}</span>
			</a>
			<!-- Responsive Menu Structure-->
			<!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
			@if(!empty(setting_item('enable_search_header')))
				@includeIf("Layout::parts.header-search")
			@endif

			<ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                <?php generate_menu('primary') ?>
				@include('Core::frontend.currency-switcher')
				@include('Language::frontend.switcher')
				@include('Layout::parts.notifications')
				@if(!Auth::id())
					<li class="list-inline-item">
						<a href="javascript:void(0)" class="btn flaticon-user"> <span class="dn-lg" data-toggle="modal" data-target="#sign_up_modal">{{ __('Login/') }}</span> <span data-toggle="modal" data-target="#sign_up_modal">{{ __('Register') }}</span> </a>
					</li>
				@else
					<li class="user_setting">
						<div class="dropdown">
							<a href="#" data-toggle="dropdown" class="btn dropdown-toggle is_login @if(!($avatar_url = Auth::user()->getAvatarUrl())) no_avatar @endif">
								@if($avatar_url = Auth::user()->getAvatarUrl())
									<img class="rounded-circle" src="{{$avatar_url}}" alt="{{ Auth::user()->getDisplayName()}}">
								@else
									<span class="avatar-text"></span>
									<span class="dn-1366">{{ucfirst( Auth::user()->getDisplayName()[0])}} <span class="fa fa-angle-down"></span></span>
								@endif
								{{__("Hi, :Name",['name'=>Auth::user()->getDisplayName()])}}
							</a>

							<div class="dropdown-menu">
								<div class="user_set_header">
									@if($avatar_url = Auth::user()->getAvatarUrl())
										<img class="float-left" src="{{$avatar_url}}" alt="{{ Auth::user()->getDisplayName()}}">
										<p>{{ Auth::user()->getDisplayName()}}</p>
									@else
										<p>{{ucfirst( Auth::user()->getDisplayName()[0])}}</p>
									@endif
								</div>
								<div class="user_setting_content">
									@if(Auth::user()->hasPermissionTo('dashboard_access'))
										<a class="dropdown-item border-0" href="{{url('/admin')}}"> {{__("Admin Dashboard")}}</a>
									@endif

									@if(Auth::user()->hasPermissionTo('dashboard_vendor_access'))
										<a class="dropdown-item border-0" href="{{route('vendor.dashboard')}}"> {{__('Vendor Dashboard')}}</a>
									@endif
									<a class="dropdown-item border-0" href="{{route('user.profile.index')}}">{{__("My profile")}}</a>
									<a class="dropdown-item border-0" href="{{route('user.change_password')}}">{{__("Change password")}}</a>
									@if(setting_item('inbox_enable'))
										<a class="dropdown-item" href="{{route('user.chat')}}">{{__('Messages')}}</a>
									@endif
									<a class="dropdown-item border-0" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{__('Logout')}}</a>
								</div>
								<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</div>
						</div>
					</li>
				@endif
				@if(Auth::check() and Auth::user()->hasPermissionTo('dashboard_vendor_access'))
					<li class="list-inline-item add_listing"><a href="{{route("vendor.dashboard")}}"><span class="icon">+</span><span class="dn-lg"> {{ __('Add Listing') }}</span></a></li>
				@endif

			</ul>
		</nav>
	</div>
</header>
<!-- Modal -->
<div id="page" class="stylehome1 h0">
	<!-- Main Header Nav For Mobile -->
	<div class="mobile-menu">
		<div class="header stylehome1">
			<div class="main_logo_home2 text-left">
				@if($logo_id = setting_item("logo_id"))
                    <?php $logo = get_file_url($logo_id, 'full') ?>
					<img class="nav_logo_img img-fluid mt15" src="{{$logo}}" alt="{{setting_item("site_title")}}">
				@endif
				<span class="mt15">{{setting_item("site_title")}}</span>
			</div>
			<ul class="menu_bar_home2">
				<li class="list-inline-item">
					@if(!empty(setting_item('enable_search_header')))
						<a class="custom_search_with_menu_trigger msearch_icon" href="#" data-toggle="modal" data-target="#staticBackdrop"><span class="flaticon-loupe"></span></a>
					@endif
				</li>
				<li class="list-inline-item"><a class="muser_icon" href="{{route('vendor.dashboard')}}"><span class="flaticon-avatar"></span></a></li>
				<li class="list-inline-item"><a class="menubar" href="#menu"><span></span></a></li>
			</ul>
		</div>
		<nav id="menu" class="stylehome1 mm-menu_offcanvas">
			<ul>
                <?php generate_menu('primary') ?>
				@if(!Auth::id())
					<li><a href="{{route('auth.login')}}"><span class="flaticon-user"></span> {{__('Login')}}</a></li>
					<li><a href="{{route('auth.register')}}"><span class="flaticon-edit"></span> {{__('Register')}}</a></li>
				@endif
				<li>@include('Core::frontend.currency-switcher',['mobile'=>true])</li>
				<li>@include('Language::frontend.switcher',['mobile'=>true])</li>
			</ul>
		</nav>
	</div>
</div>
<!-- Search Field Modal -->
@if(!empty(setting_item('enable_search_header')))
	<section class="modal fade search_dropdown" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-body">
					<div class="popup_modal_wrapper">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-12">
									<a class="close closer" data-dismiss="modal" aria-label="Close" href="#"><span><img src="{{asset('dist/frontend/guido/icons/close.svg')}}" alt=""></span></a>
								</div>
							</div>
						</div>
						<div class="container">

							<div class="row">
								<div class="col-lg-12">
									<h3>{{__('Search')}}</h3>
								</div>
								<div class="col-12 col-lg-6 my-2 smart-search smart-search-property-container position-relative mb-3">
									<select class="smart-search-property form-control w-100" placeholder="{{__("-- Please Select --")}}" value="" data-onLoad="{{__("Loading...")}}" ></select>
								</div>
							</div>
							@if(!empty(setting_item('enable_category_box')) and !empty(setting_item('header_category_box')))
								<div class="row">
									<div class="col-lg-12 mb30">
										<h3>{{__('Filter by Category')}}</h3>
									</div>
									@if(!empty($propertyCategoryHeader))
										@foreach($propertyCategoryHeader as $categoryHeader)
											<div class="col-sm-6 col-md-4 col-xl-2">
                                                <a href="{{ $categoryHeader->getDetailUrl() }}">
                                                    <div class="icon-box text-center">
                                                        <div class="icon">
                                                            <span class="{{$categoryHeader->icon??"flaticon-cutlery"}}"></span>
                                                        </div>
                                                        <div class="content-details">
                                                            <div class="title">{{$categoryHeader->name}}</div>
                                                        </div>
                                                    </div>
                                                </a>
											</div>
										@endforeach
									@endif
								</div>
							@endif
							@if(!empty(setting_item('enable_location_box')) and !empty(setting_item('header_location_box')))
								<div class="row">
									<div class="col-lg-12 mb15 mt20">
										<h3>{{__('Explore Hot Location')}}</h3>
									</div>
									@if(!empty($propertyLocationHeader))
										@foreach($propertyLocationHeader as $locationHeader)
											<div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
												<div class="property_city_home6 tac-xsd">
													<div class="thumb">
                                                        <a href="{{ $locationHeader->getDetailUrl() }}">
                                                            <img class="w100" src="{{$locationHeader->image_url}}" alt="{{ $locationHeader->name }}">
                                                        </a>
                                                    </div>
													<div class="details">
                                                        <a href="{{ $locationHeader->getDetailUrl() }}">
                                                            <h4>{{$locationHeader->name}}</h4>
                                                            <p>{{__(':number Listings',['number'=>$locationHeader->property_count??0])}} </p>
                                                        </a>
                                                    </div>
												</div>
											</div>
										@endforeach
									@endif

								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endif

