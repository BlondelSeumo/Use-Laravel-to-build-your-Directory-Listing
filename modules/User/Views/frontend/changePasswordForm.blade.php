<form action="{{ route("user.change_password.update") }}" method="post">
	@csrf
		<div class="my_profile_setting_input form-group">
			<label>{{__("Current Password")}}</label>
			<input type="password" name="current-password"  class="form-control">
		</div>
		<div class="my_profile_setting_input form-group">
			<label>{{__("New Password")}}</label>
			<input type="password" name="new-password" class="form-control">
		</div>
		<div class="my_profile_setting_input form-group">
			<label>{{__("New Password Again")}}</label>
			<input type="password" name="new-password_confirmation"  class="form-control">
		</div>
		<div class="my_profile_setting_input">
			<input type="submit" class="btn update_btn style2" value="{{__("Change Password")}}">
		</div>
		
</form>
