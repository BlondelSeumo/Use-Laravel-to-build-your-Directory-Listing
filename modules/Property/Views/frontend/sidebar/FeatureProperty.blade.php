@php
    $listCat = \Modules\Property\Models\Property::where("is_featured",1)->get();
@endphp
@if(!empty($listCat))
    <div class="terms_condition_widget">
        <h4 class="title">{{__('Featured Properties')}}</h4>
        <div class="sidebar_feature_property_slider">
            @foreach($listCat as $item)
            <div class="item">
                <div class="feat_property home7">
                    <div class="thumb">
                        <img class="img-whp" src="{{$item->image_url}}" alt="{{$item->title}}">
                        <div class="thmb_cntnt">
                            <ul class="tag mb0">
                                <li class="list-inline-item"><a>{{$item->property_type == 1 ? __('For Buy') : __('For Rent')}}</a></li>
                                @if($item->is_featured == 1)
                                <li class="list-inline-item"><a>{{__('Featured')}}</a></li>
                                @else
                                <li></li>
                                @endif
                            </ul>
                            <a class="fp_price" href="#">{{ $item->display_price }}<small></small></a>
                            <a href="{{$item->getDetailUrl()}}"><h4 class="posr color-white">{{$item->title}}</h4></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endif
