<div class="col-auto home_form_input mb20-xsd">
    <label class="sr-only">{{$holder}}</label>
    <div class="input-group style1 mb-2 mb0-767">
        <div class="input-group-prepend">
            <div class="input-group-text pl0 pb0-767">{{$holder}}</div>
        </div>
        <div class="select-wrap style2-dropdown ">
            <div class="sasw_list">
                <div class="small_dropdown2 ">
                    <div id="prncgs2" class="btn dd_btn w80">
                        <span>{{ __("Price") }}</span>
                        <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                    </div>
                    <div class="dd_content2">
                        <div class="pricing_acontent">
                            <input class="mt30 " data-addui='slider' name="amount"
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
            </div>
        </div>
    </div>
</div>
