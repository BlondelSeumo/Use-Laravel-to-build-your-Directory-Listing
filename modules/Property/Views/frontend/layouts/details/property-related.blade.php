@if(count($property_related) > 0)
    <section class="feature-property bgc-f4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="main-title text-center">
                        <h2>{{ __("Recently Added") }}</h2>
                        <p>{{ __("Discover some of the most popular listings in :location based on user reviews and ratings.", ['location' => $row->location ? $row->location->name : '']) }}</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="popular_listing_slider1">
                        @foreach($property_related as $k => $item)
                            <div class="item">
                                @include('Property::frontend.layouts.search.loop.loop-gird',['row'=> $item,'include_param'=>0])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
