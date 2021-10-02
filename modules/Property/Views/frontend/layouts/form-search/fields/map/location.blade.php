<?php
$location_name = "";
$list_json = [];
$traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json , &$location_name) {
    foreach ($locations as $location) {
        $translate = $location->translateOrOrigin(app()->getLocale());
        if (request()->query('location_id') == $location->id){
            $location_name = $translate->name;
        }
        $list_json[] = [
                'id' => $location->id,
                'title' => $prefix . ' ' . $translate->name,
        ];
        $traverse($location->children, $prefix . '-');
    }
};
$traverse($list_location);
?>

<div class="col-auto home_form_input mr15 mr0-lg">
    <div class="input-group style2 mb-2 mb0-767 pl10 pl0-lg">
        <div class="input-group-prepend">
            <div class="input-group-text pb0-767">{{__("Where")}}</div>
        </div>
        <div class="select-wrap style2-dropdown">
            <select name="location_id" class="selectpicker">
                <option value="0">{{__('Location')}}</option>
            @foreach($list_json as $localtion)
                    <option value="{{$localtion['id']}}">{{$localtion['title']}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>