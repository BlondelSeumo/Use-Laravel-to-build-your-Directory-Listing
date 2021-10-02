jQuery(function ($) {
    "use strict";
    $.fn.bcAutocomplete = function (options) {
        return this.each(function () {
            var $this = $(this);
            var main = $(this).closest(".smart-search");
            var textLoading = options.textLoading;
            main.append('<div class="bc-autocomplete on-message"><div class="list-item"></div><div class="message">'+textLoading+'</div></div>');
            $(document).on("click.Bst", function(event){
                if (main.has(event.target).length === 0 && !main.is(event.target)) {
                    main.find('.bc-autocomplete').removeClass('show');
                } else {
                    if (options.dataDefault.length > 0) {
                        main.find('.bc-autocomplete').addClass('show');
                    }
                }
            });
            if (options.dataDefault.length > 0) {
                var items = '';
                for (var index in options.dataDefault) {
                    var item = options.dataDefault[index];
                    items += '<div class="item" data-id="' + item.id + '" data-text="' + item.title + '"> <i class="'+options.iconItem+'"></i> ' + item.title + ' </div>';
                }
                main.find('.bc-autocomplete .list-item').html(items);
                main.find('.bc-autocomplete').removeClass("on-message");
            }
            var requestTimeLimit;
            if(typeof options.url !='undefined' && options.url) {
                $this.keyup(function () {
                    main.find('.bc-autocomplete').addClass("on-message");
                    main.find('.bc-autocomplete .message').html(textLoading);
                    main.find('.child_id').val("");
                    var query = $(this).val();
                    clearTimeout(requestTimeLimit);
                    if (query.length === 0) {
                        if (options.dataDefault.length > 0) {
                            var items = '';
                            for (var index in options.dataDefault) {
                                var item = options.dataDefault[index];
                                items += '<div class="item" data-id="' + item.id + '" data-text="' + item.title + '"> <i class="' + options.iconItem + '"></i> ' + item.title + ' </div>';
                            }
                            main.find('.bc-autocomplete .list-item').html(items);
                            main.find('.bc-autocomplete').removeClass("on-message");
                        } else {
                            main.find('.bc-autocomplete').removeClass('show');
                        }
                        return;
                    }
                    requestTimeLimit = setTimeout(function () {
                        $.ajax({
                            url: options.url,
                            data: {
                                search: query,
                            },
                            dataType: 'json',
                            type: 'get',
                            beforeSend: function () {
                            },
                            success: function (res) {
                                if (res.status === 1) {
                                    var items = '';
                                    for (var ix in res.data) {
                                        var item = res.data[ix];
                                        items += '<div class="item" data-id="' + item.id + '" data-text="' + item.title + '"> <i class="' + options.iconItem + '"></i> ' + get_highlight(item.title, query) + ' </div>';
                                    }
                                    main.find('.bc-autocomplete .list-item').html(items);
                                    main.find('.bc-autocomplete').removeClass("on-message");
                                }
                                if ( typeof res.message === undefined) {
                                    main.find('.bc-autocomplete').addClass("on-message");
                                }else{
                                    main.find('.bc-autocomplete .message').html(res.message);
                                }
                            }
                        })
                    }, 700);

                    function get_highlight(text, val) {
                        return text.replace(
                            new RegExp(val + '(?!([^<]+)?>)', 'gi'),
                            '<span class="h-line">$&</span>'
                        );
                    }

                    main.find('.bc-autocomplete').addClass('show');
                });
            }
            main.find('.bc-autocomplete').on('click','.item',function () {
                var id = $(this).attr('data-id'),
                    text = $(this).attr('data-text');
                if(id.length > 0 && text.length > 0){
                    text = text.replace(/-/g, "");
                    //text = text.substring(1);
                    text = trimFunc(text,' ');
                    text = trimFunc(text,'-');
                    main.find('.parent_text').val(text).trigger("change");
                    main.find('.child_id').val(id).trigger("change");
                }else{
                    console.log("Cannot select!")
                }
                setTimeout(function () {
                    main.find('.bc-autocomplete').removeClass('show');
                },100);
            });

            var trimFunc = function (s, c) {
                if (c === "]") c = "\\]";
                if (c === "\\") c = "\\\\";
                return s.replace(new RegExp(
                    "^[" + c + "]+|[" + c + "]+$", "g"
                ), "");
            }
        });
    };
});

jQuery(function ($) {
    "use strict";
    function parseErrorMessage(e){
        var html = '';
        if(e.responseJSON){
            if(e.responseJSON.errors){
                return Object.values(e.responseJSON.errors).join('<br>');
            }
        }
        return html;
    }
    $(".g-map-place").each(function () {
        var map = $(this).find('.map').attr('id');
        var searchInput =  $(this).find('input[name=map_place]');
        var latInput = $(this).find('input[name="map_lat"]');
        var lgnInput = $(this).find('input[name="map_lgn"]');
        new BravoMapEngine(map, {
            fitBounds: true,
            center: [ 51.505, -0.09],
            ready: function (engineMap) {
            engineMap.searchBox(searchInput,function (dataLatLng) {
                latInput.attr("value", dataLatLng[0]);
                lgnInput.attr("value", dataLatLng[1]);
            });
        }
    });

    });


    $(".bc-form-search-slider .effect").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: false,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:false,
            animateOut: 'fadeOut'
        })
    });

    $(".bc-form-search-all.carousel_v2").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: false,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:false,
            animateOut: 'fadeOut'
        })
    });


    $(".bc-form-search-tour.carousel_v2  .effect").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: false,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:false,
            animateOut: 'fadeOut'
        })
    });

    $(".bc-list-tour.carousel").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });
    $(".bc-box-category-tour").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 4,
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });

    $(".bc-client-feedback").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: true,
            dots: false,
        })
    });

    $(".bc-list-tour.carousel_simple").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 3,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    });

    $(".bc-list-space").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 3,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    });

    $(".bc-list-hotel").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });

    $(".bc-list-car").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });
    $(".bc-list-event").each(function () {
        $(this).find(".owl-carousel").owlCarousel({
            items: 4,
            loop: false,
            margin: 15,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });

    $(".bc_fullHeight").each(function () {
        var height = $(document).height();
        if ($(document).find(".bc-admin-bar").length > 0) {
            height = height - $(".bc-admin-bar").height();
        }
        $(this).css('min-height', height);
    });

    // Date Picker Range
    $('.form-date-search').each(function () {
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        var parent = $(this),
            date_wrapper = $('.date-wrapper', parent),
            check_in_input = $('.check-in-input', parent),
            check_out_input = $('.check-out-input', parent),
            check_in_out = $('.check-in-out', parent),
            check_in_render = $('.check-in-render', parent),
            check_out_render = $('.check-out-render', parent);
        var options = {
            singleDatePicker: false,
            autoApply: true,
            disabledPast: true,
            customClass: '',
            widthSingle: 300,
            onlyShowCurrentMonth: true,
            minDate: today,
            opens: bookingCore.rtl ? 'right':'left',
            locale: {
                format: "YYYY-MM-DD",
                direction: bookingCore.rtl ? 'rtl':'ltr',
                firstDay:daterangepickerLocale.first_day_of_week
            }
        };
        if (typeof  daterangepickerLocale == 'object') {
            options.locale = _.merge(daterangepickerLocale,options.locale);
        }
        check_in_out.daterangepicker(options,
            function (start, end, label) {
                check_in_input.val(start.format(bookingCore.date_format));
                check_in_render.html(start.format(bookingCore.date_format));
                check_out_input.val(end.format(bookingCore.date_format));
                check_out_render.html(end.format(bookingCore.date_format));
            });
        date_wrapper.on('click',function (e) {
            check_in_out.trigger('click');
        });
    });

    // Date Picker
    $('.date-picker').each(function () {
        var options = {
            "singleDatePicker": true,
            opens: bookingCore.rtl ? 'right':'left',
            locale: {
                format: bookingCore.date_format,
                direction: bookingCore.rtl ? 'rtl':'ltr',
                firstDay:daterangepickerLocale.first_day_of_week
            }
        };
        if (typeof  daterangepickerLocale == 'object') {
            options.locale = _.merge(daterangepickerLocale,options.locale);
        }
        $(this).daterangepicker(options);
    });

    // Date Picker Range for hotel
    $('.form-date-search-hotel').each(function () {
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        var parent = $(this),
            date_wrapper = $('.date-wrapper', parent),
            check_in_input = $('.check-in-input', parent),
            check_out_input = $('.check-out-input', parent),
            check_in_out = $('.check-in-out', parent),
            check_in_render = $('.check-in-render', parent),
            check_out_render = $('.check-out-render', parent);
        var options = {
            singleDatePicker: false,
            autoApply: true,
            disabledPast: true,
            customClass: '',
            widthSingle: 300,
            onlyShowCurrentMonth: true,
            minDate: today,
            opens: bookingCore.rtl ? 'right':'left',
            locale: {
                format: "YYYY-MM-DD",
                direction: bookingCore.rtl ? 'rtl':'ltr',
                firstDay:daterangepickerLocale.first_day_of_week
            }
        };

        if (typeof  daterangepickerLocale == 'object') {
            options.locale = _.merge(daterangepickerLocale,options.locale);
        }
        check_in_out.daterangepicker(options).on('apply.daterangepicker',
            function (ev, picker) {
                if (picker.endDate.diff(picker.startDate, 'day') <= 0) {
                    picker.endDate.add(1, 'day');
                }
                check_in_input.val( picker.startDate.format(bookingCore.date_format) );
                check_in_render.html( picker.startDate.format(bookingCore.date_format) );
                check_out_input.val( picker.endDate.format(bookingCore.date_format) );
                check_out_render.html( picker.endDate.format(bookingCore.date_format) );
                check_in_out.val( picker.startDate.format("YYYY-MM-DD") + " - "+  picker.endDate.format("YYYY-MM-DD") )
            });
        date_wrapper.on('click',function (e) {
            check_in_out.trigger('click');
        });
    });

    //Review
    $('.review-form .review-items .rates .fa').each(function () {
        var list = $(this).parent(),
            listItems = list.children(),
            itemIndex = $(this).index(),
            parentItem = list.parent();
        $(this).on('hover',function () {
            for (var i = 0; i < listItems.length; i++) {
                if (i <= itemIndex) {
                    $(listItems[i]).addClass('hovered');
                } else {
                    break;
                }
            }
            $(this).on('click',function () {
                for (var i = 0; i < listItems.length; i++) {
                    if (i <= itemIndex) {
                        $(listItems[i]).addClass('selected');
                    } else {
                        $(listItems[i]).removeClass('selected');
                    }
                }
                parentItem.children('.review_stats').val(itemIndex + 1);
            });
        }, function () {
            listItems.removeClass('hovered');
        });
    });

    //Login
    $('.bc-form-login [type=submit]').on('click',function (e) {
        e.preventDefault();
        let form = $(this).closest('.bc-form-login');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': form.find('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': bookingCore.routes.login,
            'data': {
                'email': form.find('input[name=email]').val(),
                'password': form.find('input[name=password]').val(),
                'remember': form.find('input[name=remember]').is(":checked") ? 1 : '',
                'g-recaptcha-response': form.find('[name=g-recaptcha-response]').val(),
                'redirect':form.find('input[name=redirect]').val()
            },
            'type': 'POST',
            beforeSend: function () {
                form.find('.error').hide();
                form.find('.icon-loading').css("display", 'inline-block');
            },
            success: function (data) {
                form.find('.icon-loading').hide();
                if (data.error === true) {
                    if (data.messages !== undefined) {
                        for(var item in data.messages) {
                            var msg = data.messages[item];
                            form.find('.error-'+item).show().text(msg[0]);
                        }
                    }
                    if (data.messages.message_error !== undefined) {
                        form.find('.message-error').show().html('<div class="alert alert-danger">' + data.messages.message_error[0] + '</div>');
                    }
                }
                if (typeof data.redirect !== 'undefined' && data.redirect) {
                    window.location.href = data.redirect
                }
            }
        });
    })
    $('.bc-form-register [type=submit]').on('click',function (e) {
        e.preventDefault();
        let form = $(this).closest('.bc-form-register');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': form.find('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url':  bookingCore.routes.register,
            'data': {
                'email': form.find('input[name=email]').val(),
                'password': form.find('input[name=password]').val(),
                'first_name': form.find('input[name=first_name]').val(),
                'last_name': form.find('input[name=last_name]').val(),
                'phone': form.find('input[name=phone]').val(),
                'term': form.find('input[name=term]').is(":checked") ? 1 : '',
                'g-recaptcha-response': form.find('[name=g-recaptcha-response]').val(),
            },
            'type': 'POST',
            beforeSend: function () {
                form.find('.error').hide();
                form.find('.icon-loading').css("display", 'inline-block');
            },
            success: function (data) {
                form.find('.icon-loading').hide();
                if (data.error === true) {
                    if (data.messages !== undefined) {
                        for(var item in data.messages) {
                            var msg = data.messages[item];
                            form.find('.error-'+item).show().text(msg[0]);
                        }
                    }
                    if (data.messages.message_error !== undefined) {
                        form.find('.message-error').show().html('<div class="alert alert-danger">' + data.messages.message_error[0] + '</div>');
                    }
                }
                if (data.redirect !== undefined) {
                    window.location.href = data.redirect
                }
            },
            error:function (e) {
                form.find('.icon-loading').hide();
                if(typeof e.responseJSON !== "undefined" && typeof e.responseJSON.message !='undefined'){
                    form.find('.message-error').show().html('<div class="alert alert-danger">' + e.responseJSON.message + '</div>');
                }
            }
        });
    })
    $('#register').on('show.bs.modal', function (event) {
        $('#login').modal('hide')
    })
    $('#login').on('show.bs.modal', function (event) {
        $('#register').modal('hide')
    });

    var onSubmitSubscribe = false;
    //Subscribe box
    $('.bc-subscribe-form').on('submit',function (e) {
        e.preventDefault();

        if (onSubmitSubscribe) return;

        $(this).addClass('loading');
        var me = $(this);
        me.find('.form-mess').html('');

        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (json) {
                onSubmitSubscribe = false;
                me.removeClass('loading');

                if (json.message) {
                    me.find('.form-mess').html('<span class="' + (json.status ? 'text-success' : 'text-danger') + '">' + json.message + '</span>');
                }

                if (json.status) {
                    me.find('input').val('');
                }

            },
            error: function (e) {
                console.log(e);
                onSubmitSubscribe = false;
                me.removeClass('loading');

                if(parseErrorMessage(e)){
                    me.find('.form-mess').html('<span class="text-danger">' + parseErrorMessage(e) + '</span>');
                }else
                if (e.responseText) {
                    me.find('.form-mess').html('<span class="text-danger">' + e.responseText + '</span>');
                }

            }
        });

        return false;
    });

    //Menu
    $(".bc-more-menu").on('click',function () {
        $(this).trigger('bc-trigger-menu-mobile');
    });
    $(".bc-menu-mobile .b-close").on('click',function () {
        $(".bc-more-menu").trigger('bc-trigger-menu-mobile');
    });
    $(document).on("click",".bc-effect-bg",function () {
        $(".bc-more-menu").trigger('bc-trigger-menu-mobile');
    })
    $(document).on("bc-trigger-menu-mobile",".bc-more-menu",function () {
        $(this).toggleClass('active');
        if($(this).hasClass('active')){
            $(".bc-menu-mobile").addClass("active");
            $('body').css('overflow','hidden').append("<div class='bc-effect-bg'></div>");
        }else{
            $(".bc-menu-mobile").removeClass("active");
            $("body").css('overflow','initial').find(".bc-effect-bg").remove();
        }
    });
    $(".bc-menu-mobile .g-menu ul li .fa").on('click',function (e) {
        e.preventDefault();
        $(this).closest('li').toggleClass('active');
    });
    $(".bc-menu-mobile").each(function () {
        var h_profile = $(this).find(".user-profile").height();
        var h1_main = $(window).height();
        $(this).find(".g-menu").css("max-height", h1_main - h_profile - 15);
    });

    $(".bc-more-menu-user").on('click',function () {
        $(".bc_user_profile > .container-fluid > .row > .col-md-3").addClass("active");
        $("body").css('overflow','hidden').append("<div class='bc-effect-user-bg'></div>");
    });
    $(document).on("click",".bc-effect-user-bg,.bc-close-menu-user",function () {
        $(".bc_user_profile > .container-fluid > .row > .col-md-3").removeClass("active");
        $('body').css('overflow','initial').find(".bc-effect-user-bg").remove();
    })

    $('[data-toggle="tooltip"]').tooltip();

    $('.dropdown-toggle').dropdown();

    $('.select-guests-dropdown .btn-minus').on('click',function(e){
        e.stopPropagation();
        var parent = $(this).closest('.form-select-guests');
        var input = parent.find('.select-guests-dropdown [name='+$(this).data('input')+']');
        var min = parseInt(input.attr('min'));
        var old = parseInt(input.val());

        if(old <= min){
            return;
        }
        input.val(old-1);
        updateGuestCountText(parent);
    });

    $('.select-guests-dropdown .btn-add').on('click',function(e){
        e.stopPropagation();
        var parent = $(this).closest('.form-select-guests');
        var input = parent.find('.select-guests-dropdown [name='+$(this).data('input')+']');
        var max = parseInt(input.attr('max'));
        var old = parseInt(input.val());

        if(old >= max){
            return;
        }
        input.val(old+1);
        updateGuestCountText(parent);
    });

    $('.select-guests-dropdown input').keyup(function(e){
        var parent = $(this).closest('.form-select-guests');
        updateGuestCountText(parent);
    });
    $('.select-guests-dropdown input').on('change',function(e){
        var parent = $(this).closest('.form-select-guests');
        updateGuestCountText(parent);
    });

    function updateGuestCountText(parent){
        var adults = parseInt(parent.find('[name=adults]').val());
        var children = parseInt(parent.find('[name=children]').val());

        var adultsHtml = parent.find('.render .adults .multi').data('html');
        console.log(parent,adultsHtml);
        parent.find('.render .adults .multi').html(adultsHtml.replace(':count',adults));

        var childrenHtml = parent.find('.render .children .multi').data('html');
        parent.find('.render .children .multi').html(childrenHtml.replace(':count',children));
        if(adults > 1){
            parent.find('.render .adults .multi').removeClass('d-none');
            parent.find('.render .adults .one').addClass('d-none');
        }else{
            parent.find('.render .adults .multi').addClass('d-none');
            parent.find('.render .adults .one').removeClass('d-none');
        }

        if(children > 1){
            parent.find('.render .children .multi').removeClass('d-none');
            parent.find('.render .children .one').addClass('d-none');
        }else{
            parent.find('.render .children .multi').addClass('d-none');
            parent.find('.render .children .one').removeClass('d-none').html(parent.find('.render .children .one').data('html').replace(':count',children));
        }

    }

    $('.select-guests-dropdown .dropdown-item-row').on('click',function(e){
        e.stopPropagation();
    });

    $(".smart-search .smart-search-location").each(function () {
        var $this = $(this);
        var string_list = $this.attr('data-default');
        var default_list = [];
        if(string_list.length > 0){
            default_list = JSON.parse(string_list);
        }
        var options = {
            url: bookingCore.url+'/location/search/searchForSelect2',
            dataDefault: default_list,
            textLoading: $this.attr("data-onLoad"),
            iconItem: "icofont-location-pin",
        };
        $this.bcAutocomplete(options);
    });

    $(".smart-search .smart-select").each(function () {
        var $this = $(this);
        var string_list = $this.attr('data-default');
        var default_list = [];
        if(string_list.length > 0){
            default_list = JSON.parse(string_list);
        }
        var options = {
            dataDefault: default_list,
            iconItem: "",
            textLoading: $this.attr("data-onLoad"),
        };
        $this.bcAutocomplete(options);
    });

    $(document).on("click",".service-wishlist",function(e){
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            url:  bookingCore.url+'/user/wishlist',
            data: {
                object_id: $this.attr("data-id"),
                object_model: $this.attr("data-type"),
            },
            dataType: 'json',
            type: 'POST',
            beforeSend: function() {
                $this.addClass("loading");
            },
            success: function (res) {
                $this.attr('class',"service-wishlist "+res.class);
            },
            error:function (e) {
                if(e.status === 401){
                    $('#sign_up_modal').modal('show');
                }
            }
        })
    });

    $('.bc-video-popup').on('click',function() {
        let video_url = $(this).data( "src" );
        let target = $(this).data( "target" );
        $(target).find(".bc_embed_video").attr('src',video_url + "?autoplay=0&amp;modestbranding=1&amp;showinfo=0" );
        $(target).on('hidden.bs.modal', function () {
            $(target).find(".bc_embed_video").attr('src',"" );
        });
    });


    var onSubmitContact = false;
    //Contact box
    $('.bc-contact-block-form').on('submit',function (e) {
        e.preventDefault();
        if (onSubmitContact) return;
        $(this).addClass('loading');
        var me = $(this);
        me.find('.form-mess').html('');
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (json) {
                onSubmitContact = false;
                me.removeClass('loading');
                if (json.message) {
                    me.find('.form-mess').html('<span class="' + (json.status ? 'text-success' : 'text-danger') + '">' + json.message + '</span>');
                }
                if (json.status) {
                    me.find('input').val('');
                    me.find('textarea').val('');
                }
            },
            error: function (e) {
                console.log(e);
                onSubmitContact = false;
                me.removeClass('loading');
                if(parseErrorMessage(e)){
                    me.find('.form-mess').html('<span class="text-danger">' + parseErrorMessage(e) + '</span>');
                }else
                if (e.responseText) {
                    me.find('.form-mess').html('<span class="text-danger">' + e.responseText + '</span>');
                }
            }
        });
        return false;
    });

    $('.btn-submit-enquiry').on('click',function (e) {

        e.preventDefault();
        let form = $(this).closest('.enquiry_form_modal_form');

        $.ajax({
            url:bookingCore.url+'/booking/addEnquiry',
            data:form.find('textarea,input,select').serialize(),
            dataType:'json',
            type:'post',
            beforeSend: function () {
                form.find('.message_box').html('').hide();
                form.find('.icon-loading').css("display", 'inline-block');
            },
            success:function(res){
                if(res.errors){
                    res.message = '';
                    for(var k in res.errors){
                        res.message += res.errors[k].join('<br>')+'<br>';
                    }
                }
                if(res.message)
                {
                    if(!res.status){
                        form.find('.message_box').append('<div class="text text-danger">'+res.message+'</div>').show();
                    }else{
                        form.find('.message_box').append('<div class="text text-success">'+res.message+'</div>').show();
                    }
                }

                form.find('.icon-loading').hide();

                if(res.status){
                    form.find('textarea,input,select').val('');
                }

                if(typeof BravoReCaptcha != "undefined"){
                    BravoReCaptcha.reset('enquiry_form');
                }
            },
            error:function (e) {
                if(typeof BravoReCaptcha != "undefined"){
                    BravoReCaptcha.reset('enquiry_form');
                }
                form.find('.icon-loading').hide();
            }
        })
    })

    $('.review_upload_file').on('change',function () {
        var me = $(this);
        var p = $(this).closest('.review_upload_wrap');
        var lists = p.find('.review_upload_photo_list');

        me.isLoading = true;
        for(var i = 0 ;i < me.get(0).files.length ; i++) {
            var d = new FormData();
            d.append('type','image');
            d.append('file',me.get(0).files[i]);
            if(!me.showErr){
                $.ajax({
                    url: bookingCore.url + '/media/private/store',
                    data: d,
                    dataType: 'json',
                    type: 'post',
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        me.val('');
                        if (res.status === 0) {
                            bookingCoreApp.showError(res);
                        }
                        if (res.data) {
                            var count = $(".review_upload_photo_list > .col-md-2").length;
                            if(count > 5){
                                bookingCoreApp.showError('Maximum upload 6 pictures');
                            }else{
                                var div = $('<div class="col-md-2 mb-2"/>');
                                var item = $('<div class="review_upload_item"/>');
                                div.append(item);
                                var input = $("<input/>");
                                input.attr('type', 'hidden');
                                input.attr('name', me.data('name')+'[]');
                                input.val(JSON.stringify(res.data));

                                item.append(input);
                                item.css({
                                    'background-image':'url('+res.data.download+')'
                                });

                                if (me.data('multiple')) {
                                    lists.append(div);
                                } else {
                                    lists.html(div);
                                }
                            }

                        }
                    },
                    error: function (e) {
                        bookingCoreApp.showAjaxError(e);
                        me.val('');
                    }
                })
            }

        }

        $(this).val('');
    })

    $('.review_upload_item').on('click',function (e) {
        var p  = $(e.target).data('target');
        var fotorama = $(p+' .fotorama').fotorama();

    });

});

jQuery(function($){

    function parseErrorMessage(e){
        var html = '';
        if(e.responseJSON){
            if(e.responseJSON.errors){
                return Object.values(e.responseJSON.errors).join('<br>');
            }
        }
        return html;
    }

    var notificationsWrapper   = $('.dropdown-notifications');
    var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('.notification-icon');
    var notificationsCount     = parseInt(notificationsCountElem.html());
    var notifications          = notificationsWrapper.find('ul.dropdown-list-items');

    if(bookingCore.pusher_api_key && bookingCore.pusher_cluster){
        var pusher = new Pusher(bookingCore.pusher_api_key, {
            encrypted: true,
            cluster: bookingCore.pusher_cluster
        });
    }

    $(document).on("click",".markAsRead",function(e) {
        e.stopPropagation();
        e.preventDefault();
        var id = $(this).data('id');
        var url = $(this).attr('href');
        $.ajax({
            url: bookingCore.markAsRead,
            data: {'id' : id },
            method: "post",
            success:function (res) {
                window.location.href = url;
            }
        })
    });
    $(document).on("click",".markAllAsRead",function(e) {
        e.stopPropagation();
        e.preventDefault();
        $.ajax({
            url: bookingCore.markAllAsRead,
            method: "post",
            success:function (res) {
                $('.dropdown-notifications').find('li.notification').removeClass('active');
                notificationsCountElem.text(0);
                notificationsWrapper.find('.notif-count').text(0);
            }
        })
    });

    var callback = function(data) {
        var existingNotifications = notifications.html();
        var newNotificationHtml = '<li class="notification active">'
            +'<div class="media">'
            +'    <div class="media-left">'
            +'      <div class="media-object">'
            +  data.avatar
            +'      </div>'
            +'    </div>'
            +'    <div class="media-body">'
            +'      <a class="markAsRead p-0" data-id="'+data.idNotification+'" href="'+data.link+'">'+data.message+'</a>'
            +'      <div class="notification-meta">'
            +'        <small class="timestamp">about a few seconds ago</small>'
            +'      </div>'
            +'    </div>'
            +'  </div>'
            +'</li>';
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.text(notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
    };

    if(bookingCore.isAdmin > 0 && bookingCore.pusher_api_key){
        var channel = pusher.subscribe('admin-channel');
        channel.bind('App\\Events\\PusherNotificationAdminEvent', callback);
    }

    if(bookingCore.currentUser > 0 && bookingCore.pusher_api_key){
        var channelPrivate = pusher.subscribe('user-channel-'+bookingCore.currentUser);
        channelPrivate.bind('App\\Events\\PusherNotificationPrivateEvent', callback);
    }


    //agent contact
    var onSubmitAgentContact = false;
    $('.agent_contact_form').on('submit',function(e) {
        e.preventDefault();
        if (onSubmitAgentContact) return;
        $(this).addClass('loading');
        var me = $(this);
        me.find('.form-mess').html('');
        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(json) {
                onSubmitAgentContact = false;
                me.removeClass('loading');
                if (json.message) {
                    me.find('.form-mess').html('<span class="' + (json.status ? 'text-success' : 'text-danger') + '">' + json.message + '</span>');
                }
                if (json.status) {
                    me.find("input").not("input[type='hidden']").val('');
                    me.find('textarea').val('');
                }
            },
            error: function(e) {
                onSubmitAgentContact = false;
                me.removeClass('loading');
                if (parseErrorMessage(e)) {
                    me.find('.form-mess').html('<span class="text-danger">' + parseErrorMessage(e) + '</span>');
                } else
                if (e.responseText) {
                    me.find('.form-mess').html('<span class="text-danger">' + e.responseText + '</span>');
                }
            }
        });
        return false;
    });

    $(".smart-search .smart-search-property").each(function () {
        var $this = $(this);
        var url = bookingCore.url+'/property/search/searchForSelect2';
        $this.select2({
            ajax: {
                url: url,
            },
            width: '100%',
            placeholder: 'What are you looking for',
            dropdownAutoWidth : true,
            dropdownParent: $("#staticBackdrop"),
            templateResult: function(res){
                console.log(res)
                return $(res.html);
            },
        });
        $this.on('select2:select', function (e) {
            var data = e.params.data;
            if(typeof data.href !='undefined'){
                window.location.href = data.href;
            }
        });


    });
});


