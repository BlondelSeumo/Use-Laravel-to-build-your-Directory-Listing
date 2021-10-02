<?php use Modules\Location\Models\Location;use Modules\Property\Models\PropertyCategory;;?>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Site Information")}}</h3>
        <p class="form-group-desc">{{__('Information of your website for customer and goole')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="">{{__("Site title")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="site_title" value="{{setting_item_with_lang('site_title',request()->query('lang'))}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Site Desc")}}</label>
                    <div class="form-controls">
                        <textarea name="site_desc" class="form-control" cols="30" rows="7">{{setting_item_with_lang('site_desc',request()->query('lang'))}}</textarea>
                    </div>
                </div>

                @if(is_default_lang())
                <div class="form-group">
                    <label class="" >{{__("Favicon")}}</label>
                    <div class="form-controls form-group-image">
                        {!! \Modules\Media\Helpers\FileHelper::fieldUpload('site_favicon',$settings['site_favicon'] ?? "") !!}
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Date format")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="date_format" value="{{$settings['date_format'] ?? 'm/d/Y' }}">
                    </div>
                </div>
                @endif
                @if(is_default_lang())
                <div class="form-group">
                    <label>{{__("Timezone")}}</label>
                    @php
                        $path = resource_path('module/core/timezone.json');
                        $timezones = json_decode(\Illuminate\Support\Facades\File::get($path));
                    @endphp
                    <div class="form-controls">
                        <select name="site_timezone" class="form-control">
                            <option value="UTC">{{__("-- Default --")}}</option>
                            @if(!empty($timezones))
                                @foreach($timezones as $item=>$value)
                                    <option @if($item == ($settings['site_timezone'] ?? '') ) selected @endif value="{{$item}}">{{$value}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label>{{__("Change the first day of week for the calendars")}}</label>
                    <div class="form-controls">
                        <select name="site_first_day_of_the_weekin_calendar" class="form-control">
                            <option @if("1" == ($settings['site_first_day_of_the_weekin_calendar'] ?? '') ) selected @endif value="1">{{__("Monday")}}</option>
                            <option @if("0" == ($settings['site_first_day_of_the_weekin_calendar'] ?? '') ) selected @endif value="0">{{__("Sunday")}}</option>
                        </select>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Language')}}</h3>
        <p class="form-group-desc">{{__('Change language of your websites')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <label>{{__("Select default language")}}</label>
                        <div class="form-controls">
                            <select name="site_locale" class="form-control">
                                <option value="">{{__("-- Default --")}}</option>
                                @php
                                    $langs = \Modules\Language\Models\Language::getActive();
                                @endphp

                                @foreach($langs as $lang)
                                    <option @if($lang->locale == ($settings['site_locale'] ?? '') ) selected @endif value="{{$lang->locale}}">{{$lang->name}} - ({{$lang->locale}})</option>
                                @endforeach
                            </select>
                            <p><i><a href="{{url('admin/module/language')}}">{{__("Manage languages here")}}</a></i></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Enable Multi Languages")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" @if(setting_item('site_enable_multi_lang') ?? '' == 1) checked @endif name="site_enable_multi_lang" value="1">{{__('Enable')}}</label>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@if(is_default_lang())
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Contact Information')}}</h3>
            <p class="form-group-desc">{{__('How your customer can contact to you')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>{{__("Admin Email")}}</label>
                        <div class="form-controls">
                            <input type="email" class="form-control" name="admin_email" value="{{$settings['admin_email'] ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Email Form Name")}}</label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="email_from_name" value="{{$settings['email_from_name'] ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Email Form Address")}}</label>
                        <div class="form-controls">
                            <input type="email" class="form-control" name="email_from_address" value="{{$settings['email_from_address'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title">{{__('Homepage')}}</h3>
            <p class="form-group-desc">{{__('Change your homepage content')}}</p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label>{{__("Page for Homepage")}}</label>
                        <div class="form-controls">
                            <?php
                            $template = !empty($settings['home_page_id']) ? \Modules\Page\Models\Page::find($settings['home_page_id']) : false;

                            \App\Helpers\AdminForm::select2('home_page_id', [
                                'configs' => [
                                    'ajax' => [
                                        'url'      => url('/admin/module/page/getForSelect2'),
                                        'dataType' => 'json'
                                    ]
                                ]
                            ],
                                !empty($template->id) ? [$template->id, $template->title] : false
                            )
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Header & Footer Settings')}}</h3>
        <p class="form-group-desc">{{__('Change your options')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__("Logo")}}</label>
                                <div class="form-controls form-group-image">
                                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('logo_id',$settings['logo_id'] ?? '') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__("Logo white")}}</label>
                                <div class="form-controls form-group-image form-group-image-white">
                                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('logo_white_id',$settings['logo_white_id'] ?? '') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Logo Footer")}}</label>
                        <div class="form-controls form-group-image">
                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('footer_logo_id',$settings['footer_logo_id'] ?? '') !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>{{__("Enable search on header")}}</label>
                        <div class="form-controls">
                            <label><input type="checkbox" @if(setting_item('enable_search_header') ?? '' == 1) checked @endif name="enable_search_header" value="1">{{__('Enable')}}</label>
                        </div>
                    </div>

                    <div data-condition="enable_search_header:is(1)">
                        <div class="form-group" data-condition="enable_search_header:is(1)">
                            <label>{{__("Enable category box")}}</label>
                            <div class="form-controls">
                                <label><input type="checkbox" @if(setting_item('enable_category_box') ?? '' == 1) checked @endif name="enable_category_box" value="1">{{__('Enable')}}</label>
                            </div>
                        </div>
                        <div class="form-group" data-condition="enable_category_box:is(1)">
                            <label >{{__("Select category")}}</label>
                            <div class="terms-scrollable">
                                <?php

                                $traverse = function ($categories, $prefix = '') use (&$traverse) {
                                foreach ($categories as $category) {
                                $checked = '';
                                if(in_array($category->id, !empty(setting_item('header_category_box'))?json_decode(setting_item('header_category_box'),true):[]))
                                    $checked = 'checked';
                                ?>
                                <label class="term-item">
                                    <input {{ $checked }} type="checkbox" name="header_category_box[]" value="{{$category->id}}">
                                    <span class="term-name">{{$prefix . ' ' . $category->name}}</span>
                                </label>
                                <?php
                                $traverse($category->children, $prefix . '-');
                                }
                                };
                                $traverse(PropertyCategory::where('status', 'publish')->get()->toTree());
                                ?>
                            </div>
                        </div>
                        <div class="form-group" data-condition="enable_search_header:is(1)">
                            <label>{{__("Enable Location box")}}</label>
                            <div class="form-controls">
                                <label><input type="checkbox" @if(setting_item('enable_location_box') ?? '' == 1) checked @endif name="enable_location_box" value="1">{{__('Enable')}}</label>
                            </div>
                        </div>
                        <div class="form-group" data-condition="enable_location_box:is(1)">
                            <label >{{__("Select Locations")}}</label>
                            <div class="terms-scrollable">
                                <?php
                                $traverse = function ($categories, $prefix = '') use (&$traverse) {
                                foreach ($categories as $category) {
                                $checked = '';
                                if(in_array($category->id, !empty(setting_item('header_location_box'))?json_decode(setting_item('header_category_box'),true):[]))
                                    $checked = 'checked';
                                ?>
                                <label class="term-item">
                                    <input {{ $checked }} type="checkbox" name="header_location_box[]" value="{{$category->id}}">
                                    <span class="term-name">{{$prefix . ' ' . $category->name}}</span>
                                </label>
                                <?php
                                $traverse($category->children, $prefix . '-');
                                }
                                };
                                $traverse(Location::where('status', 'publish')->get()->toTree());
                                ?>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label>{{__("Topbar Left Text")}}</label>
                    <div class="form-controls">
                        <div id="topbar_left_text_editor" class="ace-editor" style="height: 400px" data-theme="textmate" data-mod="html">{{setting_item_with_lang('topbar_left_text',request()->query('lang'))}}</div>
                        <textarea class="d-none" name="topbar_left_text" > {{ setting_item_with_lang('topbar_left_text',request()->query('lang')) }} </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Footer List Widget")}}</label>
                    <div class="form-controls">
                        <div class="form-group-item">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-3">{{__("Title")}}</div>
                                        <div class="col-md-2">{{__('Size')}}</div>
                                        <div class="col-md-6">{{__('Content')}}</div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    $social_share = setting_item_with_lang('list_widget_footer',request()->query('lang'));
                                    if(!empty($social_share)) $social_share = json_decode($social_share,true);
                                    if(empty($social_share) or !is_array($social_share))
                                        $social_share = [];
                                    ?>
                                    @foreach($social_share as $key=>$item)
                                        <div class="item" data-number="{{$key}}">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="text" name="list_widget_footer[{{$key}}][title]" class="form-control" value="{{$item['title']}}">
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-control" name="list_widget_footer[{{$key}}][size]">
                                                        <option @if(!empty($item['size']) && $item['size']=='2') selected @endif value="2">1/6</option>
                                                        <option @if(!empty($item['size']) && $item['size']=='3') selected @endif value="3">1/4</option>
                                                        <option @if(!empty($item['size']) && $item['size']=='4') selected @endif value="4">1/3</option>
                                                        <option @if(!empty($item['size']) && $item['size']=='6') selected @endif value="6">1/2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea name="list_widget_footer[{{$key}}][content]" rows="5" class="form-control">{{$item['content']}}</textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-right">
                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
                                </div>
                                <div class="g-more hide">
                                    <div class="item" data-number="__number__">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" __name__="list_widget_footer[__number__][title]" class="form-control" value="">
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" __name__="list_widget_footer[__number__][size]">
                                                    <option value="3">1/4</option>
                                                    <option value="4">1/3</option>
                                                    <option value="6">1/2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea __name__="list_widget_footer[__number__][content]" class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Footer Text Left")}}</label>
                    <div class="form-controls">
                        <textarea name="footer_text_left" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('footer_text_left',request()->query('lang')) }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Footer Text Right")}}</label>
                    <div class="form-controls">
                        <textarea name="footer_text_right" class="d-none has-ckeditor" cols="30" rows="10">{{setting_item_with_lang('footer_text_right',request()->query('lang')) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__("Page contact settings")}}</h3>
        <p class="form-group-desc">{{__('Settings for contact page')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <label>{{__("Contact banner")}}</label>
                        <div class="form-controls form-group-image">
                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('contact_banner',setting_item('contact_banner')) !!}
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label class="">{{__("Contact form title")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="contact_form_title" value="{{setting_item_with_lang('contact_form_title',request()->query('lang'),"Get in touch with us")}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-title"><strong>{{__("Our Offices")}}</strong></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="">{{__("Our offices title")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="our_offices_title" value="{{setting_item_with_lang('our_offices_title',request()->query('lang'),"Our Offices")}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-controls">
                        <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-3">{{__("Office")}}</div>
                                        <div class="col-md-6">{{__('Content')}}</div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    $list_info_contact = setting_item_with_lang('list_info_contact',request()->query('lang'));
                                    if(!empty($list_info_contact)) $list_info_contact = json_decode($list_info_contact,true);
                                    if(empty($list_info_contact) or !is_array($list_info_contact))
                                        $list_info_contact = [];
                                    ?>
                                    @foreach($list_info_contact as $key=>$item)
                                        <div class="item" data-number="{{$key}}">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="text" name="list_info_contact[{{$key}}][title]" class="form-control" value="{{$item['title']}}">
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea name="list_info_contact[{{$key}}][content]" rows="8" class="form-control">{{$item['content']}}</textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-right">
                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
                                </div>
                                <div class="g-more hide">
                                    <div class="item" data-number="__number__">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" __name__="list_info_contact[__number__][title]" class="form-control" value="">
                                            </div>

                                            <div class="col-md-8">
                                                <textarea __name__="list_info_contact[__number__][content]" class="form-control" rows="8"></textarea>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>

        @php
            $map_contact_lat = setting_item('map_contact_lat');
            $map_contact_long = setting_item('map_contact_long');
            $map_contact_zoom = setting_item('map_contact_zoom');
        @endphp
        <div class="panel">
            <div class="panel-title"><strong>{{__("Contact Locations")}}</strong></div>
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <label class="control-label">{{__("The geographic coordinate")}}</label>
                        <div class="control-map-group">
                            <div id="map_content"></div>
                            <div class="g-control">
                                <div class="form-group">
                                    <label>{{__("Map Latitude")}}:</label>
                                    <input type="text" name="map_contact_lat" class="form-control" value="{{ $map_contact_lat }}" onkeydown="return event.key !== 'Enter';">
                                </div>
                                <div class="form-group">
                                    <label>{{__("Map Longitude")}}:</label>
                                    <input type="text" name="map_contact_long" class="form-control" value="{{ $map_contact_long }}" onkeydown="return event.key !== 'Enter';">
                                </div>
                                <div class="form-group">
                                    <label>{{__("Map Zoom")}}:</label>
                                    <input type="text" name="map_contact_zoom" class="form-control" value="{{ $map_contact_zoom }}" onkeydown="return event.key !== 'Enter';">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title">{{__('Page 404 settings')}}</h3>
        <p class="form-group-desc">{{__('Settings for 404 error page')}}</p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                @if(is_default_lang())
                    <div class="form-group">
                        <label>{{__("Error 404 banner")}}</label>
                        <div class="form-controls form-group-image">
                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('error_404_banner',setting_item('error_404_banner')) !!}
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label>{{__("Error title")}}</label>
                    <div class="form-controls">
                        <input type="text" class="form-control" name="error_title" value="{{setting_item_with_lang('error_title',request()->query('lang'), 'Ohh! Page Not Found')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__("Error desc")}}</label>
                    <div class="form-controls">
                        <textarea name="error_desc" class="form-control" cols="30" rows="7">{{setting_item_with_lang('error_desc',request()->query('lang'), 'We can’t seem to find the page you’re looking for')}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script.body')
    <script src="{{asset('libs/ace/src-min-noconflict/ace.js')}}" type="text/javascript" charset="utf-8"></script>
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        (function ($) {
            $('.ace-editor').each(function () {
                var editor = ace.edit($(this).attr('id'));
                editor.setTheme("ace/theme/"+$(this).data('theme'));
                editor.session.setMode("ace/mode/"+$(this).data('mod'));
                var me = $(this);

                editor.session.on('change', function(delta) {
                    // delta.start, delta.end, delta.lines, delta.action
                    me.next('textarea').val(editor.getValue());
                });
            });

            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{ !empty($map_contact_lat) ? $map_contact_lat : "51.505"}}, {{ !empty($map_contact_long) ? $map_contact_long : "-0.09"}}],
                zoom:{{ !empty($map_contact_zoom)? $map_contact_zoom : "8"}},
                ready: function (engineMap) {
                    @if($map_contact_lat && $map_contact_long)
                    engineMap.addMarker([{{$map_contact_lat}}, {{$map_contact_long}}], {
                        icon_options: {}
                    });
                    @endif
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_contact_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_contact_long]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_contact_zoom]").attr("value", zoom);
                    });
                }
            })

        })(jQuery)
    </script>
@endsection
