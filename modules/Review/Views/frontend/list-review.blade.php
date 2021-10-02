@php
if(empty($reviewData)){
    $reviewData = Modules\Review\Models\Review::getTotalViewAndRateAvg($row['id'], $review_service_type);
}
$review_stats = setting_item($review_service_type."_review_stats");
@endphp

<div class="col-lg-12 pl0 pl15-767">
    <div class="custom_reivews mt30 mb30 row">
        <div class="col-lg-12">
            <h4 class="mb25">{{ $reviewData['sbc_total'] }} (
                @if($reviewData['total_review'] > 1)
                    {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}
                @else
                    {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}
                @endif
                )</h4>
        </div>

        @if($review_stats)
            @php $review_stats = json_decode($review_stats); @endphp

            @foreach($review_stats as $key => $val)
                @foreach($review_meta as $key2 => $val2)
                    @if($val->title == $val2->name)
                        <div class="col-lg-2">
                            <div class="title">{{ $val->title }}</div>
                        </div>
                        <div class="col-lg-4">
                            <div class="review_content">
                                <div class="review_line">
                                    <span class="line-active" style="width: {{ $val2->sbc_total/5*100 }}%"></span>
                                </div>
                                <div class="review_point">{{ $val2->sbc_total }}</div>
                            </div>
                        </div>
                        @break
                    @endif
                @endforeach
            @endforeach
        @endif
    </div>
</div>

@if(!empty($review_list))
<div class="col-lg-12 pl0 pl15-767">
    <div class="listing_single_reviews">
        <div class="product_single_content mb30">
            @foreach($review_list as $key => $item)
                @php
                    $userInfo = $item->author;
                    $pictures = $item->getReviewMetaPicture();
                @endphp
                <div class="mbp_first media @if($key != count($review_list) - 1) mb30 @endif">
                    @if($avatar_url = $userInfo->getAvatarUrl())
                        <img class="mr-3 avatar" src="{{$avatar_url}}" alt="{{$userInfo->getDisplayName()}}">
                    @else
                        <span class="avatar-text">{{ucfirst($userInfo->getDisplayName()[0])}}</span>
                    @endif
                    <div class="media-body">
                        <h4 class="sub_title mt-0">{{ $userInfo->getDisplayName() }}</h4>
                        <div class="sspd_postdate fz14 mb20">{{display_datetime($item->created_at)}}
                            <div class="sspd_review pull-right">
                                @if($item->rate_number)
                                    <ul class="mb0 pl15">
                                        @for( $i = 0 ; $i < 5 ; $i++ )
                                            @if($i < $item->rate_number)
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            @else
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            @endif
                                        @endfor
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <p class="fz14 mt10">{{ $item->content }}</p>
                        @if(!empty($pictures))
                            @php $listImages = json_decode($pictures->val, true); @endphp
                            <div class="review_upload_photo_list thumb-list mt30">
                                <ul>
                                    @foreach($listImages as $key => $oneImages)
                                        @php $imagesData = json_decode($oneImages, true); @endphp
                                        @if($key <= 3)
                                            <li class="list-inline-item review_upload_item gallery_item mb-3">
                                                <a href="{{ @$imagesData['download'] }}" class="popup-img-review">
                                                    @if($key >= 3)
                                                        <div class="gallery_overlay style2 listing_single_v1"><span class="icon"><span class="fz14">+{{ count($listImages) - 4 }}</span></span></div>
                                                    @endif
                                                    <img src="{{ @$imagesData['download'] }}" alt="bsp1">
                                                </a>
                                            </li>
                                        @else
                                            <li class="hidden"><a class="popup-img-review" href="{{ @$imagesData['download'] }}"></a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="col-lg-12 pl0 pl15-767" id="bc-reviews">
    <div class="single_page_review_form p30-lg mb30-991">
        <div class="wrapper">
            <h4>{{ __("Add a Review") }}</h4>
            @include('admin.message')
            <form class="review_form review-form" id="review-form" action="{{ route('review.store') }}" method="post">
                @csrf
                <div class="custom_reivews row mt40 mb30 review-items sspd_review">
                    @if($review_stats)
                        @php $review_stats = is_array($review_stats) ? $review_stats : json_decode($review_stats); @endphp
                        @foreach($review_stats as $item)
                            <div class="col-lg-2 pr0">
                                <div class="title">{{$item->title}}</div>
                            </div>
                            <div class="col-lg-4">
                                <div class="review_star text-right item">
                                    <input class="review_stats" type="hidden" name="review_stats[{{$item->title}}]">
                                    <div class="rates">
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-2 pr0">
                            <div class="title">{{__("Review rate")}}</div>
                        </div>
                        <div class="col-lg-4">
                            <div class="review_star text-right review-items">
                                <div class="item">
                                    <input class="review_stats" type="hidden" name="review_rate">
                                    <div class="rates">
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                        <i class="fa fa-star grey"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="hidden" name="review_service_id" value="{{ $row['id'] }}">
                    <input type="hidden" name="review_service_type" value="{{ $review_service_type }}">
                    <textarea class="form-control" name="review_content" rows="7" placeholder="{{ __("Your Review") }}"></textarea>
                </div>
                @if(setting_item('review_upload_picture'))
                    <div class="review_upload_wrap form-group">
                        <div class="mb-3"><i class="fa fa-camera"></i> {{__('Add photo')}}</div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="review_upload_btn">
                                    <span class="helpText" id="helpText"></span>
                                    <input type="file" id="file" multiple data-name="review_upload" data-multiple="1" accept="image/*" class="review_upload_file">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="review_upload_photo_list row"></div>
                            </div>
                        </div>


                    </div>
                @endif
                <button type="submit" class="btn btn-thm">{{ __("Submit Review") }}</button>
            </form>
        </div>
    </div>
</div>
