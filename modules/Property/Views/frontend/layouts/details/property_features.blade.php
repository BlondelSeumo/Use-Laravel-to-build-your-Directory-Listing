@php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
@endphp
@if(!empty($terms_ids) and !empty($attributes))
    @foreach($attributes as $attribute )
        @php $translate_attribute = $attribute['parent']->translateOrOrigin(app()->getLocale()) @endphp
        @if(empty($attribute['parent']['hide_in_single']))
            <div class="col-lg-12 {{$attribute['parent']->slug}} attr-{{$attribute['parent']->id}}">
                <div class="additional_details mb30">
                    <div class="row">
                        <div class="col-lg-12 pl0 pr0 pl15-767 pr15-767">
                            <h4 class="mb30">{{ $translate_attribute->name }}</h4>
                        </div>
                        @php $terms = $attribute['child'] @endphp
                        @foreach($terms as $term )
                            @php $translate_term = $term->translateOrOrigin(app()->getLocale()); @endphp
                        <div class="col-md-6 col-lg-6 col-xl-4 pl0 pr0 pl15-767">
                            <div class="listing_feature_iconbox mb30">
                                <div class="icon float-left mr10">
                                    @if($term->icon)
                                        <span class="{{ $term->icon }}"></span>
                                    @else
                                        <span class="fa fa-check"></span>
                                    @endif
                                </div>
                                <div class="details">
                                    <div class="title">{{$translate_term->name}}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
