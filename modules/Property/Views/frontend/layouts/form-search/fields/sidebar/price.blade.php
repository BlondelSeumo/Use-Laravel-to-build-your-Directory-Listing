<li>
    <div class="small_dropdown2">
        <div id="prncgs2" class="btn dd_btn">
            <span>{{ __("Price") }}</span>
            <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
        </div>
        <div class="dd_content2">
            <div class="pricing_acontent">
                <input class="mt30" data-addui='slider' name="amount"
                       data-min='0'
                       data-max='{{$property_min_max_price[1]}}'
                       data-formatter='usd'
                       data-fontsize='14'
                       data-step='0.05'
                       data-range='true'
                       value='{{ Request::input('amount') ?? '0,'.$property_min_max_price[1] }}'
                >
            </div>
        </div>
    </div>
</li>
