<section class="our-listing pb30-991">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				@include('Property::frontend.layouts.search.filter-search-mobile')
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb_content style2 mb0-991">
					<h2 class="breadcrumb_title">{{__('List Property')}}</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{__('List Property')}}</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-xl-4">
				<div class="sidebar_listing_grid1 dn-lg bgc-f4">
					<div class="sidebar_listing_list">
						<div class="sidebar_advanced_search_widget">
							<ul class="sasw_list mb0">
								@include('Property::frontend.layouts.form-search.sidebar')
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-8">
				<div class="row">
					<div class="listing_filter_row dif db-767">
						<div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
							<div class="left_area tac-xsd mb30-767">
								<p class="mb0"> {{__('Showing')}} <span class="heading-color">{{ __(" :from - :to of :total results",['from'=>$rows->firstItem(), 'to'=>$rows->lastItem(), 'total'=>$rows->total()]) }}</span></p>
							</div>
						</div>
						<div class="col-sm-12 col-md-8 col-lg-8 col-xl-7">
							<div class="listing_list_style tac-767">
								<ul class="mb0">
									<li class="list-inline-item dropdown text-left"><span class="stts">Sort by: </span>
										<select value="{{$filter}}" onchange="this.form.submit()" name="filter" class="selectpicker show-tick">
											<option value="new" @if(Request::input('filter') == 'new') selected @endif>{{__('Default')}}</option>
											<option value="old" @if(Request::input('filter') == 'old') selected @endif>{{__('Oldest')}}</option>
											<option value="price_high" @if(Request::input('filter') == 'price_high') selected @endif>{{__('Price [high to low]')}}</option>
											<option value="price_low" @if(Request::input('filter') == 'price_low') selected @endif>{{__('Price [low to high]')}}</option>
											<option value="name_high" @if(Request::input('filter') == 'name_high') selected @endif>{{__('Name [a->z]')}}</option>
											<option value="name_low" @if(Request::input('filter') == 'name_low') selected @endif>{{__('Name [z->a]')}}</option>
										</select>
									</li>
									<li class="list-inline-item gird" id="btn-gird"><a class="text-thm" href="#"><span class="fa fa-th-large"></span></a></li>
									<li class="list-inline-item list" id="btn-list"><a href="#"><span class="fa fa-th-list"></span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="list-item">
					<div class="row">
						@if($rows->total() > 0)
							@foreach($rows as $row)
								<div class="item-listting col-lg-6 col-md-6">
									@include('Property::frontend.layouts.search.loop.loop-gird')
								</div>
							@endforeach
						@else
							<div class="col-lg-12">
								<div class="border rounded p-3 bg-white">
									{{__("Property not found")}}
								</div>
							</div>
						@endif
					</div>
				</div>
				<div class="col-lg-12 mt20">
					<div class="mbp_pagination">
						{{$rows->appends(request()->query())->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
