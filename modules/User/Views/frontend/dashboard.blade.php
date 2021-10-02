@extends('layouts.user')
@section('head')
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			@include('admin.message')
		</div>
		<div class="col-lg-12 mb10">
			<div class="breadcrumb_content style2">
				<h2 class="breadcrumb_title float-left">{{__("Hello, :name!",['name'=>$user->display_name])}}</h2>
				<p class="float-right">{{__("Ready to jump back in!")}}</p>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 @if(setting_item('inbox_enable')) col-xl-3 @else col-xl-4 @endif">
			<div class="ff_one">
				<div class="icon"><span class="flaticon-list"></span></div>
				<div class="detais">
					<div class="timer">{{$activeListingCount}}</div>
					<p>{{__('Active Property')}}</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 @if(setting_item('inbox_enable')) col-xl-3 @else col-xl-4 @endif">
			<div class="ff_one style2">
				<div class="icon"><span class="flaticon-note"></span></div>
				<div class="detais">
					<div class="timer">{{$reviewCount}}</div>
					<p>{{__('Total Reviews')}}</p>
				</div>
			</div>
		</div>
		@if(setting_item('inbox_enable'))
			<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
				<div class="ff_one style3">
					<div class="icon"><span class="flaticon-chat"></span></div>
					<div class="detais">
						<div class="timer">{{$messageCount}}</div>
						<p>{{__("Messages")}}</p>
					</div>
				</div>
			</div>
		@endif
		<div class="col-sm-6 col-md-6 col-lg-6 @if(setting_item('inbox_enable')) col-xl-3 @else col-xl-4 @endif">
			<div class="ff_one style4">
				<div class="icon"><span class="flaticon-love"></span></div>
				<div class="detais">
					<div class="timer">{{$wishListCount}}</div>
					<p>{{__('Bookmarks')}}</p>
				</div>
			</div>
		</div>
	</div>
@endsection
