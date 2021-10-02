@php
	$reviewData = Modules\Review\Models\Review::getTotalViewAndRateAvg($row->id, 'news');
	$review_meta = Modules\Review\Models\Review::getReviewMetaAvg($row->id, 'news');
@endphp
<section class="inner_page_breadcrumb style3" @if($bg = setting_item("news_page_list_banner")) style="background-image: url({{get_file_url($bg,'full')}})" @endif>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-8">
				<div class="blog_single_post_heading text-center">
					<div class="contents">
						@php $category = $row->getCategory; @endphp
						@if(!empty($category))
							@php $t = $category->translateOrOrigin(app()->getLocale()); @endphp
							<div class="bsph_tag bgc-white text-thm">
								{{$t->name ?? ''}}
							</div>
						@endif
						<h2 class="text-white mb15">{!! clean($translation->title) !!}</h2>
						<ul class="mb0">
							@if(!empty($row->getAuthor))
								<li class="list-inline-item">
									<a class="text-white" href="{{$row->getAuthor->profile_url}}">
										<span class="flaticon-avatar mr10"></span>
										{{$row->getAuthor->getDisplayName() ?? ''}}
									</a>
								</li>
							@endif
							
							<li class="list-inline-item text-white"><span class="flaticon-date mr10"></span> {{ display_date($row->updated_at)}} </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Single Post -->
<section class="blog_post_container pb70">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-9">
				<div class="main_blog_post_content">
					<div class="mbp_thumb_post">
						<div class="content_post mb30">{!! clean($translation->content )!!}</div>
						<div class="bsp_share_btn df social-share pull-left position-relative">
							<a><span class="flaticon-upload icon"></span>{{ __("Share Post") }} </a>
							<ul class="share-wrapper">
								<li>
									<a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">
										<i class="fa fa-facebook fa-lg"></i>
									</a>
								</li>
								<li>
									<a class="twitter" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
										<i class="fa fa-twitter fa-lg"></i>
									</a>
								</li>
							</ul>
						</div>
						
						<ul class="blog_post_share text-right pt5">
							@if (!empty($tags = $row->getTags()) and count($tags) > 0)
								@foreach($tags as $tag)
									@php $t = $tag->translateOrOrigin(app()->getLocale()); @endphp
									<li class="list-inline-item"><a href="{{ $tag->getDetailUrl(app()->getLocale()) }}" class="tag-item"> {{$t->name ?? ''}} </a></li>
								@endforeach
							@endif
						</ul>
					</div>
					<hr class="mt60">
					<div class="mbp_pagination_tab">
						<div class="row">
							<div class="col-sm-6 col-lg-6">
								<div class="pag_prev">
									<div class="detls">
										@if(!empty($previous->slug))
											<a href="{{url('news/'.$previous->slug)}}">
												<h5 class="text-thm"><span class="fa fa-angle-left mr5"></span> Previous Post</h5>
												<p> {!! clean($translation_pre->title) !!}</p>
											</a>
										@endif
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-6">
								<div class="pag_next text-right">
									<div class="detls">
										@if(!empty($next->slug))
											<a href="{{url('news/'.$next->slug)}}">
												<h5 class="text-thm">Next Post <span class="fa fa-angle-right ml5"></span></h5>
												<p> {!! clean($translation_next->title) !!}</p>
											</a>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					{{--Reviews--}}
					@if(setting_item('news_enable_review'))
						<div id="reviews">
							@include('Review::frontend.list-review', ['review_service_id' => $row['id'], 'review_service_type' => 'news', 'reviewData' => $reviewData])
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
