@if($row->faqs and is_array($row->faqs))
<div class="col-lg-12 pl0 pl15-767">
    <div class="single_listing_faq">
        <h4 class="mb35">{{ __("Frequently Asked Questions") }}</h4>
        <div class="faq_content mb40">
            <div class="faq_according">
                <div class="accordion" id="accordionFAQs">
                    @foreach($row->faqs as $key => $val)
                    <div class="card">
                        <div class="card-header @if($key==0) active @endif" id="heading{{ ($key + 1) }}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#faq_{{ ($key + 1) }}" aria-expanded="true" aria-controls="collapseOne">
                                    {{ isset($val['title']) ? $val['title'] : '' }}
                                </button>
                            </h5>
                        </div>
                        <div id="faq_{{ ($key + 1) }}" class="collapse @if($key==0) show @endif" aria-labelledby="heading{{ ($key + 1) }}" data-parent="#accordionFAQs" style="">
                            <div class="card-body">
                                <p>{{ isset($val['content']) ? $val['content'] : '' }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
