
    @php
        $translation = $row->translateOrOrigin(app()->getLocale());
    @endphp
    <div class="for_blog list-type feat_property">
        <div class="thumb w100 pb10">
            <a href="{{$row->getDetailUrl()}}">
            @if($image_url = get_file_url($row->image_id, 'full'))
                <img class="img-whp" src="{{ $image_url  }}" alt="{{$translation->title}}">
                @php $category = $row->getCategory; @endphp
                @if(!empty($category))
                    @php $t = $category->translateOrOrigin(app()->getLocale()); @endphp
                    <div class="tag bgc-thm"><a class="text-white" href="{{$category->getDetailUrl(app()->getLocale())}}"> {{$t->name ?? ''}}</a></div>
                @endif
            @endif
            </a>
        </div>
        <div class="details pb5">
            <div class="tc_content pt15">
                <div class="bp_meta mb20">
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
                <h4 class="mt15 mb20"><a href="{{$row->getDetailUrl()}}">{!! clean($translation->title) !!}</a></h4>
                <p class=" mb20"> {!! clean(get_exceprt($translation->content, 21, '...')) !!}</p>
                <a class="tdu text-thm" href="{{$row->getDetailUrl()}}">{{ __('Read More')}}</a>
            </div>
        </div>
    </div>



