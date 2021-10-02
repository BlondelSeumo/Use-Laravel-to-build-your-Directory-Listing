@php
	$attr_request = explode("|", $key);
    if(isset($attr_request[1])) {
		$attr_id = $attr_request[1];
		$attr = \Modules\Core\Models\Attributes::where('service', 'property')->with(['terms'])->find($attr_id);
	}
@endphp
@if(isset($attr))
	<div class="col-auto home_form_input mb20-xsd">
		<label class="sr-only">{{$holder}}</label>
		<div class="input-group style1 mb-2 mb0-767">
			<div class="input-group-prepend">
				<div class="input-group-text pl0 pb0-767">{{$holder}}</div>
			</div>
			<div class="select-wrap style2-dropdown">
				<select name="terms[]" class=" form-control js-searchBox">
					<option value="0">{{$holder}}</option>
					@if(isset($attr))
						@foreach($attr->terms as $term)
							<option value="{{ $term->id}}" @if(in_array($term->id, Request::get('terms',[]))) selected @endif >{{ $term->name }}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
	</div>
@endif
