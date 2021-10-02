@if($list_item)
	<section class="our-team">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						@if(!empty($title))
							<h2>{{ $title }}</h2>
						@endif
						@if(!empty($sub_title))
							<p>{{ $sub_title }}</p>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="team_slider">
						@foreach($list_item as $k=>$item)
							<div class="item">
								<div class="team_member">
									<div class="thumb">
										<img class="img-fluid" src="{{get_file_url($item['avatar'],'full')}}" alt="{{@$item['name']}}">
										<div class="overylay">
											<ul class="social_icon">
												@if(!empty($item['facebook']))
													<li class="list-inline-item"><a href="{{$item['facebook']}}"><i class="fa fa-facebook"></i></a></li>
												@endif
												@if(!empty($item['twitter']))
													<li class="list-inline-item"><a href="{{$item['twitter']}}"><i class="fa fa-twitter"></i></a></li>
												@endif
												@if(!empty($item['instagram']))
													<li class="list-inline-item"><a href="{{$item['instagram']}}"><i class="fa fa-instagram"></i></a></li>
												@endif
												@if(!empty($item['linkedin']))
													<li class="list-inline-item"><a href="{{$item['linkedin']}}"><i class="fa fa-linkedin"></i></a></li>
												@endif
											</ul>
										</div>
									</div>
									<div class="details">
										<h4>{{@$item['name']}}</h4>
										<p>{{@$item['career']}}</p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
@endif
