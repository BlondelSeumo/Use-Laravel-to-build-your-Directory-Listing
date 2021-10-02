@php
	$attr_request = explode("|", $key);
    if(isset($attr_request[1])) {
		$attr_id = $attr_request[1];
		$attr = \Modules\Core\Models\Attributes::where('service', 'property')->with(['terms'])->find($attr_id);
	}
@endphp
@if(isset($attr))
    <li>
        <div class="ui_kit_checkbox sidebar_tag">
            <h4 class="title">{{ $holder }}</h4>
            <div class="wrapper">
                @if(isset($attr))
                <ul>
                    @foreach($attr->terms as $term)
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="terms[]" value="{{$term->id}}" id="customCheck{{$term->id}}"
                               @if(!empty(Request::input('terms')))
                                   @foreach(Request::input('terms') as $t)
                                       @if($t == $term->id)
                                            checked
                                        @endif
                                    @endforeach
                                @endif
                            >
                            <label class="custom-control-label" for="customCheck{{$term->id}}">{{$term->name}}</label>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </li>
@endif
