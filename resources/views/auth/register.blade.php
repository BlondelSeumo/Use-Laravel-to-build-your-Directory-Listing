@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center bc-login-form-page bc-login-page">
            <div class="col-md-5">
                <div class="">
                    <h4 class="form-title">{{ __('Register') }}</h4>
                    @include('Layout::auth.register-form',['captcha_action'=>'register_normal'])
                </div>
            </div>
        </div>
    </div>
@endsection
