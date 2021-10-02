<section class="inner_page_breadcrumb mb100" style="background-image: url('{{get_file_url($background_image ?? "","full")}}') !important">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="breadcrumb_content">
                    @if(!empty($title))
                    <h2 class="breadcrumb_title">{{$title}}</h2>
                    @endif
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        @if(!empty($title_item_active))
                            <li class="breadcrumb-item active" aria-current="page">{{$title_item_active}}</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>