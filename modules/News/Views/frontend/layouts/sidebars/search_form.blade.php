<div class="sidebar-widget sidebar_search_widget">
    <div class="blog_search_widget">
        <form method="get" class="search" action="{{ url(app_get_locale(false,false,'/').config('news.news_route_prefix')) }}">
            <div class="input-group">
                <input type="text" class="form-control" value="{{ Request::query("s") }}" aria-label="Recipient's username" name="s" placeholder="{{__("To search type and hit enter")}}">
            </div>
            <button type="submit" class="icon_search d-none"></button>
        </form>
    </div>
</div>