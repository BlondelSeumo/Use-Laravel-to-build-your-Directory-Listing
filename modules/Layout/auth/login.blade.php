@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center bc-login-form-page bc-login-page">
        <div class="col-md-5">
            <div class="">
                <h4 class="form-title">{{ __('Login') }}</h4>
                @include('Layout::auth.login-form',['captcha_action'=>'login_normal'])
            </div>
        </div>
    </div>
</div>
@endsection
