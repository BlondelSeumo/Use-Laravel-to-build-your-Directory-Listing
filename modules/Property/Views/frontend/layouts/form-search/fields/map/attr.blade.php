@if(!empty($field['attr']))
    @php $attr = \Modules\Core\Models\Attributes::find($field['attr']); $list_cat_json = [];
        $attr_translate = $attr->translateOrOrigin(app()->getLocale());
        if(request()->query('term_id'))
            $selected = \Modules\Core\Models\Terms::find(request()->query('term_id'));
        else $selected = false;
        $list_cat_json = [];
    @endphp
    @if($attr)
        <div class="col-auto home_form_input mr15 mr0-lg">
            <div class="input-group style2 mb-2 mb0-767 pl10 pl0-lg">
                <div class="input-group-prepend">
                    <div class="input-group-text pb0-767">{{__("Attributes")}}</div>
                </div>
                <div class="select-wrap style2-dropdown">
                    <select name="term_id" class="selectpicker">
                        @foreach($attr->terms as $term)
                            @php( $translate = $term->translateOrOrigin(app()->getLocale()));
                            <option value="0">{{__('All :name',['name'=>$attr_translate->name])}}</option>
                            <option value="{{$translate->id}}">{{$translate->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    @endif
@endif
