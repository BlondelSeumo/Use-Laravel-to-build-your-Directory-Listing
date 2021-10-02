@extends('layouts.user')
@section('head')

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 mb15">
            <div class="breadcrumb_content">
                <div class="row">
                    <div class="col-6">
                        <h2 class="breadcrumb_title">{{ __("Bookmarks") }}</h2>
                    </div>
                    <div class="col-6 text-right">
                        <p>{{ __("Ready to jump back in?") }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            @include('admin.message')
        </div>
    </div>

    @if($rows->total() > 0)
        <div class="row">
            @foreach($rows as $row)
                <div class="col-md-6 col-lg-4">
                    @includeIf('User::frontend.wishList.loop-list')
                </div>
            @endforeach
        </div>
        <div class="col-lg-12">
            <div class="mbp_pagination mt10">
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    @else
        {{__("No Items")}}
    @endif

@endsection
@section('footer')
@endsection
