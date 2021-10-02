@if($row->video)
<div class="col-lg-12 pl0 pl15-767">
    <div class="listing_single_video">
        <h4 class="mb30">{{ __("video") }}</h4>
        <div class="property_video">
            <div class="thumb">
                <img class="pro_img img-fluid w100" src="{{ \Modules\Media\Helpers\FileHelper::url($row->banner_image_id, 'full') }}" alt="video banner">
                <div class="overlay_icon">
                    <a class="video_popup_btn popup-youtube" href="{{ $row->video }}"><span class="fa fa-play body-color"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
