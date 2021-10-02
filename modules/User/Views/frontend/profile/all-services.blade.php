@extends('layouts.app')
@section('content')
    <div class="page-profile-content page-template-content page-all-services">
        @includeIf('User::frontend.profile.top-bar')
        <!-- Listing Grid View -->
        <section class="our-listing pb30-991">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mb15">{{__(':name Listing',['name'=>$user->getDisplayName()] )}}</h4>
                            </div>
                            <div class="col-lg-12">
                                @if(view()->exists(ucfirst($type).'::frontend.profile.service'))
                                    @include(ucfirst($type).'::frontend.profile.service',['view_all'=>1])
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @includeIf('User::frontend.profile.sidebar')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection