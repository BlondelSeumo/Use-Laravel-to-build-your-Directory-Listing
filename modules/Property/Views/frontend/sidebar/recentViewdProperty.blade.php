@php
    $recentProperty = \Modules\Property\Models\Property::OrderBy('recent_view')->limit(3)->get();
@endphp

<div class="sidebar_feature_listing">
    <h4 class="title">{{__('Recently Viewed')}}</h4>
    @foreach($recentProperty as $item)
    <div class="media">
        <img class="align-self-start mr-3" src="{{ $item->image_url}}" alt="{{$item->title}}" style="width: 90px; height: 80px">
        <div class="media-body">
            <a target="_blank" href="{{$item->getDetailUrl()}}">
                <h5 class="mt-0 post_title">{{$item->title}}</h5>
            </a>
            <a href="{{$item->getDetailUrl()}}">{{ $item->display_price }}</a>
            <ul class="mb0">
                <li class="list-inline-item">{{__('Beds')}}: {{$item->bed}}</li>
                <li class="list-inline-item">{{__('Baths')}}: {{$item->bathroom}}</li>
                <li class="list-inline-item">{{__('Sq Ft')}}: {!! size_unit_format($item->square) !!}</li>
            </ul>
        </div>
    </div>
    @endforeach
</div>