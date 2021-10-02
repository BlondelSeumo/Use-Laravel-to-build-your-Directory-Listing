<?php  $languages = \Modules\Language\Models\Language::getActive();  ?>
@if(is_default_lang())
<div class="panel">
    <div class="panel-title"><strong>{{__("Price Range")}}</strong></div>
    <div class="panel-body">
        @if(is_default_lang())
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Price From")}}</label>
                        <input type="number" step="any" min="0" name="price_from" class="form-control" value="{{$row->price_from}}" placeholder="{{__("Price from")}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("To")}}</label>
                        <input type="number" step="any" min="0" name="price" class="form-control" value="{{$row->price}}" placeholder="{{__("To price")}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">{{__("Price Range (1-5)")}}</label>
                <input type="range" min="1" max="5" step="1" class="form-control" style="max-width: 300px" name="price_range" value="{{ $row->price_range ?? 1 }}">
            </div>
        @endif
    </div>
</div>
@endif
