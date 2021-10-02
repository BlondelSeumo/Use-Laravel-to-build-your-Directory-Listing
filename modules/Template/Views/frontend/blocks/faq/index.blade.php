<!-- Our FAQ -->
@if($list_item)
    <section class="our-faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    @if(!empty($title))
                        <h2 class="mt0 mb35">{{ $title }}</h2>
                    @endif
                    <div class="faq_content mb40">
                        <div class="faq_according">
                            <div class="accordion">
                                @foreach ($list_item as $key => $item)
                                    <div class="card">
                                        <div class="card-header @if(!empty($item['show_item'])) active @endif" id="heading{{$key}}">
                                            <h4 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                                    {{@$item['name']}}
                                                </button>
                                            </h4>
                                        </div>
                                        <div id="collapse{{$key}}" class="collapse @if(!empty($item['show_item'])) show @endif" aria-labelledby="heading{{$key}}">
                                            <div class="card-body">
                                                <p>{{@$item['desc']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
