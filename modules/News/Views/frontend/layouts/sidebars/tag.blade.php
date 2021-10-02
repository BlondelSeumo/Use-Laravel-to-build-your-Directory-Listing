@if(!empty($model_tag))
    <div class="blog_tag_widget">
        <h4 class="title">{{ $item->title }}</h4>
        @php
            $list_tags = \Modules\News\Models\NewsTag::getTags();
        @endphp
        <ul class="tag_list">
            @if($list_tags)
                @foreach($list_tags as $tag)
                    @php $translation = $tag->translateOrOrigin(app()->getLocale()) @endphp
                    <li class="list-inline-item">
                    <a href="{{ $tag->getDetailUrl(app()->getLocale()) }}" class="tag-cloud-link">{{$translation->name}}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endif