<section class="divider home-style1 parallax" data-stellar-background-ratio="0.2" style="background-image: url('{{get_file_url($background_image ?? "","full")}}') !important">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="business_exposer text-center">
                    @if(!empty($title))
                        <h2 class="title text-white mb20"> {{$title}}</h2>
    
                    @endif
                    @if(!empty($sub_title))
                      <p class="text-white mb35"> {{$sub_title}}</p>
                        @endif
                        @if(!empty($link_title))
                            <a class="btn exposer_btn" href="{{$link_more??'#'}}">{{$link_title}}</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>
