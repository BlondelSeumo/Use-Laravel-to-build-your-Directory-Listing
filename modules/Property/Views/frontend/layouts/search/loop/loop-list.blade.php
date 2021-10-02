@php
    $translation = $row->translateOrOrigin(app()->getLocale());
    $reviewData = Modules\Review\Models\Review::getTotalViewAndRateAvg($row['id'], 'property');
@endphp
<div class="feat_property list">
    <div class="thumb">
        @if($row->image_url)
            <a class="thumb-image" @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                <img class="img-whp" src="{{$row->image_url}}" alt="{{$translation->title}}">
            </a>
        @else
            <span class="avatar-text-large">{{$row->vendor->getDisplayNameAttribute()[0]}}</span>
        @endif
        <div class="thmb_cntnt">
            <ul class="tag mb0">
                @if($row->price_range)
                    <li class="list-inline-item"><a>@for($i=0; $i < $row->price_range; $i++)$@endfor</a></li>
                @endif
                @if($row->enable_open_hours)
                    <li class="list-inline-item"><a>{{__("Open")}}</a></li>
                @endif
            </ul>
            @if($row->is_featured)
                <ul class="tag2 mb0">
                    <li class="list-inline-item">
                        <a>{{__('Featured')}}</a>
                    </li>
                </ul>
            @endif
            <ul class="listing_reviews">
                @for( $i = 0 ; $i < 5 ; $i++ )
                    @if($i < (int)$reviewData['sbc_total'])
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                    @else
                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                    @endif
                @endfor
                <li class="list-inline-item text-white">(
                    @if($reviewData['total_review'] > 1)
                        {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}
                    @else
                        {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}
                    @endif
                )</li>
            </ul>
        </div>
    </div>
    <div class="details">
        <div class="tc_content">
            <a href="{{ $row->getDetailUrl() }}" @if(!empty($blank)) target="_blank" @endif>
                <h4 class="title">{{$translation->title}}</h4>
            </a>
            <p>
                @if($row->user)
                    <img class="list_simg rounded-circle mr5" src="{{ $row->user->getAvatarUrl() }}" alt="{{ $row->user->getDisplayName() }}">
                @endif
                {!! clean(get_exceprt($translation->content, 11, '...')) !!}
            </p>
            <ul class="prop_details mb0 mt15">
                @if($row->phone)
                    <li class="list-inline-item"><span class="flaticon-phone mr15"></span><a href="tel:{{ $row->phone }}" target="_blank">{{ $row->phone }}</a></li>
                @endif

                @if(!empty($row->location->name))
                    <li class="list-inline-item">
                        <a href="{{ $row->location->getDetailUrl() }}"><span class="flaticon-pin pr5"></span>
                            {{ $row->location->name }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="fp_footer">
            @if(!empty($row->categories) && count($row->categories) > 0)
                @php $category = $row->categories[0]; @endphp
                <ul class="fp_meta float-left mb0">
                    @if($category->image_id)
                        <li class="list-inline-item"><a href="{{ $category->getDetailUrl() }}"><img src="{{ \Modules\Media\Helpers\FileHelper::url($category->image_id) }}" alt="{{$category->name}}"></a></li>
                    @endif
                    <li class="list-inline-item"><a href="{{ $category->getDetailUrl() }}">{{$category->name}}</a></li>
                </ul>
            @endif
            <ul class="fp_meta float-right mb0">
                <li class="list-inline-item"><a class="service-wishlist icon {{ $row->isWishList() }}" data-id="{{$row->id}}" data-type="property"><i class="@if($row->hasWishList) fa fa-heart @else fa fa-heart-o @endif"></i></a></li>
            </ul>
        </div>
    </div>
</div>
