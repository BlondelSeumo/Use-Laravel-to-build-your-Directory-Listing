<div class="bc-list-item @if(!$rows->count()) not-found @endif row">
    @if($rows->count())
        @php $layout = Request::input('layout') @endphp
        @foreach($rows as $row)
            @if($layout == 'list')
                <div class="item-listting col-lg-12">
                    @include('Property::frontend.layouts.search.loop.loop-list')
                </div>
            @else
                <div class="item-listting col-md-6 col-lg-4">
                    @include('Property::frontend.layouts.search.loop.loop-gird')
                </div>
            @endif
        @endforeach

        <div class="col-lg-12">
            <div class="mbp_pagination mt10">
                <div class="new_line_pagination text-center">
                    <p class="showing-properties">{{ __("Showing :count of :total Results", [ 'count'=>$rows->lastItem() ,'total'=>$rows->total()]) }}</p>
                    <div class="pagination_line"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt20">
            <div class="mbp_pagination">
                {{$rows->appends(array_merge(request()->query(),['_ajax'=>1]))->links()}}

            </div>
        </div>
    @else
        <div class="not-found-box">
            <h3 class="n-title">{{__("We couldn't find any properties.")}}</h3>
            <p class="p-desc">{{__("Try changing your filter criteria")}}</p>
        </div>
    @endif
</div>
