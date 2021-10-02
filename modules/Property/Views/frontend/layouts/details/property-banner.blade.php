<div class="home10-mainslider">
    <?php $banner_images = $row->getBannerImages(); ?>
    @if($banner_images)
    <div class="container-fluid p0">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-banner-wrapper home10">
                    <div class="banner-style-one owl-theme owl-carousel">
                        @foreach($banner_images as $key => $val)
                        <div class="slide slide-one" style="background-image: url({{ $val['large'] }});height: 650px;"></div>
                        @endforeach
                    </div>
                    <div class="carousel-btn-block banner-carousel-btn">
                        <span class="carousel-btn left-btn"><i class="flaticon-arrow-pointing-to-left left"></i></span>
                        <span class="carousel-btn right-btn"><i class="flaticon-arrow-pointing-to-right right"></i></span>
                    </div><!-- /.carousel-btn-block banner-carousel-btn -->
                </div><!-- /.main-banner-wrapper -->
            </div>
        </div>
    </div>
    @endif
    <div class="container ">
        <div class="row listing_single_row style2">
            <div class="col-lg-8 col-xl-7">
                <div class="single_property_title listing_single_v1">
                    <div class="media">
                        <div class="media-body mt20">
                            <h2 class="mt-0">{{ $row->title }}</h2>
                            <ul class="mb40 agency_profile_contact listing_single_v1">
                                @if($row->phone)
                                <li class="list-inline-item"><a href="tel:{{ $row->phone }}"><span class="flaticon-phone"></span> {{ $row->phone }}</a></li>
                                @endif
                                @if($row->location)
                                <li class="list-inline-item"><a href="{{ $row->location->getDetailUrl() }}"><span class="flaticon-pin"></span> {{ $row->location->name }}</a></li>
                                @endif
                            </ul>

                            <div class="sspd_review listing_single_v1">
                                <ul class="mb0">
                                    @if(setting_item('property_enable_review') and $reviewData['total_review'] > 0)
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
                                            )
                                        </li>
                                    @endif
                                    @if($row->price_range)
                                    <li class="list-inline-item ml20">
                                        <a class="price_range" href="#">@for($i=0; $i < $row->price_range; $i++)$@endfor</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-5">
                <div class="single_property_social_share listing_single_v1 mt80 mt0-lg">
                    <div class="spss style2 listing_single_v1 mt30 float-left fn-lg">
                        <ul class="mb0">
                            <li class="list-inline-item icon social-share">
                                <a href="#"><span class="flaticon-upload"></span></a>
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
                            </li>
                            <li class="list-inline-item"><a class="text-white" href="#">{{ __("Share") }}</a></li>
                            <li class="list-inline-item icon">
                                <a href="#" class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                                    <span class="fa fa-heart-o"></span>
                                </a>
                            </li>
                            <li class="list-inline-item"><a class="text-white" href="#">{{ $row->isWishList() ? __("Saved") :__("Save") }}</a></li>
                        </ul>
                    </div>
                    @if(setting_item('property_enable_review'))
                    <div class="price listing_single_v1 mt25 float-right fn-lg">
                        <a href="#bc-reviews" class="btn btn-thm spr_btn">{{ __("Submit Review") }}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
