<a class="scrollToHome" href="#" style="display: inline;"><i class="fa fa-angle-up"></i></a>
@if(!is_api() and empty($is_user_page))
	<section class="footer_one home1">
		<div class="container pb70">
			<div class="row">
				@if($list_widget_footers = setting_item_with_lang("list_widget_footer"))
                    <?php $list_widget_footers = json_decode($list_widget_footers); ?>
					@foreach($list_widget_footers as $key=>$item)
						<div class="col-lg-{{$item->size ?? '3'}} col-md-6">
							<div class="footer_qlink_widget pl-0">
								<h4 class="title">
									{{$item->title}}
								</h4>
								<div class="context">
									{!! clean($item->content)  !!}
								</div>
							</div>
						</div>
					@endforeach
				@endif
					<div class="col-sm-7 col-md-6 col-lg-4 col-xl-4">
						<div class="footer_social_widget">
							<h4>Subscribe</h4>
							<p class="text-white mb20">We don’t send spam so don’t worry.</p>
							<form action="{{route('newsletter.subscribe')}}" class="subcribe-form bc-subscribe-form bc-form footer_mailchimp_form">
								@csrf
								<div class="form-row align-items-center">
									<div class="col-auto">
										
										<input type="text" name="email" class="form-control email-input" placeholder="{{__('Your Email')}}">
										<button type="submit" class="btn btn-primary btn-submit">{{__('Subscribe')}}
											<i class="fa fa-spinner fa-pulse fa-fw"></i>
										</button>
									</div>
								
								</div>
								<div class="form-mess"></div>
							</form>
						</div>
					</div>
			
			</div>
		</div>
		<hr>
		<div class="container pt20 pb30">
			<div class="row">
				<div class="col-md-4 col-lg-4">
					{!! clean(setting_item_with_lang("footer_text_left")) ?? ''  !!}
				</div>
				<div class="col-md-4 col-lg-4">
					<div class="footer_logo_widget text-center mb15-767">
						<div class="wrapper">
							<div class="logo text-center">
								@if(!empty(setting_item('footer_logo_id')))
								<img src="{{get_file_url(setting_item('footer_logo_id'))}}" alt="footer-logo.svg">
								@endif
								<span class="logo_title text-white pl15">{{setting_item('site_title')}}</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4">
					{!! clean(setting_item_with_lang("footer_text_right")) ?? ''  !!}
				</div>
			</div>
		</div>
	</section>
@endif

@include('Layout::parts.login-register-modal')
@include('Layout::parts.chat')
@if(Auth::id())
	@include('Media::browser')
@endif
<link rel="stylesheet" href="{{asset('libs/flags/css/flag-icon.min.css')}}">

{!! \App\Helpers\Assets::css(true) !!}

{{--Lazy Load--}}
<script src="{{asset('libs/lazy-load/intersection-observer.js')}}"></script>
<script async src="{{asset('libs/lazy-load/lazyload.min.js')}}"></script>
<script>
    // Set the options to make LazyLoad self-initialize
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        // ... more custom settings?
    };

    // Listen to the initialization event and get the instance of LazyLoad
    window.addEventListener('LazyLoad::Initialized', function (event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);


</script>
<script src="{{ asset('libs/lodash.min.js') }}"></script>
<script src="{{ asset('libs/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('libs/vue/vue'.(!env('APP_DEBUG') ? '.min':'').'.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>
@if(Auth::id())
	<script src="{{ asset('module/media/js/browser.js?_ver='.config('app.asset_version')) }}"></script>
@endif
<script type="text/javascript" src="{{ asset("libs/daterange/moment.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/daterangepicker.min.js") }}"></script>
<script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/functions.js?_ver='.config('app.asset_version')) }}"></script>

<script src="{{ asset('dist/frontend/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('dist/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('dist/frontend/js/jquery.mmenu.all.js') }}"></script>
<script src="{{ asset('dist/frontend/js/ace-responsive-menu.js') }}"></script>
<script src="{{ asset('dist/frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('dist/frontend/js/isotop.js') }}"></script>
<script src="{{ asset('dist/frontend/js/snackbar.min.js') }}"></script>
<script src="{{ asset('dist/frontend/js/simplebar.js') }}"></script>
<script src="{{ asset('dist/frontend/js/parallax.js') }}"></script>
<script src="{{ asset('dist/frontend/js/scrollto.js') }}"></script>
<script src="{{ asset('dist/frontend/js/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('dist/frontend/js/jquery.counterup.js') }}"></script>
<script src="{{ asset('dist/frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('dist/frontend/js/progressbar.js') }}"></script>
<script src="{{ asset('dist/frontend/js/slider.js') }}"></script>
<script src="{{ asset('dist/frontend/js/timepicker.js') }}"></script>
<!-- Custom script for all pages -->

<script src="{{ asset('dist/frontend/js/script.js') }}"></script>

@if(
    setting_item('tour_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('car_location_search_style')=='autocompletePlace' || setting_item('space_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('event_location_search_style')=='autocompletePlace'
)
	{!! App\Helpers\MapEngine::scripts() !!}
@endif
<script src="{{ asset('libs/pusher.min.js') }}"></script>
<script src="{{ asset('js/home.js?_ver='.config('app.asset_version')) }}"></script>

@if(!empty($is_user_page))
	<script src="{{ asset('dist/frontend/js/dashboard-script.js') }}"></script>
	<script src="{{ asset('module/user/js/user.js?_ver='.config('app.asset_version')) }}"></script>
@endif
@if(setting_item('cookie_agreement_enable')==1 and request()->cookie('booking_cookie_agreement_enable') !=1 and !is_api()  and !isset($_COOKIE['booking_cookie_agreement_enable']))
	<div class="booking_cookie_agreement p-3 d-flex fixed-bottom">
		<div class="content-cookie">{!! setting_item_with_lang('cookie_agreement_content') !!}</div>
		<button class="btn save-cookie">{!! setting_item_with_lang('cookie_agreement_button_text') !!}</button>
	</div>
	<script>
        var save_cookie_url = '{{route('core.cookie.check')}}';
	</script>
	<script src="{{ asset('js/cookie.js?_ver='.config('app.asset_version')) }}"></script>
@endif
@if(!empty(setting_item('inbox_enable')))
	<script src="{{ asset('module/core/js/chat-engine.js') }}"></script>
@endif
{!! \App\Helpers\Assets::js(true) !!}

@yield('footer')

@php \App\Helpers\ReCaptchaEngine::scripts() @endphp
