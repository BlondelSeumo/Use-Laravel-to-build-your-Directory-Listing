<section class="bgc-f4">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="author_content">
					<div class="author_thumb float-left fn-xsd mr20">
						@if($avatar = $user->getAvatarUrl())
							<img src="{{$avatar}}" class="profile-user-logo  shadow" alt="author2.png">
						@else
							<span class="avatar-text">{{$user->getDisplayName()[0]}}</span>
						@endif
					</div>
					<div class="author_details">
						<h2 class="author_title">{{$user->getDisplayName()}}</h2>
						<div class="author_review">
							<ul>
								<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
								<li class="list-inline-item">
									@if($user->review_count <= 1)
										{{__('(:count review)',['count'=>$user->review_count])}}
									@else
										{{__('(:count reviews)',['count'=>$user->review_count])}}
									@endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				@if(!empty(setting_item('inbox_enable')) and Auth::check() and Auth::id() !=$user->id)
				<div class="author_content text-right tal-smd">
					<a href="#" class="btn btn-lg btn-thm send_btn mt20">Send Message</a>
				</div>
					@endif
			</div>
		</div>
	</div>
</section>