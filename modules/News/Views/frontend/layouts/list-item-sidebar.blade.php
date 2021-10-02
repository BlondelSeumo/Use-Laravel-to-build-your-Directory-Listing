@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/news/css/news.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link href="{{ asset('dist/frontend/css/app.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
    <div class="bc-news">
        @php
            $title_page = setting_item_with_lang("news_page_list_title");
            $style_page = setting_item_with_lang("blog_style");
            if(!empty($custom_title_page)){
                $title_page = $custom_title_page;
            }
            
        @endphp
       
        <!-- Main Blog Post Content -->
        @if(!empty($title_page))
            <section class="inner_page_breadcrumb style2" @if($bg = setting_item("news_page_list_banner")) style="background-image: url({{get_file_url($bg,'full')}})" @endif>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6">
                            <div class="breadcrumb_content">
                                <h2 class="breadcrumb_title">{{ $title_page }}</h2>
                                @include('News::frontend.layouts.details.news-breadcrumb')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <section class="blog_post_container pb80">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @if($rows->count() > 0)
                                <div class="row">
                                    @foreach($rows as $row)
                                        @php
                                            $style_page = setting_item_with_lang("blog_style");
                                            $col =  "col-md-6 ";
                                            if($style_page == 'gird'){
                                                $col =  "col-md-6 col-lg-4 col-xl-4";
                                            }
                                        @endphp
                                        <div class="{{$col}}">
                                    @include('News::frontend.layouts.details.news-gird')
                                        </div>
                                    @endforeach
                                </div>
                                
                            
                            <div class="mbp_pagination mt30">
                                {{$rows->appends(request()->query())->links()}}
                            </div>
                        @else
                            <div class="alert alert-danger">
                                {{__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")}}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        @include('News::frontend.layouts.details.news-sidebar')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

 
  