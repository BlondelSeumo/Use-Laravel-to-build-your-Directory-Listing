<?php
/**
 * Created by PhpStorm.
 * User: h2 gaming
 * Date: 8/17/2019
 * Time: 3:39 PM
 */
$reviews = \Modules\Review\Models\Review::query()->where([
    'vendor_id'=>$user->id,
    'status'=>'approved'
])
    ->orderBy('id','desc')
    ->with('author')
    ->paginate(3);
?>
@if($reviews->total())
    <div class="bc-reviews">
        <h3>{{__('Reviews from guests')}}</h3>
        <div class="review-list">
            <div class="listing_single_reviews">
                    <div class="product_single_content mb30">
                        @foreach($reviews as $key => $item)
                            @php
                                $userInfo = $item->author;
								$pictures = $item->getReviewMetaPicture();
                            @endphp
                            <div class="mbp_first media @if($key != $reviews->total() - 1) mb30 @endif">
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
        <div class="text-center mt30"><a class="btn btn-sm btn-primary" href="{{route('user.profile.reviews',['id'=> $user->user_name ?? $user->id])}}">{{__('View all reviews (:total)',['total'=>$reviews->total()])}}</a></div>
    </div>
@endif
