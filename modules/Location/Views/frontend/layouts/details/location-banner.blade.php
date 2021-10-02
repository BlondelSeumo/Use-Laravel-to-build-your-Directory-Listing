<div class="home-listing-slider">
    @php
        $banner_images_str = $row->banner_images;
        if(empty($banner_images_str)) $banner_images_str = $row->image_id;
    @endphp
    @if($banner_images_str)
        @php
            $banner_images = explode(',', $banner_images_str);
        @endphp
        <div class="container-fluid p0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-banner-wrapper">
                        <div class="banner-style-one owl-theme owl-carousel">
                            @foreach($banner_images as $key => $val)
                                <div class="slide slide-one" style="background-image: url({{ \Modules\Media\Helpers\FileHelper::url($val, 'full') }});height: 650px;"></div>
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
    <div class="container home_iconbox_container">
        <div class="row posr">
            <div class="col-lg-12">
                <div class="home_content listing slider_style">
                    <div class="home-text home6 text-center">
                        <h2 class="fz50 color-white">{{ $row->name }}</h2>
                        @if($row->content)
                            <p class="fz18 color-white">{!! clean(@$row->content) !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

