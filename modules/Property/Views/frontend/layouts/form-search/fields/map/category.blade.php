<?php
$location_name = "";
$list_json = [];
$traverse = function ($list_category, $prefix = '') use (&$traverse, &$list_json) {
    foreach ($list_category as $category) {
        $translate = $category->translateOrOrigin(app()->getLocale());
        $list_json[] = [
                'id' => $category->id,
                'title' => $prefix . ' ' . $translate->name,
        ];
        $traverse($category->children, $prefix . '-');
    }
};
$traverse($list_category);
?>
<div class="col-auto home_form_input mr15 mr0-lg">
    <div class="input-group style2 mb-2 mb0-767 pl10 pl0-lg">
        <div class="input-group-prepend">
            <div class="input-group-text pb0-767">{{__("What")}}</div>
        </div>
        <div class="select-wrap style2-dropdown">
            <select name="location_id" class="selectpicker">
                <option value="0">{{__('Ex: shopping, restaurant...')}}</option>
            @foreach($list_json as $category)
                    <option value="{{$category['id']}}">{{$category['title']}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>