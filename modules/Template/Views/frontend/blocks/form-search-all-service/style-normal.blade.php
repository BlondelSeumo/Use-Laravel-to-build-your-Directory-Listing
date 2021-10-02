<section class="home-one home1-overlay bg-img1" style="background-image:url({{$bg_image_url}})">
    <div class="container">
        <div class="row posr">
            <div class="col-lg-12">
                <div class="home_content home1">
                    <div class="home-text text-center">
                        @if(!empty($title))
                        <h2 class="fz50">{{$title}}</h2>
                        @endif
                        @if(!empty($sub_title))
                        <p class="fz18 color-white">{{$sub_title}}</p>
                            @endif
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-8">
                            <div class="home_adv_srch_opt text-center">
                                <div class="wrapper">
                                    <div class="home_adv_srch_form ">
                                    @if(empty($hide_form_search))
                                            <div class="">
                                                <ul class="nav nav-tabs @if(!empty($hide_tab_form_search)) d-none @endif" role="tablist">
                                                    @if(!empty($service_types))
                                                        @php $number = 0; @endphp
                                                        @foreach ($service_types as $service_type)
                                                            @php
                                                                $allServices = get_bookable_services();
																if(empty($allServices[$service_type])) continue;
																$module = new $allServices[$service_type];
                                                            @endphp
                                                            <li role="bc_{{$service_type}}">
                                                                <a href="#bc_{{$service_type}}" class="@if($number == 0) active @endif" aria-controls="bc_{{$service_type}}" role="tab" data-toggle="tab">
                                                                    <i class="{{ $module->getServiceIconFeatured() }}"></i>
                                                                    {{ !empty($modelBlock["title_for_".$service_type]) ? $modelBlock["title_for_".$service_type] : $module->getModelName() }}
                                                                </a>
                                                            </li>
                                                            @php $number++; @endphp
                                                        @endforeach
                                                    @endif
                                                </ul>
                                                <div class="tab-content mt-0">
                                                    @if(!empty($service_types))
                                                        @php $number = 0; @endphp
                                                        @foreach ($service_types as $service_type)
                                                            @php
                                                                $allServices = get_bookable_services();
																if(empty($allServices[$service_type])) continue;
																$module = new $allServices[$service_type];
                                                            @endphp
                                                            <div role="tabpanel" class="tab-pane @if($number == 0) active @endif" id="bc_{{$service_type}}">
                                                                @include(ucfirst($service_type).'::frontend.layouts.search.form-search')
                                                            </div>
                                                            @php $number++; @endphp
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if($enable_category_box and !empty($list_property_category_data) && count($list_property_category_data) > 0)
                                    @includeIf('Template::frontend.blocks.form-search-all-service.elements.property-category',['is_mobile'=>true])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if($enable_category_box and  !empty($list_property_category_data) && count($list_property_category_data) > 0)
    @includeIf('Template::frontend.blocks.form-search-all-service.elements.property-category')
@endif
