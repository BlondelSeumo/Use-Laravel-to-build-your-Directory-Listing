<div class="container">
    <div class="bc-list-locations pt70 pb70 @if(!empty($layout)) {{ $layout }} @endif">
        <div class="main-title text-center">
            <div class="title  ">
                {{$title}}
            </div>
            @if(!empty($desc))
                <div class="sub-title ">
                    {{$desc}}
                </div>
            @endif
        </div>
        @if(!empty($rows))
            <div class="list-item">
                <div class="row ">
                    @foreach($rows as $key=>$row)
                        <?php
                        $argv = [8,4,4,8];
                        $size_col = $argv[(($key) % 4)];
                        ?>
                        <div class="col-lg-{{$size_col}} col-md-6">
                            @includeIf('Location::frontend.blocks.list-locations.layouts.'.$layout)
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>