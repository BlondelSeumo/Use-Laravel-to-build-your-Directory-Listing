@extends('layouts.app',['container_class'=>'container-fluid','header_right_menu'=>true])
@section('head')
@endsection
@section('content')
    <section class="home-two p0">
        <div class="container-fluid p0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="home_two_map results_map">
                            <div class="map-loading d-none">
                                <div class="st-loader"></div>
                            </div>
                        <div id="bc_results_map" class="results_map_inner h660"  data-map-zoom="9" data-map-scroll="true"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="home_adv_srch_opt listing_page_v6 text-center">
                        <div class="wrapper">
                            <div class="home_adv_srch_form listing_page_v3">
                                <form class="bc_form_search bc_form_search_map1 bgc-white bgct-767 pl30 pt10 pl0-767" >
                                    @if(!empty(request()->query('_layout')))
                                        <input type="hidden" name="_layout" value="{{request()->query('_layout')}}">
                                        @endif
                                    <div class="form-row align-items-center justify-content-around">
                                        @includeIf('Property::frontend.layouts.form-search.map')
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Listing Grid View -->
    <section class="our-listing pb30-991">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="listing_filter_row dif db-767">
                            <div class="col-md-6 col-lg-7">
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="listing_list_style tac-767">
                                    @include('Property::frontend.layouts.search.loop.orderby')
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('Property::frontend.layouts.search-map.list-item')

                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        var bc_map_data = {
            markers:{!! json_encode($markers) !!}
        };
    </script>
    <script type="text/javascript" src="{{ asset('module/property/js/property-map.js?_ver='.config('app.asset_version')) }}"></script>
@endsection
