@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="for_blog feat_property">
    <a href="{{$row->getDetailUrl()}}">
        <div class="thumb">
            @if($image_tag = get_image_tag($row->image_id,'full',['alt'=>$translation->title]))
            {!! $image_tag !!}
                @php $category = $row->getCategory; @endphp
                @if(!empty($category))
                    @php $t = $category->translateOrOrigin(app()->getLocale()); @endphp
                    <div class="tag bgc-thm"><a class="text-white" href="{{$category->getDetailUrl(app()->getLocale())}}"> {{$t->name ?? ''}}</a></div>
                @endif
            @endif
        </div>
        <div class="details">
            <div class="tc_content">
                <div class="bp_meta">
                    <ul>
                        @if(!empty($row->getAuthor))
                            <li class="list-inline-item">
                                <span class="flaticon-avatar mr10"></span>
                                {{$row->getAuthor->getDisplayName() ?? ''}}
                            </li>
                        @endif
                        <li class="list-inline-item"> <a href="#"><span class="flaticon-date mr10"></span>{{ display_date($row->updated_at)}}</a> </li>
                    </ul>
                </div>
                <h4 ><a href="{{$row->getDetailUrl()}}">{!! clean($translation->title) !!}</a></h4>

            </div>
        </div>
    </a>
</div>
   
