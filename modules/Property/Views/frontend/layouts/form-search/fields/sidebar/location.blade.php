<div class="form-group">
    <i class="field-icon fa icofont-map"></i>
    <div class="form-content">
        <?php
        $location_name = "";
        $list_json = [];
        $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json , &$location_name) {
            foreach ($locations as $location) {
                $translate = $location->translateOrOrigin(app()->getLocale());
                if (Request::query('location_id') == $location->id){
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
        <li>
            <div class="search_option_two">
                <div class="candidate_revew_select">
                    <select name="location_id" class="selectpicker w100 show-tick">
                        @foreach($list_location as $localtion)
                        <option value="0">{{__('Location')}}</option>
                        <option value="{{$localtion->id}}">{{$localtion->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </li>
    </div>
</div>