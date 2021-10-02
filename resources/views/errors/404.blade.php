
@extends('layouts.app')
@section('content')
    <div id="bc_content-wrapper">
        <section class="our-error">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="error_page footer_apps_widget">
                            <img class="img-fluid" src="{{get_file_url(setting_item("error_404_banner"),"full")}}" alt="error.png">
                            <div class="erro_code"><h1>{{ setting_item_with_lang('error_title') }}</h1></div>
                            <p>{{ setting_item_with_lang('error_desc') }}</p>
                            <form action="{{route('newsletter.subscribe')}}" class="form-inline mailchimp_form subcribe-form bc-subscribe-form bc-form footer_mailchimp_form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-row align-items-center">
                                    <label class="sr-only" for="inlineFormInputName">Name</label>
                                    <input type="text" name="email" class="form-control mb-2 mr-sm-2 email-input" id="inlineFormInputName" placeholder="Enter your email">
                                    <button type="submit" class="btn btn-primary mb-2">
                                        Subscribe <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    </button>
                                </div>
                                <div class="form-mess"></div>
                            </form>
                        </div>
                        <a class="btn_error" href="/">{{__('Back To Home')}}</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')

@endsection
