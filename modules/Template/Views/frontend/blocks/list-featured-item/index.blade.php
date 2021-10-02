@if($list_item)
    <div class="bravo-featured-item whychose_us bgc-f7 pt70 pb70 {{$style ?? ''}}">
        <div class="container">
            <div class="main-title text-center">
                @if(!empty($title))
                <div class="title  ">
                    {{$title}}
                </div>
                @endif
                @if(!empty($sub_title))
                    <div class="sub-title ">
                        {{$sub_title}}
                    </div>
                @endif
            </div>
            <div class="row">
                @foreach($list_item as $k=>$item)
                    <div class="col-md-4">
                        <div class="why_chose_us">
                            <div class="icon">
                                <span class="{{@$item['icon']}}"></span>
                            </div>
                            <div class="details">
                                <h4>{{$item['title']}}</h4>
                                <p>{!! clean($item['sub_title']) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
