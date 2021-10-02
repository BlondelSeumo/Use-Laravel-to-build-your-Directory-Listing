<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="main-title text-center">
                @if(!empty($title))<h2>{{$title}}</h2>@endif
                @if(!empty($sub_title))<p>{{$sub_title}}</p>@endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="about_thumb mb30-smd">
                @if($bg_image)
                    <img class="img-fluid w100" src="{{get_file_url($bg_image,'full')}}" alt="Youtube">
                @endif
                <a class="popup-iframe popup-youtube"  href="{{$youtube}}"><img src="{{asset('dist/frontend/guido/icons/play1.svg')}}" alt="play1.svg" ></a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="about_content">
                {!! clean(@$right_content) !!}
            </div>
        </div>
    </div>
</div>
