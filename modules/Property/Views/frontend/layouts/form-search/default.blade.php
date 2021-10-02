<form action="{{ route("property.search") }}" method="get" class="form  bgc-white bgct-767 pl30 pt10 pl0-767">
	<div class="form-row align-items-center justify-content-around">
	
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
					@includeIf('Property::frontend.layouts.form-search.fields.default.service_name', ['holder' => $field['title'], 'name' => 'service_name'])
					@break
					@case ('location')
					@includeIf('Property::frontend.layouts.form-search.fields.default.option',['list' => $list_location, 'holder' => $field['title'], 'name' => 'location_id'])
					@break
					@case ('category')
					@includeIf('Property::frontend.layouts.form-search.fields.default.option',['list' => $list_category,'holder' => $field['title'], 'name' => 'category_id'])
					@break
					@case ('price')
					@includeIf('Property::frontend.layouts.form-search.fields.default.price',['holder' => $field['title'], 'name' => 'price'])
					@break
					@default
					@includeIf('Property::frontend.layouts.form-search.fields.default.attribute',['key' => $field['field'],'holder' => $field['title']])
					@break
				@endswitch
			@endforeach
		@endif
		<div class="col-auto home_form_input2 mb20-xsd">
			<button type="submit" class="btn search-btn mb-2"><span class="flaticon-loupe"></span></button>
		</div>
	</div>
</form>

