<div class="sidebar">
    <div class="sidebar_contact_widget mb30">
        <h4 class="title mb15">{{__('Contact Us')}}</h4>
        <ul class="list-unstyled">
            @if(!empty($user->address))
                <li class="df"><span class="flaticon-pin mr15"></span>{{$user->address}}</li>
            @endif
            @if(!empty($user->phone) )
                <li><span class="flaticon-phone mr15"></span><a href="tel:{{$user->phone}}">{{$user->phone}}</a></li>
            @endif
            @if(!empty($user->email))
                <li><span class="flaticon-email mr15"></span><a href="mailto:{{$user->email}}">{{$user->email}}</a></li>
            @endif
        </ul>
    </div>
    @if(!empty($user->bio))
        <div class="sidebar_about_widget">
            <h4 class="title mb15">{{__('About')}}</h4>
            <div class="mb-2">{!! clean($user->bio) !!}</div>
        </div>
    @endif
</div>
