@if(!empty($is_mobile))
	<div class="home_mobile_slider home_custom_list dn db-767">
		@foreach($list_property_category_data as $value)
			@php($translation = $value->translateOrOrigin(app()->getLocale()))
			<div class="item">
				<div class="icon_home1">
					<div class="icon"><span class="{{$value->icon}}"></span></div>
					<p>{{$translation->name}}</p>
				</div>
			</div>
		@endforeach
	</div>
@else
	<div class="container p0">
			<div class="feature-content dn-767">
				<div class="row justify-content-center mt-80 mb45">
					<div class="col-lg-4 text-center">
						<p><em class="text-white">{{__('What are you interested in?')}}</em></p>
					</div>
				</div>
				<div class="row">
					@foreach($list_property_category_data as $value)
						@php($translation = $value->translateOrOrigin(app()->getLocale()))
						<div class="col-sm-6 col-md-4 col-xl-2">
                            <a href="{{ $value->getDetailUrl() }}">
                                <div class="icon-box text-center">
                                    <div class="icon"><span class="{{$value->icon}}"></span></div>
                                    <div class="content-details">
                                        <div class="title">{{$translation->name}}</div>
                                    </div>
                                </div>
                            </a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
@endif
