@extends('layouts.user')

@section('content')
	<div class="row">
		<div class="col-lg-12 mb15">
		<div class="breadcrumb_content">
			<div class="row">
				<div class="col-6">
					<h2 class="breadcrumb_title">{{ __("Reviews") }}</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12">
		@include('admin.message')
	
	</div>
	
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div id="myreview" class="my_dashboard_review mb30-smd">
				<div class="mbp_pagination_comments">
					<div class="total_review pt0">
						<h4>{{__('Visitor Reviews')}}</h4>
					</div>
					@if($reviews->total())
						<div class="bc-reviews">
							<div class="review-list">
								@if($reviews)
									@foreach($reviews as $item)
										@php $userInfo = $item->author;
                                                 if(!$userInfo){
                                                    continue;
                                                 }
										@endphp
										<div class="review-item">
											<div class="review-item-head">
												<div class="media">
													<div class="media-left">
														@if($avatar_url = $userInfo->getAvatarUrl())
															<img class="avatar" src="{{$avatar_url}}" alt="{{$userInfo->getDisplayName()}}">
														@else
															<span class="avatar-text">{{ucfirst($userInfo->getDisplayName()[0])}}</span>
														@endif
													</div>
													<div class="media-body">
														<h4 class="media-heading">{{$userInfo->getDisplayName()}}</h4>
														<div class="date">{{display_datetime($item->created_at)}}</div>
													</div>
												</div>
											</div>
											<div class="review-item-body">
												<h4 class="title"> {{$item->title}} </h4>
												@if($item->rate_number)
													<ul class="review-star">
														@for( $i = 0 ; $i < 5 ; $i++ )
															@if($i < $item->rate_number)
																<li><i class="fa fa-star"></i></li>
															@else
																<li><i class="fa fa-star-o"></i></li>
															@endif
														@endfor
													</ul>
												@endif
												<div class="detail">
													{{$item->content}}
												</div>
											</div>
										</div>
									@endforeach
								@endif
							</div>
							<div class="review-pag-wrapper">
								<div class="bc-pagination">
									{{$reviews->appends(request()->query())->links()}}
								</div>
								<div class="review-pag-text">
									{{ __("Showing :from - :to of :total total",["from"=>$reviews->firstItem(),"to"=>$reviews->lastItem(),"total"=>$reviews->total()]) }}
								</div>
							</div>
						</div>
					@else
						<div class="review-pag-text">{{__("No Review")}}</div>
					@endif
					
				</div>
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="my_dashboard_review">
				<div class="mbp_pagination_comments">
					<div class="total_review pt0">
						<h4>{{__('Your Reviews')}}</h4>
					</div>
					@if($my_reviews->total())
						<div class="bc-reviews">
							<div class="review-list">
								@if($my_reviews)
									@foreach($my_reviews as $item)
										@php $userInfo = $item->author;
                                                 if(!$userInfo){
                                                    continue;
                                                 }
										@endphp
										<div class="review-item">
											<div class="review-item-head">
												<div class="media">
													<div class="media-left">
														@if($avatar_url = $userInfo->getAvatarUrl())
															<img class="avatar" src="{{$avatar_url}}" alt="{{$userInfo->getDisplayName()}}">
														@else
															<span class="avatar-text">{{ucfirst($userInfo->getDisplayName()[0])}}</span>
														@endif
													</div>
													<div class="media-body">
														<h4 class="media-heading">{{$userInfo->getDisplayName()}}</h4>
														<div class="date">{{display_datetime($item->created_at)}}</div>
													</div>
												</div>
											</div>
											<div class="review-item-body">
												<h4 class="title"> {{$item->title}} </h4>
												@if($item->rate_number)
													<ul class="review-star">
														@for( $i = 0 ; $i < 5 ; $i++ )
															@if($i < $item->rate_number)
																<li><i class="fa fa-star"></i></li>
															@else
																<li><i class="fa fa-star-o"></i></li>
															@endif
														@endfor
													</ul>
												@endif
												<div class="detail">
													{{$item->content}}
												</div>
											</div>
										</div>
									@endforeach
								@endif
							</div>
							<div class="review-pag-wrapper">
								<div class="bc-pagination">
									{{$my_reviews->appends(request()->query())->links()}}
								</div>
								<div class="review-pag-text">
									{{ __("Showing :from - :to of :total total",["from"=>$my_reviews->firstItem(),"to"=>$my_reviews->lastItem(),"total"=>$my_reviews->total()]) }}
								</div>
							</div>
						</div>
					@else
						<div class="review-pag-text">{{__("No Review")}}</div>
					@endif
				</div>
			</div>
		</div>
	
	</div>
@endsection
