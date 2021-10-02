@if($list_item)
<section id="our-partners" class="our-partners bt1 pt60 pb60">
    <div class="container">
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
            @foreach($list_item as $item)
                <?php $link_image = get_file_url($item['avatar'], 'full')?>
            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="our_partner">
                    <img class="img-fluid" src="{{ $link_image }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif