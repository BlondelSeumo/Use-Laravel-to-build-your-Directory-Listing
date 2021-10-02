@extends('layouts.user')
@section('head')

@endsection
@section('content')
	<div class="row">
		<div class="col-lg-12 mb10">
			<div class="breadcrumb_content style2">
				<h2 class="breadcrumb_title float-left">{{__("Profile")}}</h2>
			</div>
		</div>
		<div class="col-12">
			@include('admin.message')
		</div>
		<div class="col-12">
			<div class="row">
				<div class="col-xl-8">
					<div class="my_dashboard_profile mb30-lg">
						<h4 class="mb30">{{__('Profile Details')}}</h4>
						<form action="{{route('user.profile.update')}}" method="post" class="input-has-icon">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-title">
										<strong>{{__("Personal Information")}}</strong>
									</div>
									@if($is_vendor_access)
										<div class="my_profile_setting_input form-group">
											<label>{{__("Business name")}}</label>
											<input type="text" value="{{old('business_name',$dataUser->business_name)}}" name="business_name" class="form-control">
										</div>
									@endif
									<div class="my_profile_setting_input form-group">
										<label>{{__("User name")}}</label>
										<input type="text" name="user_name" value="{{old('user_name',$dataUser->user_name)}}" class="form-control">
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("E-mail")}}</label>
										<input type="text" name="email" value="{{old('email',$dataUser->email)}}" class="form-control">
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="my_profile_setting_input form-group">
												<label>{{__("First name")}}</label>
												<input type="text" value="{{old('first_name',$dataUser->first_name)}}" name="first_name" class="form-control">
											</div>
										</div>
										<div class="col-md-6">
											<div class="my_profile_setting_input form-group">
												<label>{{__("Last name")}}</label>
												<input type="text" value="{{old('last_name',$dataUser->last_name)}}" name="last_name" class="form-control">
											</div>
										</div>
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("Phone Number")}}</label>
										<input type="text" value="{{old('phone',$dataUser->phone)}}" name="phone" class="form-control">
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("Birthday")}}</label>
										<input type="text" value="{{ old('birthday',$dataUser->birthday? display_date($dataUser->birthday) :'') }}" name="birthday" class="form-control date-picker">
									</div>
                                    <div class="my_profile_setting_input form-group">
                                        <label>{{__("Job")}}</label>
                                        <input type="text" value="{{ old('job', $dataUser->job) }}" name="job" class="form-control">
                                    </div>
									<div class="my_profile_setting_textarea form-group">
										<label>{{__("About Yourself")}}</label>
										<textarea name="bio" rows="5" class="form-control">{{old('bio',$dataUser->bio)}}</textarea>
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("Avatar")}}</label>
										<div class="upload-btn-wrapper">
											<div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    {{__("Browse")}}… <input type="file">
                                </span>
                            </span>
												<input type="text" data-error="{{__("Error upload...")}}" data-loading="{{__("Loading...")}}" class="form-control text-view" readonly value="{{ get_file_url( old('avatar_id',$dataUser->avatar_id) ) ?? $dataUser->getAvatarUrl()?? __("No Image")}}">
											</div>
											<input type="hidden" class="form-control" name="avatar_id" value="{{ old('avatar_id',$dataUser->avatar_id)?? ""}}">
											<img class="image-demo" src="{{ get_file_url( old('avatar_id',$dataUser->avatar_id) ) ??  $dataUser->getAvatarUrl() ?? ""}}"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-title">
										<strong>{{__("Location Information")}}</strong>
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("Address Line 1")}}</label>
										<input type="text" value="{{old('address',$dataUser->address)}}" name="address" class="form-control">
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("Address Line 2")}}</label>
										<input type="text" value="{{old('address2',$dataUser->address2)}}" name="address2" class="form-control">
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("City")}}</label>
										<input type="text" value="{{old('city',$dataUser->city)}}" name="city" class="form-control">
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("State")}}</label>
										<input type="text" value="{{old('state',$dataUser->state)}}" name="state" class="form-control">
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("Country")}}</label>
										<select name="country" class="form-control">
											<option value="">{{__('-- Select --')}}</option>
											@foreach(get_country_lists() as $id=>$name)
												<option @if((old('country',$dataUser->country ?? '')) == $id) selected @endif value="{{$id}}">{{$name}}</option>
											@endforeach
										</select>
									</div>
									<div class="my_profile_setting_input form-group">
										<label>{{__("Zip Code")}}</label>
										<input type="text" value="{{old('zip_code',$dataUser->zip_code)}}" name="zip_code" class="form-control">
									</div>

								</div>
								<div class="col-md-12">
									<div class="my_profile_setting_input">
										<button class="btn update_btn style2" type="submit">{{__('Save Changes')}}</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="my_dashboard_profile">
						<h4 class="mb20">{{__('Change password')}}</h4>
						@includeIf('User::frontend.changePasswordForm')
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
@section('footer')

@endsection
