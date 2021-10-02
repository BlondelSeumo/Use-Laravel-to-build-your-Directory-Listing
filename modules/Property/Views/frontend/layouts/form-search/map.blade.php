<form action="{{url( app_get_locale(false,false,'/').config('property.property_route_prefix') )}}" class="form bc_form_search_map d-flex justify-content-start" method="get" onsubmit="return false;">
	@php $property_map_search_fields = setting_item_array('property_map_search_fields');
    $property_map_search_fields = array_values(\Illuminate\Support\Arr::sort($property_map_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));
	@endphp
	@if(!empty($property_map_search_fields))
		@foreach($property_map_search_fields as $field)
			@switch($field['field'])
				@case ('service_name')
				@includeIf('Property::frontend.layouts.form-search.fields.map.service_name')
				@break
				@case ('location')
				@includeIf('Property::frontend.layouts.form-search.fields.map.location')
				@break
				@case ('category')
				@includeIf('Property::frontend.layouts.form-search.fields.map.category')
				@break
				@case ('attr')
				@includeIf('Property::frontend.layouts.form-search.fields.map.attr')
				@break
			@endswitch
		@endforeach
	@endif
	<div class="col-auto home_form_input2 pl10 pl0-lg">
		<button type="submit" class="btn search-btn mb-2"><span class="flaticon-loupe"></span></button>
	</div>
</form>
