@extends('layouts.app')

@section('content')
	<div class="page-profile-content page-template-content">
		@includeIf('User::frontend.profile.top-bar')
		<section class="our-listing pb30-991">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-12">
								<h4 class="mb15">{{__(':name Listing',['name'=>$user->getDisplayName()] )}}</h4>
							</div>
							<div class="col-lg-12">
								@include('User::frontend.profile.services')
								<div class="border-top pt40 mb40" >
									@include('User::frontend.profile.reviews')
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						@includeIf('User::frontend.profile.sidebar')
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
