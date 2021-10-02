<!-- Inner Page Breadcrumb -->
@php
$contact_banner = get_file_url(setting_item("contact_banner"),"full");
@endphp
<section class="inner_page_breadcrumb" style="background-image: url({{ $contact_banner }})" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="breadcrumb_content">
                    <h2 class="breadcrumb_title">{{ __("Contact Us") }}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __("Home") }}</a></li>
                        @if(isset($breadcrumbs) && count($breadcrumbs) > 0)
                            @foreach($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-item active" aria-current="page">
                                    @if(!empty($breadcrumb['url']))
                                        <a href="{{url($breadcrumb['url'])}}">{{ $breadcrumb['name'] }}</a>
                                    @else
                                        {{$breadcrumb['name']}}
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Contact -->
<section class="our-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="contact_info_widget mb30-smd">
                    <h3 class="m_title">{{ setting_item_with_lang('our_offices_title') }}</h3>
                    @php
                    $list_info_contact = setting_item_with_lang('list_info_contact');
                    if(!empty($list_info_contact)) {$list_info_contact = json_decode($list_info_contact,true);}
                    if(empty($list_info_contact) or !is_array($list_info_contact)){
                        $list_info_contact = [];
                    }
                    @endphp
                    @foreach($list_info_contact as $key => $item)
                    <div class="ciw_box @if($key != count($list_info_contact) - 1) mb50 @endif">
                        <h4 class="title">{{ $item['title'] }}</h4>
                        {!! clean(@$item['content']) !!}
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form_grid">
                    <h3 class="title mb5"><?php setting_item_with_lang('contact_form_title'); ?></h3>
                    <div role="form" class="form_wrapper" lang="en-US" dir="ltr">
                        <form class="contact_form bc-contact-block-form" id="contact_form" name="contact_form" method="post" action="{{ route("contact.store") }}" novalidate="novalidate">
                            {{csrf_field()}}
                            <div style="display: none;">
                                <input type="hidden" name="g-recaptcha-response" value="">
                            </div>
                            @include('admin.message')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_name" name="name" class="form-control" required="required" type="text" placeholder="{{ __("Name") }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_email" name="email" class="form-control required email" required="required" type="email" placeholder="{{ __("Email") }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="form_phone" name="phone" class="form-control required phone" required="required" type="text" placeholder="{{ __("Phone") }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control required" rows="8" required="required" placeholder="{{ __("Your Message") }}"></textarea>
                                    </div>
                                    <div class="form-group">
                                        {{recaptcha_field('contact')}}
                                    </div>
                                    <div class="form-group mb0">
                                        <button type="submit" class="submit btn btn-lg btn-thm">{{ __("Send Message") }} <i class="fa fa-spinner fa-pulse fa-fw"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-mess"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our-map p0">
    <div class="container-fluid p0">
        <div class="row">
            <div class="col-lg-12">
                <div class="h600" id="map-canvas"></div>
            </div>
        </div>
    </div>
</section>
@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            @if(setting_item('map_contact_lat') && setting_item('map_contact_long'))
            new BravoMapEngine('map-canvas', {
                disableScripts: true,
                fitBounds: true,
                center: [{{ setting_item('map_contact_lat') }}, {{ setting_item('map_contact_long') }}],
                zoom:{{setting_item('map_contact_zoom') ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{setting_item('map_contact_lat')}}, {{setting_item('map_contact_long')}}], {
                        icon_options: {}
                    });
                }
            });
            @endif
        })
    </script>
@endsection
