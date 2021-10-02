@extends('layouts.user')
@section('head')
@endsection
@section('content')
	<div class="row">
		<div class="col-lg-12 mb10">
			<div class="breadcrumb_content style2">
				<h2 class="breadcrumb_title float-left">{{__("Change password")}}</h2>
			</div>
		</div>
		<div class="col-12">
			<div class="row">
				<div class="col-xl-12">
					<div class="my_dashboard_profile mb30-lg">
						@includeIf('User::frontend.changePasswordForm')
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('footer')

@endsection
