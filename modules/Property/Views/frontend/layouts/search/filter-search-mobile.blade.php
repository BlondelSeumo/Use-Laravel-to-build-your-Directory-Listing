<div class="listing_sidebar dn db-lg">
    <div class="sidebar_content_details style3">
        <div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
            <div class="sidebar_advanced_search_widget">
                <h4 class="mb25">{{ __("Advanced Search") }} <a class="filter_closed_btn float-right" href="#"><small>{{ __("Hide Filter") }}</small> <span class="flaticon-close"></span></a></h4>
                <form action="{{ route("property.search") }}" class="form" method="get">
                    <ul class="sasw_list style2 mb0">
                        @php $property_search_fields = setting_item_array('property_search_fields');
                        $property_search_fields = array_values(\Illuminate\Support\Arr::sort($property_search_fields, function ($value) {
                            return $value['position'] ?? 0;
                        }));
                        $list_number = [
                            (object)['id' => 1,'name' => '1'],
                            (object)['id' => 2,'name' => '2'],
                            (object)['id' => 3,'name' => '3'],
                            (object)['id' => 4,'name' => '4'],
                            (object)['id' => 5,'name' => '5'],
                            (object)['id' => 6,'name' => '6'],
                            (object)['id' => 7,'name' => '7'],
                            (object)['id' => 8,'name' => '8']
                        ];
                        $list_garages_value = [
                            (object)['id' => 1,'name' => 'Yes'],
                            (object)['id' => 2,'name' => 'No'],
                            (object)['id' => 3,'name' => 'Others']
                        ];
                        $current_year = (int)date("Y");
                        $list_year = [];
                        for($year = $current_year;$year >= ($current_year - 8);$year--) {
                            $list_year[] = (object)['id' => $year,'name' => $year];
                        }
                        @endphp

                        @if(!empty($property_search_fields))
                            @foreach($property_search_fields as $field)
                                @switch($field['field'])
                                    @case ('service_name')
                                    @include('Property::frontend.layouts.form-search.fields.sidebar.service_name', ['holder' => $field['title'], 'name' => 'service_name'])
                                    @break
                                    @case ('location')
                                    @include('Property::frontend.layouts.form-search.fields.sidebar.option',['list' => $list_location, 'holder' => $field['title'], 'name' => 'location_id'])
                                    @break
                                    @case ('category')
                                    @include('Property::frontend.layouts.form-search.fields.sidebar.option',['list' => $list_category,'holder' => $field['title'], 'name' => 'category_id'])
                                    @break
                                    @case ('price')
                                    @include('Property::frontend.layouts.form-search.fields.sidebar.price',['holder' => $field['title'], 'name' => 'price'])
                                    @break
                                    @case (null)
                                    @break
                                    @default
                                    @include('Property::frontend.layouts.form-search.fields.sidebar.attribute',['key' => $field['field'],'holder' => $field['title']])
                                    @break


                                @endswitch
                            @endforeach
                        @endif
                        <li>
                            <div class="search_option_button text-center mt25">
                                <button type="submit" class="btn btn-block btn-thm mb15">{{__('Search')}}</button>
                                <a class="tdu fz14 reset-filter" href="{{ request()->url() }}">{{ __("Reset Filter") }}</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
