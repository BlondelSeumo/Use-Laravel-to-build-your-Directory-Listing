<?php
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
?>
<li class="mb-3">
    <div class="search_option_two">
        <div class="candidate_revew_select">
            <select name="category_id" class="selectpicker w100 show-tick">
                <option value="0">{{ __('Property Category') }}</option>
                @foreach($list_json as $item)
                    <option value="{{$item['id']}}"  @if(Request::input('category_id') == $item['id'] && $name == 'category_id') selected @endif
                    >{{ $item['title'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</li>

<li class="mb-3">
    <div class="search_option_two">
        <div class="candidate_revew_select">
            <select name="location" class="selectpicker w100 show-tick">
                <option value="0">{{  __('Location') }}</option>
                @foreach($list_json_location as $item)
                    <option value="{{$item['id']}}"  @if(Request::input('location_id') == $item['id'] && $name == 'category_id') selected @endif
                    >{{ $item['title'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</li>
