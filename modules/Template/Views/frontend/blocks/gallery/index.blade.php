<!-- gallery -->
@if($list_item)
    <section class="about-section pb70 pt0">
        <div class="container">
            <div class="row">
                @foreach ($list_item as $key => $item)
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="gallery_item">
                            <img class="img-fluid img-circle-rounded w100" src="{{ get_file_url($item['gallery_item_img'],'full') ?? "" }}">
                            <div class="gallery_overlay">
                                <a class="icon popup-img" href="{{ get_file_url($item['gallery_item_img']) ?? "" }}">
                                    <span class="flaticon-zoom"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
