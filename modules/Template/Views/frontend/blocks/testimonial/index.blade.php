@if ($list_item)
<!-- Our Testimonials -->
<section id="our-testimonials" class="our-testimonials">
    <div class="container ovh max1800">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    @if(!empty($title))
                        <h2>{{ $title }}</h2>
                    @endif
                    @if(!empty($sub_title))
                        <p>{{ $sub_title }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial_slider_home1 testimonial_grid_slider">
                    @foreach ($list_item as $item)
                        <?php $avatar_url = get_file_url($item['avatar'], 'full'); ?>
                            <div class="item">
                                <div class="testimonial_post text-center">
                                    <div class="thumb">
                                        <img src="{{$avatar_url}}" alt="1.png">
                                        <h4 class="title">{{$item['name']}}</h4>
                                        <div class="client-postn">{{@$item['career']}}</div>
                                    </div>
                                    <div class="details">
                                        <div class="icon"><span>“</span></div>
                                        <p>“ {!! clean($item['desc']) !!} “</p>
                                    </div>
                                </div>
                            </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endif
