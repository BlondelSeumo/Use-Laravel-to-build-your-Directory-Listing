<section class="our-blog pt70 pb70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2>{{$title}}</h2>
                    <p> {{$desc}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($rows as $row)
                <div class="col-md-6 col-lg-4 col-xl-4">
                    @include('News::frontend.layouts.details.news-gird')
                </div>
            @endforeach
            
        </div>
    </div>
</section>
