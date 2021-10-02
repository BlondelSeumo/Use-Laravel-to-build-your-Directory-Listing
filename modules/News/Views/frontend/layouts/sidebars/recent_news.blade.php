<div class="sidebar_feature_listing">
    @php $list_blog = $model_news->with(['getCategory','translations'])->orderBy('id','desc')->paginate(5) @endphp
        @if($list_blog)
            @foreach($list_blog as $blog)
            <div class="media">
                @php $translation = $blog->translateOrOrigin(app()->getLocale()) @endphp
                    @if($image_url = get_file_url($blog->image_id, 'thumb'))
                        <a href="{{ $blog->getDetailUrl(app()->getLocale()) }}">
                            {!! get_image_tag($blog->image_id,'thumb',['class'=>'align-self-start mr-3','alt'=>$blog->title]) !!}
                        </a>
                    @endif
                    <div class="media-body">
                        @if(!empty($blog->getCategory->name))
                            <h5 class="mt-0 post_title">
                                <a href="{{ $blog->getDetailUrl(app()->getLocale()) }}">{!! clean($translation->title) !!}</a>
                            </h5>
                            {{ display_date($blog->updated_at)}}
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
</div>