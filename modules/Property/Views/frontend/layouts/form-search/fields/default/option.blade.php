<?php
    if($name == 'location_id' ){
        $list_json_location = [];
        $traverse_location = function ($list_location, $prefix = '') use (&$traverse_location, &$list_json_location) {
            foreach ($list_location as $location) {
                $translate = $location->translateOrOrigin(app()->getLocale());
                $list_json_location[] = [
                    'id' => $location->id,
                    'title' => $prefix . ' ' . $translate->name,
                ];
                $traverse_location($location->children, $prefix . '-');
            }
        };
        $traverse_location($list_location);
        $placeHolder = __('Your city');
    }
    if($name == 'category_id'){
        $list_json = [];
        $traverse = function ($list_category, $prefix = '') use (&$traverse, &$list_json) {
            foreach ($list_category as $location) {
                $translate = $location->translateOrOrigin(app()->getLocale());
                $list_json[] = [
                    'id' => $location->id,
                    'title' => $prefix . ' ' . $translate->name,
                ];
                $traverse($location->children, $prefix . '-');
            }
        };
        $traverse($list_category);
        $placeHolder = __('Ex: shopping, restaurant...');
    }
?>
<div class="col-auto home_form_input mb20-xsd">
    <label class="sr-only">{{$holder}}</label>
    <div class="input-group style1 mb-2 mb0-767">
        <div class="input-group-prepend">
            <div class="input-group-text pl0 pb0-767">{{$holder}}</div>
        </div>
        <div class="select-wrap style2-dropdown">
            <select name="{{$name}}" class=" form-control js-searchBox">
                        <option value="0">{{$placeHolder}}</option>
                        @if($name != 'location_id' && $name != 'category_id')
                            @foreach($list as $item)
                                <option value="{{$item->id}}"
                                        @if(Request::input('property_type') == $item->id && $name == 'property_type') selected @endif
                                        @if(Request::input('bathroom') == $item->id && $name == 'bathroom') selected @endif
                                        @if(Request::input('bedroom') == $item->id && $name == 'bedroom') selected @endif
                                        @if(Request::input('garage') == $item->id && $name == 'garage') selected @endif
                                        @if(Request::input('year_built') == $item->id && $name == 'year_built') selected @endif
                                >{{$item->name}}</option>
                            @endforeach
                        @elseif($name == 'location_id')
                            @foreach($list_json_location as $item)
                                <option value="{{ $item['id'] }}"
                                        @if(Request::input('location_id') == $item['id'] && $name == 'location_id') selected @endif
                                >{{ $item['title'] }}</option>
                            @endforeach
                        @else
                            @foreach($list_json as $item)
                                <option value="{{ $item['id'] }}"
                                        @if(Request::input('category_id') == $item['id'] && $name == 'category_id') selected @endif
                                >{{ $item['title'] }}</option>
                            @endforeach
                        @endif
            
                    </select>
        </div>
    </div>
</div>
