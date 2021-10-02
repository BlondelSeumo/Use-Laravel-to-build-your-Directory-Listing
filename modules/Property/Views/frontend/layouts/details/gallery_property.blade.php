<?php $listGallery = $row->getGallery(); ?>
@if ($listGallery)

    <div class="col-lg-12 pl0 pr0 pl15-767 pr15-767">
        <div class="listing_single_description mb60">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb30">{{ __("Photo gallery") }}</h4>
                </div>
            </div>
            <div class="row">
                @foreach($listGallery as $key => $val)
                    @if($key <= 3)
                        <div class="col-6 col-md-6 col-lg-3">
                            <div class="gallery_item">
                                <img class="img-fluid img-circle-rounded w100" src="{{ $val['thumb'] }}" alt="lgs1.jpg">
                                @if($key >= 3)
                                    <div class="gallery_overlay style2 listing_single_v1"><a class="icon popup-img" href="{{ $val['large'] }}"><span class="fz14">+{{ count($listGallery) - 4 }}</span></a></div>
                                @else
                                    <div class="gallery_overlay style2"><a class="icon popup-img" href="{{ $val['large'] }}"><span class="flaticon-zoom"></span></a></div>
                                @endif
                            </div>
                        </div>
                    @else
                        <a class="hidden popup-img" href="{{ $val['large'] }}"></a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
 @endif
