<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;
    use Modules\Property\Models\Property;

    class General extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Setting header,footer
        $property = Property::first();
        $menu_items_en = array(
            array(
                'name'       => 'Home',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
            ),
            array(
                'name'       => 'Property',
                'url'        => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Property List',
                        'url'        => '/property',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(
                            array(
                                'name'       => 'Property List V1',
                                'url'        => '/property?_layout=v1',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children'   => array(),
                            ),
                            array(
                                'name'       => 'Property List Map',
                                'url'        => '/property?_layout=map1',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children'   => array(),
                            ),
                        ),
                    ),
                    array(
                        'name'       => 'Property Detail',
                        'url'        => '/property/'.$property->slug,
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ),
                ),
            ),
            array(
                'name'       => 'Pages',
                'url'        => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'News List',
                        'url'        => '/news',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'News Detail',
                        'url'        => '/news/morning-in-the-northern-sea',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Location Detail',
                        'url'        => '/location/miami',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Vendor Profile',
                        'url'        => '/profile/2',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'About us',
                        'url'        => '/page/about-us',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Gallery',
                        'url'        => '/page/gallery',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Coming soon',
                        'url'        => '/page/coming-soon',
                        'item_model' => 'custom',
                        'children'   => array(),
                    )
                ),
            ),
            array(
                'name'       => 'Contact',
                'url'        => '/contact',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(),
            ),
        );
        DB::table('bc_menus')->insert([
            'name'        => 'Main Menu',
            'items'       => json_encode($menu_items_en),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        $menu_items_ja = array(
            array(
                'name'       => 'ホームホーム',
                'url'        => '/ja',
                'item_model' => 'custom',
                'model_name' => 'Custom',
            ),
            array(
                'name'       => 'プロパティ',
                'url'        => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'プロパティリスト',
                        'url'        => '/ja/property',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(
                            array(
                                'name'       => 'プロパティリスト V1',
                                'url'        => '/ja/property?_layout=v1',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children'   => array(),
                            ),
                            array(
                                'name'       => 'プロパティリスト V2',
                                'url'        => '/ja//property?_layout=map1',
                                'item_model' => 'custom',
                                'model_name' => 'Custom',
                                'children'   => array(),
                            ),
                        ),
                    ),
                    array(
                        'name'       => 'プロパティの詳細',
                        'url'        => '/ja/property/'.$property->slug,
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                    ),
                ),
            ),
            array(
                'name'       => 'ページ',
                'url'        => '#',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'ニュースリスト',
                        'url'        => '/ja/news',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ニュースの詳細',
                        'url'        => '/ja/news/morning-in-the-northern-sea',
                        'item_model' => 'custom',
                        'model_name' => 'Custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => '場所の詳細',
                        'url'        => '/ja/location/miami',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ベンダープロファイル',
                        'url'        => '/ja/profile/2',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => '私たちに関しては',
                        'url'        => '/ja/page/about-us',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'ギャラリー',
                        'url'        => '/ja/page/gallery',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => '近日公開',
                        'url'        => '/ja/page/coming-soon',
                        'item_model' => 'custom',
                        'children'   => array(),
                    )
                ),
            ),
            array(
                'name'       => '接触',
                'url'        => '/ja/contact',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(),
            ),
        );
        DB::table('bc_menu_translations')->insert([
            'origin_id'   => '1',
            'locale'      => 'ja',
            'items'       =>json_encode($menu_items_ja),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('bc_settings')->insert(
            [
                [
                    'name'  => 'menu_locations',
                    'val'   => '{"primary":1}',
                    'group' => "general",
                ],
                [
                    'name'  => 'admin_email',
                    'val'   => 'contact@bookingcore.com',
                    'group' => "general",
                ], [
                    'name'  => 'email_from_name',
                    'val'   => 'Guido',
                    'group' => "general",
                ], [
                    'name'  => 'email_from_address',
                    'val'   => 'contact@bookingcore.com',
                    'group' => "general",
                ],
                [
                    'name'  => 'logo_id',
                    'val'   => MediaFile::findMediaByName("logo")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'logo_white_id',
                    'val'   => MediaFile::findMediaByName("logo_white")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_logo_id',
                    'val'   => MediaFile::findMediaByName("footer_logo")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_bg_id',
                    'val'   => MediaFile::findMediaByName("footer-bg")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'site_favicon',
                    'val'   => MediaFile::findMediaByName("favicon")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'topbar_left_text',
                    'val'   => '<div class="socials">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-linkedin"></i></a>
<a href="#"><i class="fa fa-google-plus"></i></a>
</div>
<span class="line"></span>
<a href="mailto:contact@bookingcore.com">contact@bookingcore.com</a>',
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_text_left',
                    'val'   => '<div class="copyright-widget mt10 mb15-767">
						<p>Copyright © 2021 by Guido</p>
					</div>',
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_text_right',
                    'val'   => '<div class="footer_social_widget text-right tac-smd mt10">
                                    <ul class="mb0">
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>',
                    'group' => "general",
                ],
                [
                    'name'  => 'list_widget_footer',
                    'val'   => '[{"title":"Contact Us","size":"4","content":"<ul class=\"list-unstyled\">\r\n\t\t\t\t\t\t\t<li class=\"text-white df\"><span class=\"flaticon-pin mr15\"><\/span><a href=\"#\">329 Queensberry Street, North Melbourne VIC 3051, Australia.<\/a><\/li>\r\n\t\t\t\t\t\t\t<li class=\"text-white\"><span class=\"flaticon-phone mr15\"><\/span><a href=\"#\">+123 456 7890<\/a><\/li>\r\n\t\t\t\t\t\t\t<li class=\"text-white\"><span class=\"flaticon-email mr15\"><\/span><a href=\"#\"><span class=\"__cf_email__\" data-cfemail=\"a1d2d4d1d1ced3d5e1d2cacecdc08fc2cecc\">[email&#160;protected]<\/span><\/a><\/li>\r\n\t\t\t\t\t\t<\/ul>"},{"title":"Company","size":"2","content":"<ul class=\"list-unstyled\">\r\n\t\t\t\t\t\t\t<li><a href=\"#\">Help Center<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">About<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">Career<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">How It Works<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">Article & Tips<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">Terms & Service<\/a><\/li>\r\n\t\t\t\t\t\t<\/ul>"},{"title":"Discover","size":"2","content":"<ul class=\"list-unstyled\">\r\n\t\t\t\t\t\t\t<li><a href=\"#\">Chicago<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">Los Angels<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">Miami<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">New York<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">Florida<\/a><\/li>\r\n\t\t\t\t\t\t\t<li><a href=\"#\">Boston<\/a><\/li>\r\n\t\t\t\t\t\t<\/ul>"}]',
                    'group' => "general",
                ],
                [
                    'name'  => 'list_widget_footer_ja',
                    'val'   => '[{"title":"\u52a9\u3051\u304c\u5fc5\u8981\uff1f","size":"3","content":"<div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u304a\u96fb\u8a71\u304f\u3060\u3055\u3044\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            + 00 222 44 5678\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u90f5\u4fbf\u7269\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            hello@yoursite.com\r\n        <\/div>\r\n    <\/div>\r\n    <div class=\"contact\">\r\n        <div class=\"c-title\">\r\n            \u30d5\u30a9\u30ed\u30fc\u3059\u308b\r\n        <\/div>\r\n        <div class=\"sub\">\r\n            <a href=\"#\">\r\n                <i class=\"icofont-facebook\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n                <i class=\"icofont-twitter\"><\/i>\r\n            <\/a>\r\n            <a href=\"#\">\r\n                <i class=\"icofont-youtube-play\"><\/i>\r\n            <\/a>\r\n        <\/div>\r\n    <\/div>"},{"title":"\u4f1a\u793e","size":"3","content":"<ul>\r\n    <li><a href=\"#\">\u7d04, \u7565<\/a><\/li>\r\n    <li><a href=\"#\">\u30b3\u30df\u30e5\u30cb\u30c6\u30a3\u30d6\u30ed\u30b0<\/a><\/li>\r\n    <li><a href=\"#\">\u5831\u916c<\/a><\/li>\r\n    <li><a href=\"#\">\u3068\u9023\u643a<\/a><\/li>\r\n    <li><a href=\"#\">\u30c1\u30fc\u30e0\u306b\u4f1a\u3046<\/a><\/li>\r\n<\/ul>"},{"title":"\u30b5\u30dd\u30fc\u30c8","size":"3","content":"<ul>\r\n    <li><a href=\"#\">\u30a2\u30ab\u30a6\u30f3\u30c8<\/a><\/li>\r\n    <li><a href=\"#\">\u6cd5\u7684<\/a><\/li>\r\n    <li><a href=\"#\">\u63a5\u89e6<\/a><\/li>\r\n    <li><a href=\"#\">\u30a2\u30d5\u30a3\u30ea\u30a8\u30a4\u30c8\u30d7\u30ed\u30b0\u30e9\u30e0<\/a><\/li>\r\n    <li><a href=\"#\">\u500b\u4eba\u60c5\u5831\u4fdd\u8b77\u65b9\u91dd<\/a><\/li>\r\n<\/ul>"},{"title":"\u8a2d\u5b9a","size":"3","content":"<ul>\r\n<li><a href=\"#\">\u8a2d\u5b9a1<\/a><\/li>\r\n<li><a href=\"#\">\u8a2d\u5b9a2<\/a><\/li>\r\n<\/ul>"}]',
                    'group' => "general",
                ]
            ]
        );

        $banner_home_mix = MediaFile::findMediaByName("home-mix")->id;
        $image_home_mix_1 = MediaFile::findMediaByName("image_home_mix_1")->id;
        $image_home_mix_2 = MediaFile::findMediaByName("image_home_mix_2")->id;
        $image_home_mix_3 = MediaFile::findMediaByName("image_home_mix_3")->id;
        $avatar = MediaFile::findMediaByName("avatar")->id;
        $avatar_2 = MediaFile::findMediaByName("avatar-2")->id;
        $avatar_3 = MediaFile::findMediaByName("avatar-3")->id;
        $testimonial = MediaFile::findMediaByName("testimonial")->id;
        $testimonial_2 = MediaFile::findMediaByName("testimonial-2")->id;
        $testimonial_3 = MediaFile::findMediaByName("testimonial-3")->id;
        $form_search_all_service_background = MediaFile::findMediaByName('background-1')->id;
        $how_it_work_bg = MediaFile::findMediaByName('background-4')->id;
        $pattern_3 = MediaFile::findMediaByName('pattern-3')->id;
        // Setting Home Page
        DB::table('bc_templates')->insert([
            'title'       => 'Home Page',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event","property"],"title":"Explore Amazing Destinations","sub_title":"Find great places to stay, eat, shop, or visit from local experts.","bg_image":'.$form_search_all_service_background.',"style":"","list_slider":[],"title_for_property":"","hide_form_search":"","enable_category_box":true,"list_property_category":[1,2,3,4,5,6],"hide_tab_form_search":true},
    "component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"The Most Popular Things to Do in the City","desc":"Discover some of the most popular listings in Toronto based on user reviews and ratings.","number":12,"location_id":"","order":"","order_by":"","is_featured":""},"component":"RegularBlock","open":true},{"type":"list_locations","name":"List Locations","model":{"service_type":["space","hotel","tour","property"],"title":"Trending Cities","desc":"Cities You Must Explore This Summer","number":4,"layout":"style_1","order":"id","order_by":"asc","to_location_detail":true,"custom_ids":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"title":"How it Works","sub_title":"Bringing business and community members together.","list_item":[{"_active":true,"title":"Find Businesses","sub_title":"Discover & connect with great local businesses in your local neighborhood like dentists, hair stylists and more.","icon":"flaticon-find-location","order":null},{"_active":true,"title":"Review Listings","sub_title":"Discover & connect with great local businesses in your local neighborhood like dentists, hair stylists and more.","icon":"flaticon-comment","order":null},{"_active":true,"title":"Make a Reservation","sub_title":"Discover & connect with great local businesses in your local neighborhood like dentists, hair stylists and more.","icon":"flaticon-date","order":null}]},"component":"RegularBlock","open":true},{"type":"testimonial","name":"List Testimonial","model":{"title":"Testimonials From Our Customers","list_item":[{"_active":true,"name":"Eva Hicks","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial.'},{"_active":true,"name":"Daniel Parker","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_2.'},{"_active":true,"name":"Alison Dawn","career":"WordPress Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_3.'},{"_active":true,"name":"Eva Hicks","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial.'},{"_active":true,"name":"Daniel Parker","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_2.'},{"_active":true,"name":"Alison Dawn","career":"WordPress Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_3.'}],"sub_title":"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor"},"component":"RegularBlock","open":true,"is_container":false},{"type":"how_it_works","name":"How It Works","model":{"title":"Get Business Exposure","sub_title":"Your business deserves efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.","link_title":"How it work","link_more":"#","background_image":'.$how_it_work_bg.'},"component":"RegularBlock","open":true},{"type":"list_news","name":"News: List Items","model":{"title":"News & Tips","desc":"Checkout Latest News And Articles From Our Blog.","limit":3,"category_id":"","order":"id","order_by":"asc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Submit Your Property Today!","sub_title":"Explore some of the best tips from around the city from our partners and friends.","link_title":"Submit now","link_more":"#","bg_color":"#2650D9","background_image":'.$pattern_3.'},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('bc_template_translations')->insert([
            'origin_id'   => '1',
            'locale'      => 'ja',
            'title'       => 'ホームページ',
            'content'     => '[{"type":"form_search_all_service","name":"Form Search All Service","model":{"service_types":["hotel","space","tour","car","event","property"],"title":"素晴らしい目的地を探索する","sub_title":"地元の専門家から滞在、食事、買い物、または訪問するのに最適な場所を見つける.","bg_image":'.$form_search_all_service_background.',"style":"","list_slider":[],"title_for_property":"","hide_form_search":"","enable_category_box":true,"list_property_category":[1,2,3,4,5,6],"hide_tab_form_search":true},
    "component":"RegularBlock","open":true,"is_container":false},{"type":"list_property","name":"Property: List Items","model":{"title":"市内で最も人気のあること","desc":"ユーザーレビューと評価に基づいてトロントで最も人気のあるリストのいくつかを発見する.","number":12,"location_id":"","order":"","order_by":"","is_featured":""},"component":"RegularBlock","open":true},{"type":"list_locations","name":"List Locations","model":{"service_type":["space","hotel","tour","property"],"title":"トレンド都市","desc":"今年の夏に探検しなければならない都市","number":4,"layout":"style_1","order":"id","order_by":"asc","to_location_detail":true,"custom_ids":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"title":"使い方","sub_title":"ビジネスとコミュニティのメンバーを結び付ける.","list_item":[{"_active":true,"title":"ビジネスを探す","sub_title":"歯科医、ヘアスタイリストなど、地元の優れた地元企業を見つけて交流しましょう.","icon":"flaticon-find-location","order":null},{"_active":true,"title":"リストを確認する","sub_title":"歯科医、ヘアスタイリストなど、地元の優れた地元企業を見つけて交流しましょう.","icon":"flaticon-comment","order":null},{"_active":true,"title":"予約する","sub_title":"歯科医、ヘアスタイリストなど、地元の優れた地元企業を見つけて交流しましょう.","icon":"flaticon-date","order":null}]},"component":"RegularBlock","open":true},{"type":"testimonial","name":"List Testimonial","model":{"title":"お客様からの声","list_item":[{"_active":true,"name":"Eva Hicks","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial.'},{"_active":true,"name":"Daniel Parker","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_2.'},{"_active":true,"name":"Alison Dawn","career":"WordPress Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_3.'},{"_active":true,"name":"Eva Hicks","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial.'},{"_active":true,"name":"Daniel Parker","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_2.'},{"_active":true,"name":"Alison Dawn","career":"WordPress Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_3.'}],"sub_title":"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor"},"component":"RegularBlock","open":true,"is_container":false},{"type":"how_it_works","name":"How It Works","model":{"title":"ビジネスの露出を得る","sub_title":"あなたのビジネスは、クロスメディアの価値なしにクロスメディア情報を効率的に解き放つに値します。 リアルタイムスキーマのタイムリーな成果物をすばやく最大化.","link_title":"それがどのように働きますか","link_more":"#","background_image":'.$how_it_work_bg.'},"component":"RegularBlock","open":true},{"type":"list_news","name":"News: List Items","model":{"title":"ニュースとヒント","desc":"私たちのブログから最新のニュースや記事をチェックアウト.","limit":3,"category_id":"","order":"id","order_by":"asc"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"今日あなたの財産を提出してください!","sub_title":"私たちのパートナーや友人からの街中からの最高のヒントのいくつかを探索してください.","link_title":"Submit now","link_more":"#","bg_color":"#2650D9","background_image":'.$pattern_3.'},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        $bg_about_us = MediaFile::findMediaByName('background-inner-page-1')->id;
        $bg_about_us_1 = MediaFile::findMediaByName('about-1')->id;
        $partner_1  = MediaFile::findMediaByName('partner-1')->id;
        $partner_2  = MediaFile::findMediaByName('partner-2')->id;
        $partner_3  = MediaFile::findMediaByName('partner-3')->id;
        $partner_4  = MediaFile::findMediaByName('partner-4')->id;
        $partner_5  = MediaFile::findMediaByName('partner-5')->id;
        $partner_6  = MediaFile::findMediaByName('partner-6')->id;


        $team_1  = MediaFile::findMediaByName('team-1')->id;
        $team_2  = MediaFile::findMediaByName('team-2')->id;
        $team_3  = MediaFile::findMediaByName('team-3')->id;
        $team_4  = MediaFile::findMediaByName('team-4')->id;

        DB::table('bc_templates')->insert([
            'title'       => 'About us',
            'content'     => '[{"type":"breadcrumb_section","name":"Breadcrumb","model":{"title":"About Us","title_item_active":"About Us","background_image":'.$bg_about_us.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"video_player","name":"Video Player","model":{"title":"Our Mission Is To Golo","sub_title":"Discover some of the most popular listings in Toronto based on user reviews and ratings.","youtube":"https://www.youtube.com/watch?v=R7xbhKIiw4Y","bg_image":'
                .$bg_about_us_1.',"right_content":"<p class=\"large\" style=\"box-sizing: border-box; margin: 0px 0px 30px; font-size: 15px; color: #222222; line-height: 21.68px; font-family: Jost, sans-serif; background-color: #ffffff;\">Mauris ac consectetur ante, dapibus gravida tellus. Nullam aliquet eleifend dapibus. Cras sagittis, ex euismod lacinia tempor.</p>\n<p style=\"box-sizing: border-box; margin: 0px 0px 30px; font-size: 15px; color: #717171; line-height: 21.68px; font-family: Jost, sans-serif; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut scelerisque tempor faucibus tempor tincidunt egestas morbi at congue. Imperdiet blandit ac neque commodo integer turpis. Eget orci sed viverra in sed. Ipsum amet eu mauris ac. Semper netus gravida adipiscing consectetur velit aliquam tellus lobortis blandit. Adipiscing tincidunt maecenas et mattis lectus sit amet tellus.</p>\n<p style=\"box-sizing: border-box; margin: 0px 0px 30px; font-size: 15px; color: #717171; line-height: 21.68px; font-family: Jost, sans-serif; background-color: #ffffff;\">Tincidunt nec condimentum lacus enim, ac arcu condimentum porttitor sollicitudin. Id elementum erat hendrerit a mi gravida iaculis non. Ullamcorper nisl vel pretium tellus, elit duis leo sed. Habitasse eget arcu tellus faucibus.</p>"},"component":"RegularBlock","open":true,"is_container":false},{"type":"counter_to_number","name":"Counter to number","model":{"title":"","sub_title":"","list_item":[{"_active":true,"title":"Happy customers","number":"749","suffix":null},{"_active":true,"title":"Listing pages","number":"852","suffix":null},{"_active":true,"title":"Best followers","number":"28","suffix":"K="},{"_active":true,"title":"Team members","number":"53","suffix":"K+"}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"title":"How it Works","sub_title":"Bringing business and community members together.","list_item":[{"_active":true,"title":"Find Businesses","sub_title":"Discover & connect with great local businesses in your local neighborhood like dentists, hair stylists and more.","icon":"flaticon-find-location","order":null},{"_active":true,"title":"Review Listings","sub_title":"Discover & connect with great local businesses in your local neighborhood like dentists, hair stylists and more.","icon":"flaticon-comment","order":null},{"_active":true,"title":"Make a Reservation","sub_title":"Discover & connect with great local businesses in your local neighborhood like dentists, hair stylists and more.","icon":"flaticon-date","order":null}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Testimonials From Our Customers","list_item":[{"_active":true,"name":"Eva Hicks","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial.'},{"_active":true,"name":"Daniel Parker","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_2.'},{"_active":true,"name":"Alison Dawn","career":"WordPress Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_3.'},{"_active":true,"name":"Eva Hicks","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial.'},{"_active":true,"name":"Daniel Parker","career":"Front-end Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_2.'},{"_active":true,"name":"Alison Dawn","career":"WordPress Developer","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_3.'}],"sub_title":"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor"},"component":"RegularBlock","open":true,"is_container":false},{"type":"how_it_works","name":"How It Works","model":{"title":"Get Business Exposure","sub_title":"Your business deserves efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.","link_title":"How it work","link_more":"#","background_image":'.$how_it_work_bg.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"out_team","name":"Our Team","model":{"title":"Our Team","sub_title":"Cities You Must Explore This Summer.","list_item":[{"_active":true,"name":"Kathryn Murphy","career":"Photographer","avatar":'.$team_1.',"facebook":"#","twitter":"#","instagram":"#","linkedin":"#","order":null},{"_active":true,"name":"Esther Howard","career":"Co-manager associated","avatar":'.$team_2.',"facebook":"#","twitter":"#","instagram":"#","linkedin":"#","order":null},{"_active":true,"name":"Bessie Cooper","career":"Designer","avatar":'.$team_3.',"facebook":"#","twitter":"#","instagram":"#","linkedin":"#","order":null},{"_active":true,"name":"Jacob Jones","career":"Business consultant","avatar":'.$team_4.',"facebook":"#","twitter":"#","instagram":"#","linkedin":"#","order":null}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"partners","name":"Our Partners","model":{"title":"","desc":"","list_item":[{"_active":true,"avatar":'.$partner_1.'},{"_active":true,"avatar":'.$partner_2.'},{"_active":true,"avatar":'.$partner_3.'},{"_active":true,"avatar":'.$partner_4.'},{"_active":true,"avatar":'.$partner_5.'},{"_active":true,"avatar":'.$partner_6.'}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Submit Your Property Today!","sub_title":"Explore some of the best tips from around the city from our partners and friends.","link_title":"Submit now","link_more":"#","bg_color":"#2650D9","background_image":'.$pattern_3.'},"component":"RegularBlock","open":true}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('bc_template_translations')->insert([
            'origin_id'   => '2',
            'locale'      => 'ja',
            'title'       => '私たちに関しては',
            'content'     => '[{"type":"breadcrumb_section","name":"Breadcrumb","model":{"title":"私たちに関しては","title_item_active":"私たちに関しては","background_image":'.$bg_about_us.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"video_player","name":"Video Player","model":{"title":"私たちの使命はゴロです","sub_title":"ユーザーレビューと評価に基づいてトロントで最も人気のあるリストのいくつかを発見する.","youtube":"https://www.youtube.com/watch?v=R7xbhKIiw4Y","bg_image":'
                .$bg_about_us_1.',"right_content":"<p class=\"large\" style=\"box-sizing: border-box; margin: 0px 0px 30px; font-size: 15px; color: #222222; line-height: 21.68px; font-family: Jost, sans-serif; background-color: #ffffff;\">Mauris ac consectetur ante, dapibus gravida tellus. Nullam aliquet eleifend dapibus. Cras sagittis, ex euismod lacinia tempor.</p>\n<p style=\"box-sizing: border-box; margin: 0px 0px 30px; font-size: 15px; color: #717171; line-height: 21.68px; font-family: Jost, sans-serif; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut scelerisque tempor faucibus tempor tincidunt egestas morbi at congue. Imperdiet blandit ac neque commodo integer turpis. Eget orci sed viverra in sed. Ipsum amet eu mauris ac. Semper netus gravida adipiscing consectetur velit aliquam tellus lobortis blandit. Adipiscing tincidunt maecenas et mattis lectus sit amet tellus.</p>\n<p style=\"box-sizing: border-box; margin: 0px 0px 30px; font-size: 15px; color: #717171; line-height: 21.68px; font-family: Jost, sans-serif; background-color: #ffffff;\">Tincidunt nec condimentum lacus enim, ac arcu condimentum porttitor sollicitudin. Id elementum erat hendrerit a mi gravida iaculis non. Ullamcorper nisl vel pretium tellus, elit duis leo sed. Habitasse eget arcu tellus faucibus.</p>"},"component":"RegularBlock","open":true,"is_container":false},{"type":"counter_to_number","name":"Counter to number","model":{"title":"","sub_title":"","list_item":[{"_active":true,"title":"幸せな顧客","number":"749","suffix":null},{"_active":true,"title":"ページの一覧","number":"852","suffix":null},{"_active":true,"title":"最高のフォロワー","number":"28","suffix":"K="},{"_active":true,"title":"チームメンバー","number":"53","suffix":"K+"}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_featured_item","name":"List Featured Item","model":{"title":"使い方","sub_title":"ビジネスとコミュニティのメンバーを結び付ける.","list_item":[{"_active":true,"title":"ビジネスを探す","sub_title":"歯科医、ヘアスタイリストなど、地元の素晴らしい地元企業を見つけて交流しましょう.","icon":"flaticon-find-location","order":null},{"_active":true,"title":"リストを確認する","sub_title":"歯科医、ヘアスタイリストなど、地元の素晴らしい地元企業を見つけて交流しましょう.","icon":"flaticon-comment","order":null},{"_active":true,"title":"予約する","sub_title":"歯科医、ヘアスタイリストなど、地元の素晴らしい地元企業を見つけて交流しましょう.","icon":"flaticon-date","order":null}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"お客様からの声","list_item":[{"_active":true,"name":"Eva Hicks","career":"フロントエンドの開発者","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial.'},{"_active":true,"name":"Daniel Parker","career":"フロントエンドの開発者","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_2.'},{"_active":true,"name":"Alison Dawn","career":"WordPress開発者","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_3.'},{"_active":true,"name":"Eva Hicks","career":"フロントエンドの開発者","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial.'},{"_active":true,"name":"Daniel Parker","career":"フロントエンドの開発者","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_2.'},{"_active":true,"name":"Alison Dawn","career":"WordPress開発者","desc":"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. ","number_star":5,"avatar":'.$testimonial_3.'}],"sub_title":"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor"},"component":"RegularBlock","open":true,"is_container":false},{"type":"how_it_works","name":"How It Works","model":{"title":"ビジネスの露出を得る","sub_title":"あなたのビジネスは、クロスメディアの価値なしにクロスメディア情報を効率的に解き放つに値します。リアルタイムスキーマのタイムリーな成果物をすばやく最大化.","link_title":"それがどのように働きますか","link_more":"#","background_image":'.$how_it_work_bg.'},"component":"RegularBlock","open":true,"is_container":false},{"type":"out_team","name":"Our Team","model":{"title":"私たちのチーム","sub_title":"今年の夏に探検しなければならない都市.","list_item":[{"_active":true,"name":"Kathryn Murphy","career":"Photographer","avatar":'.$team_1.',"facebook":"#","twitter":"#","instagram":"#","linkedin":"#","order":null},{"_active":true,"name":"Esther Howard","career":"Co-manager associated","avatar":'.$team_2.',"facebook":"#","twitter":"#","instagram":"#","linkedin":"#","order":null},{"_active":true,"name":"Bessie Cooper","career":"Designer","avatar":'.$team_3.',"facebook":"#","twitter":"#","instagram":"#","linkedin":"#","order":null},{"_active":true,"name":"Jacob Jones","career":"Business consultant","avatar":'.$team_4.',"facebook":"#","twitter":"#","instagram":"#","linkedin":"#","order":null}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"partners","name":"Our Partners","model":{"title":"","desc":"","list_item":[{"_active":true,"avatar":'.$partner_1.'},{"_active":true,"avatar":'.$partner_2.'},{"_active":true,"avatar":'.$partner_3.'},{"_active":true,"avatar":'.$partner_4.'},{"_active":true,"avatar":'.$partner_5.'},{"_active":true,"avatar":'.$partner_6.'}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"今日あなたの財産を提出してください!","sub_title":"私たちのパートナーや友人からの街中からの最高のヒントのいくつかを探索してください.","link_title":"Submit now","link_more":"#","bg_color":"#2650D9","background_image":'.$pattern_3.'},"component":"RegularBlock","open":true}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        for ($i=1; $i<=6; $i++ ) {
            $gallery[$i] = MediaFile::findMediaByName('property-gallery-'.$i)->id;
        }

        DB::table('bc_templates')->insert([
            'title'       => 'Gallery',
            'content'     => '[{"type":"breadcrumb_section","name":"Breadcrumb","model":{"title":"Gallery","title_item_active":"Gallery","background_image":'.$bg_about_us.'},"component":"RegularBlock","open":true},{"type":"gallery","name":"Gallery","model":{"list_item":[{"_active":true,"gallery_item_img":'.$gallery[1].'},{"_active":true,"gallery_item_img":'.$gallery[2].'},{"_active":true,"gallery_item_img":'.$gallery[3].'},{"_active":true,"gallery_item_img":'.$gallery[4].'},{"_active":true,"gallery_item_img":'.$gallery[5].'},{"_active":true,"gallery_item_img":'.$gallery[6].'}]},"component":"RegularBlock","open":true}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('bc_template_translations')->insert([
            'origin_id'   => '3',
            'locale'      => 'ja',
            'title'       => 'ギャラリー',
            'content'     => '[{"type":"breadcrumb_section","name":"Breadcrumb","model":{"title":"ギャラリー","title_item_active":"Gallery","background_image":'.$bg_about_us.'},"component":"RegularBlock","open":true},{"type":"gallery","name":"Gallery","model":{"list_item":[{"_active":true,"gallery_item_img":'.$gallery[1].'},{"_active":true,"gallery_item_img":'.$gallery[2].'},{"_active":true,"gallery_item_img":'.$gallery[3].'},{"_active":true,"gallery_item_img":'.$gallery[4].'},{"_active":true,"gallery_item_img":'.$gallery[5].'},{"_active":true,"gallery_item_img":'.$gallery[6].'}]},"component":"RegularBlock","open":true}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        $coming_soon_image = MediaFile::findMediaByName('coming_soon')->id;
        $dt = new DateTime("+30 days");
        $coming_soon_date =  $dt->format(DateTime::W3C);
        DB::table('bc_templates')->insert([
            'title'       => 'Coming soon',
            'content'     => '[{"type":"coming_soon","name":"Coming Soon","model":{"title":"We\'re coming soon.","content":"Our website is under construction. We\'ll be here soon with our new\nawesome site, subscribe to be notified.","coming_day":"'.$coming_soon_date.'","coming_soon_image":'.$coming_soon_image.'},"component":"RegularBlock","open":true}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('bc_template_translations')->insert([
            'origin_id'   => '4',
            'locale'      => 'ja',
            'title'       => '近日公開',
            'content'     => '[{"type":"coming_soon","name":"Coming Soon","model":{"title":"もうすぐです。","content":"当社のウェブサイトは現在作成中です。 私たちはすぐに私たちの新しいでここにいます\n素晴らしいサイト、通知を購読してください。","coming_day":"'.$coming_soon_date.'","coming_soon_image":'.$coming_soon_image.'},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('bc_pages')->insert([
            'title'       => 'Home Page',
            'slug'        => 'home-page',
            'header_style'        => 'transparent',
            'template_id' => '1',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('bc_pages')->insert([
            'title'       => 'About us',
            'slug'        => 'about-us',
            'header_style'        => 'normal',
            'template_id' => '2',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('bc_pages')->insert([
            'title'       => 'Gallery',
            'slug'        => 'gallery',
            'header_style'        => 'normal',
            'template_id' => '3',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('bc_pages')->insert([
            'title'       => 'Coming soon',
            'slug'        => 'coming-soon',
            'header_style'=> 'normal',
            'template_id' => '4',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);


        $a = new Modules\Page\Models\Page();
        $a->title = "Privacy policy";
        $a->create_user = 1;
        $a->status = 'publish';
        $a->created_at = date("Y-m-d H:i:s");
        $a->content = '<h1>Privacy policy</h1>
<p> This privacy policy (&quot;Policy&quot;) describes how the personally identifiable information (&quot;Personal Information&quot;) you may provide on the <a target="_blank" rel="nofollow" href="http://dev.bookingcore.org">dev.bookingcore.org</a> website (&quot;Website&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;) is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.</p>
<h2>Automatic collection of information</h2>
<p>When you open the Website, our servers automatically record information that your browser sends. This data may include information such as your device\'s IP address, browser type and version, operating system type and version, language preferences or the webpage you were visiting before you came to the Website and Services, pages of the Website and Services that you visit, the time spent on those pages, information you search for on the Website, access times and dates, and other statistics.</p>
<p>Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage and traffic of the Website and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p>
<h2>Collection of personal information</h2>
<p>You can access and use the Website and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features on the Website, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content,  or fill any online forms on the Website. When required, this information may include the following:</p>
<ul>
<li>Personal details such as name, country of residence, etc.</li>
<li>Contact information such as email address, address, etc.</li>
<li>Account details such as user name, unique user ID, password, etc.</li>
<li>Information about other individuals such as your family members, friends, etc.</li>
</ul>
<p>Some of the information we collect is directly from you via the Website and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features on the Website. Users who are uncertain about what information is mandatory are welcome to contact us.</p>
<h2>Use and processing of collected information</h2>
<p>In order to make the Website and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:</p>
<ul>
<li>Create and manage user accounts</li>
<li>Send administrative information</li>
<li>Request user feedback</li>
<li>Improve user experience</li>
<li>Enforce terms and conditions and policies</li>
<li>Run and operate the Website and Services</li>
</ul>
<p>Processing your Personal Information depends on how you interact with the Website and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.</p>
<p> Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</p>
<h2>Managing information</h2>
<p>You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Website and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so by contacting us.</p>
<h2>Disclosure of information</h2>
<p> Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Website and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.</p>
<p>We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p>
<h2>Retention of information</h2>
<p>We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.</p>
<h2>The rights of users</h2>
<p>You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.</p>
<h2>Privacy of children</h2>
<p>We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Website and Services. We encourage parents and legal guardians to monitor their children\'s Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Website and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Website and Services, please contact us. You must also be old enough to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).</p>
<h2>Cookies</h2>
<p>The Website and Services use &quot;cookies&quot; to help personalize your online experience. A cookie is a text file that is placed on your hard disk by a web page server. Cookies cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to you, and can only be read by a web server in the domain that issued the cookie to you.</p>
<p>We may use cookies to collect, store, and track information for statistical purposes to operate the Website and Services. You have the ability to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. To learn more about cookies and how to manage them, visit <a target="_blank" href="https://www.internetcookies.org">internetcookies.org</a></p>
<h2>Do Not Track signals</h2>
<p>Some browsers incorporate a Do Not Track feature that signals to websites you visit that you do not want to have your online activity tracked. Tracking is not the same as using or collecting information in connection with a website. For these purposes, tracking refers to collecting personally identifiable information from consumers who use or visit a website or online service as they move across different websites over time. How browsers communicate the Do Not Track signal is not yet uniform. As a result, the Website and Services are not yet set up to interpret or respond to Do Not Track signals communicated by your browser. Even so, as described in more detail throughout this Policy, we limit our use and collection of your personal information.</p>
<h2>Email marketing</h2>
<p>We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.</p>
<p>In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.</p>
<h2>Links to other resources</h2>
<p>The Website and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Website and Services and to read the privacy statements of each and every resource that may collect Personal Information.</p>
<h2>Information security</h2>
<p>We secure information you provide on computer servers in a controlled, secure environment, protected from unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Website and Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.</p>
<h2>Data breach</h2>
<p>In the event we become aware that the security of the Website and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will post a notice on the Website, send you an email.</p>
<h2>Changes and amendments</h2>
<p>We reserve the right to modify this Policy or its terms relating to the Website and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will post a notification on the main page of the Website. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Website and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not, without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected. Policy was created with <a style="color:inherit" target="_blank" href="https://www.websitepolicies.com/privacy-policy-generator">WebsitePolicies</a>.</p>
<h2>Acceptance of this policy</h2>
<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services.</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information, you may do so via the <a target="_blank" rel="nofollow" href="http://dev.bookingcore.org/contact">contact form</a></p>
<p>This document was last updated on October 6, 2020</p>';
        $a->save();
        DB::table('bc_settings')->insert([
                [
                    'name'  => 'home_page_id',
                    'val'   => '1',
                    'group' => "general",
                ],
                [
                    'name'  => 'contact_form_title',
                    'val'   => "Get in touch with us",
                    'group' => "general",
                ],
                [
                    'name'  => 'contact_form_title_ja',
                    'val'   => "私たちと連絡を取る",
                    'group' => "general",
                ],
                [
                    'name'  => 'map_contact_lat',
                    'val'   => "36.401066",
                    'group' => "general",
                ],
                [
                    'name'  => 'map_contact_long',
                    'val'   => "-88.312292",
                    'group' => "general",
                ],
                [
                    'name'  => 'map_contact_zoom',
                    'val'   => "8",
                    'group' => "general",
                ],
                [
                    'name'  => 'our_offices_title',
                    'val'   => "Our Offices",
                    'group' => "general",
                ],
                [
                    'name'  => 'our_offices_title_ja',
                    'val'   => "私たちのオフィス",
                    'group' => "general",
                ],
                [
                    'name'  => 'list_info_contact',
                    'val'   => '[{"title":"London","content":"<ul class=\"list-unstyled\">\r\n     <li class=\"df\">\r\n          <i class=\"flaticon-pin mr15\"><\/i>\r\n          <a href=\"#\">329 Queensberry Street, North<br>Melbourne VIC 3051, Australia.<\/a>\r\n     <\/li>\r\n      <li>\r\n            <i class=\"flaticon-phone mr15\"><\/i>\r\n             <a href=\"#\">123 456 7890<\/a>\r\n      <\/li>\r\n       <li>\r\n              <i class=\"flaticon-email mr15\"><\/i>\r\n              <a href=\"#\">[email&nbsp;protected]<\/a>\r\n       <\/li>\r\n<\/ul>\r\n<a class=\"tdu text-thm direction\" href=\"#\">Get Direction<\/a>"},{"title":"New York","content":"<ul class=\"list-unstyled\">\r\n     <li class=\"df\">\r\n          <i class=\"flaticon-pin mr15\"><\/i>\r\n          <a href=\"#\">329 Queensberry Street, North<br>Melbourne VIC 3051, Australia.<\/a>\r\n     <\/li>\r\n      <li>\r\n            <i class=\"flaticon-phone mr15\"><\/i>\r\n             <a href=\"#\">123 456 7890<\/a>\r\n      <\/li>\r\n       <li>\r\n              <i class=\"flaticon-email mr15\"><\/i>\r\n              <a href=\"#\">[email&nbsp;protected]<\/a>\r\n       <\/li>\r\n<\/ul>\r\n<a class=\"tdu text-thm direction\" href=\"#\">Get Direction<\/a>"}]',
                    'group' => "general",
                ],
                [
                    'name'  => 'list_info_contact_ja',
                    'val'   => '[{"title":"ロンドン","content":"<ul class=\"list-unstyled\">\r\n     <li class=\"df\">\r\n          <i class=\"flaticon-pin mr15\"><\/i>\r\n          <a href=\"#\">329 Queensberry Street, North<br>Melbourne VIC 3051, Australia.<\/a>\r\n     <\/li>\r\n      <li>\r\n            <i class=\"flaticon-phone mr15\"><\/i>\r\n             <a href=\"#\">123 456 7890<\/a>\r\n      <\/li>\r\n       <li>\r\n              <i class=\"flaticon-email mr15\"><\/i>\r\n              <a href=\"#\">[email&nbsp;protected]<\/a>\r\n       <\/li>\r\n<\/ul>\r\n<a class=\"tdu text-thm direction\" href=\"#\">Get Direction<\/a>"},{"title":"ニューヨーク","content":"<ul class=\"list-unstyled\">\r\n     <li class=\"df\">\r\n          <i class=\"flaticon-pin mr15\"><\/i>\r\n          <a href=\"#\">329 Queensberry Street, North<br>Melbourne VIC 3051, Australia.<\/a>\r\n     <\/li>\r\n      <li>\r\n            <i class=\"flaticon-phone mr15\"><\/i>\r\n             <a href=\"#\">123 456 7890<\/a>\r\n      <\/li>\r\n       <li>\r\n              <i class=\"flaticon-email mr15\"><\/i>\r\n              <a href=\"#\">[email&nbsp;protected]<\/a>\r\n       <\/li>\r\n<\/ul>\r\n<a class=\"tdu text-thm direction\" href=\"#\">Get Direction<\/a>"}]',
                    'group' => "general",
                ],
                [
                    'name'  => 'contact_banner',
                    'val'   => MediaFile::findMediaByName("contact_banner")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'error_404_banner',
                    'val'   => MediaFile::findMediaByName("error_404_banner")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'error_title',
                    'val'   => "Ohh! Page Not Found",
                    'group' => "general",
                ],
                [
                    'name'  => 'error_desc',
                    'val'   => "We can’t seem to find the page you’re looking for",
                    'group' => "general",
                ],
                [
                    'name'  => 'error_desc_ja',
                    'val'   => "お探しのページが見つからないようです",
                    'group' => "general",
                ]
            ]);
        // Setting Currency
        DB::table('bc_settings')->insert([
                [
                    'name'  => "currency_main",
                    'val'   => "usd",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_format",
                    'val'   => "left",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_decimal",
                    'val'   => ",",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_thousand",
                    'val'   => ".",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_no_decimal",
                    'val'   => "0",
                    'group' => "payment",
                ],
                [
                    'name'  => "extra_currency",
                    'val'   => '[{"currency_main":"eur","currency_format":"left","currency_thousand":".","currency_decimal":",","currency_no_decimal":"2","rate":"0.902807"},{"currency_main":"jpy","currency_format":"right_space","currency_thousand":".","currency_decimal":",","currency_no_decimal":"0","rate":"0.00917113"}]',
                    'group' => "payment",
                ]
            ]);
        //MAP
        DB::table('bc_settings')->insert([
                [
                    'name'  => 'map_provider',
                    'val'   => 'gmap',
                    'group' => "advance",
                ],
                [
                    'name'  => 'map_gmap_key',
                    'val'   => '',
                    'group' => "advance",
                ]
            ]);
        // Payment Gateways
        DB::table('bc_settings')->insert([
                [
                    'name'  => "g_offline_payment_enable",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_offline_payment_name",
                    'val'   => "Offline Payment",
                    'group' => "payment",
                ]
            ]);
        // Settings general
        DB::table('bc_settings')->insert([
                [
                    'name'  => "date_format",
                    'val'   => "m/d/Y",
                    'group' => "general",
                ],
                [
                    'name'  => "site_title",
                    'val'   => "Guido",
                    'group' => "general",
                ],
            ]);
        // Email general
        DB::table('bc_settings')->insert([
                [
                    'name'  => "site_timezone",
                    'val'   => "UTC",
                    'group' => "general",
                ],
                [
                    'name'  => "site_title",
                    'val'   => "Guido",
                    'group' => "general",
                ],
                [
                    'name'  => "email_header",
                    'val'   => '<h1 class="site-title" style="text-align: center">Guido</h1>',
                    'group' => "general",
                ],
                [
                    'name'  => "email_footer",
                    'val'   => '<p class="" style="text-align: center">&copy; 2021 Guido. All rights reserved</p>',
                    'group' => "general",
                ],
                [
                    'name'  => "enable_mail_user_registered",
                    'val'   => 1,
                    'group' => "user",
                ],
                [
                    'name'  => "user_content_email_registered",
                    'val'   => '<h1 style="text-align: center">Welcome!</h1>
                    <h3>Hello [first_name] [last_name]</h3>
                    <p>Thank you for signing up with Guido! We hope you enjoy your time with us.</p>
                    <p>Regards,</p>
                    <p>Guido</p>',
                    'group' => "user",
                ],
                [
                    'name'  => "admin_enable_mail_user_registered",
                    'val'   => 1,
                    'group' => "user",
                ],
                [
                    'name'  => "admin_content_email_user_registered",
                    'val'   => '<h3>Hello Administrator</h3>
                    <p>We have new registration</p>
                    <p>Full name: [first_name] [last_name]</p>
                    <p>Email: [email]</p>
                    <p>Regards,</p>
                    <p>Guido</p>',
                    'group' => "user",
                ],
                [
                    'name'  => "user_content_email_forget_password",
                    'val'   => '<h1>Hello!</h1>
                    <p>You are receiving this email because we received a password reset request for your account.</p>
                    <p style="text-align: center">[button_reset_password]</p>
                    <p>This password reset link expire in 60 minutes.</p>
                    <p>If you did not request a password reset, no further action is required.
                    </p>
                    <p>Regards,</p>
                    <p>Guido</p>',
                    'group' => "user",
                ]
            ]);
        // Email Setting
        DB::table('bc_settings')->insert([
                [
                    'name'  => "email_driver",
                    'val'   => "log",
                    'group' => "email",
                ],
                [
                    'name'  => "email_host",
                    'val'   => "smtp.mailgun.org",
                    'group' => "email",
                ],
                [
                    'name'  => "email_port",
                    'val'   => "587",
                    'group' => "email",
                ],
                [
                    'name'  => "email_encryption",
                    'val'   => "tls",
                    'group' => "email",
                ],
                [
                    'name'  => "email_username",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_password",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_domain",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_secret",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_endpoint",
                    'val'   => "api.mailgun.net",
                    'group' => "email",
                ],
                [
                    'name'  => "email_postmark_token",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_key",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_secret",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_region",
                    'val'   => "us-east-1",
                    'group' => "email",
                ],
                [
                    'name'  => "email_sparkpost_secret",
                    'val'   => "",
                    'group' => "email",
                ],
            ]);
        // Email Setting
        DB::table('bc_settings')->insert([
            [
                'name'  => "booking_enquiry_for_hotel",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_tour",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_space",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_car",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_for_event",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_type",
                'val'   => "booking_and_enquiry",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_enable_mail_to_vendor",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_mail_to_vendor_content",
                'val'   => "<h3>Hello [vendor_name]</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Regards,</p>
                            <p>Guido</p>
                            </div>",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_enable_mail_to_admin",
                'val'   => "1",
                'group' => "enquiry",
            ],
            [
                'name'  => "booking_enquiry_mail_to_admin_content",
                'val'   => "<h3>Hello Administrator</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Vendor:[vendor_link]</p>
                            <p>Regards,</p>
                            <p>Guido</p>",
                'group' => "enquiry",
            ],
        ]);
        // Vendor setting
        DB::table('bc_settings')->insert([
                [
                    'name'  => "vendor_enable",
                    'val'   => "1",
                    'group' => "vendor",
                ],
                [
                    'name'  => "vendor_commission_type",
                    'val'   => "percent",
                    'group' => "vendor",
                ],
                [
                    'name'  => "vendor_commission_amount",
                    'val'   => "10",
                    'group' => "vendor",
                ],
                [
                    'name'  => "vendor_role",
                    'val'   => "1",
                    'group' => "vendor",
                ],
                [
                    'name'  => "role_verify_fields",
                    'val'   => '{"phone":{"name":"Phone","type":"text","roles":["1","2","3"],"required":null,"order":null,"icon":"fa fa-phone"},"id_card":{"name":"ID Card","type":"file","roles":["1","2","3"],"required":"1","order":"0","icon":"fa fa-id-card"},"trade_license":{"name":"Trade License","type":"multi_files","roles":["1","3"],"required":"1","order":"0","icon":"fa fa-copyright"}}',
                    'group' => "vendor",
                ],
            ]);
        DB::table('bc_settings')->insert([
                'name'  => 'enable_mail_vendor_registered',
                'val'   => '1',
                'group' => 'vendor'
            ]);
        DB::table('bc_settings')->insert([
                'name'  => 'vendor_content_email_registered',
                'val'   => '<h1 style="text-align: center;">Welcome!</h1>
                            <h3>Hello [first_name] [last_name]</h3>
                            <p>Thank you for signing up with Guido! We hope you enjoy your time with us.</p>
                            <p>Regards,</p>
                            <p>Guido</p>',
                'group' => 'vendor'
            ]);
        DB::table('bc_settings')->insert([
                'name'  => 'admin_enable_mail_vendor_registered',
                'val'   => '1',
                'group' => 'vendor'
            ]);
        DB::table('bc_settings')->insert([
                'name'  => 'admin_content_email_vendor_registered',
                'val'   => '<h3>Hello Administrator</h3>
                            <p>An user has been registered as Vendor. Please check the information bellow:</p>
                            <p>Full name: [first_name] [last_name]</p>
                            <p>Email: [email]</p>
                            <p>Registration date: [created_at]</p>
                            <p>You can approved the request here: [link_approved]</p>
                            <p>Regards,</p>
                            <p>Guido</p>',
                'group' => 'vendor'
            ]);
        //            Cookie agreement
        DB::table('bc_settings')->insert([
                [
                    'name'  => "cookie_agreement_enable",
                    'val'   => "1",
                    'group' => "advance",
                ],
                [
                    'name'  => "cookie_agreement_button_text",
                    'val'   => "Got it",
                    'group' => "advance",
                ],
                [
                    'name'  => "cookie_agreement_content",
                    'val'   => "<p>This website requires cookies to provide all of its features. By using our website, you agree to our use of cookies. <a href='#'>More info</a></p>",
                    'group' => "advance",
                ],
            ]);
        // Invoice setting
        DB::table('bc_settings')->insert([
                [
                    'name'  => 'logo_invoice_id',
                    'val'   => MediaFile::findMediaByName("logo")->id,
                    'group' => "booking",
                ],
                [
                    'name'  => "invoice_company_info",
                    'val'   => "<p><span style=\"font-size: 14pt;\"><strong>Guido Company</strong></span></p>
                                <p>Ha Noi, Viet Nam</p>
                                <p>www.bookingcore.org</p>",
                    'group' => "booking",
                ],
            ]);
            DB::table('bc_settings')->insert(
                [
                    'name'  => 'enable_mail_vendor_registered',
                    'val'   => '1',
                    'group' => 'vendor'
                ]
            );
            DB::table('bc_settings')->insert(
                [
                    'name'  => 'vendor_content_email_registered',
                    'val'   => '<h1 style="text-align: center;">Welcome!</h1>
                            <h3>Hello [first_name] [last_name]</h3>
                            <p>Thank you for signing up with Guido! We hope you enjoy your time with us.</p>
                            <p>Regards,</p>
                            <p>Guido</p>',
                    'group' => 'vendor'
                ]
            );
            DB::table('bc_settings')->insert(
                [
                    'name'  => 'admin_enable_mail_vendor_registered',
                    'val'   => '1',
                    'group' => 'vendor'
                ]
            );
            DB::table('bc_settings')->insert(
                [
                    'name'  => 'admin_content_email_vendor_registered',
                    'val'   => '<h3>Hello Administrator</h3>
                            <p>An user has been registered as Vendor. Please check the information bellow:</p>
                            <p>Full name: [first_name] [last_name]</p>
                            <p>Email: [email]</p>
                            <p>Registration date: [created_at]</p>
                            <p>You can approved the request here: [link_approved]</p>
                            <p>Regards,</p>
                            <p>Guido</p>',
                    'group' => 'vendor'
                ]
            );
            DB::table('bc_settings')->insert([
                [
                    'name'  => "booking_enquiry_enable_mail_to_vendor_content",
                    'val'   => "<h3>Hello [vendor_name]</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Regards,</p>
                            <p>Guido</p>
                            </div>",
                    'group' => "enquiry",
                ]
            ]);
            DB::table('bc_settings')->insert([
                [
                    'name'  => "booking_enquiry_enable_mail_to_admin_content",
                    'val'   => "<h3>Hello Administrator</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Vendor:[vendor_link]</p>
                            <p>Regards,</p>
                            <p>Guido</p>",
                    'group' => "enquiry",
                ],
            ]);
            DB::table('bc_settings')->insert([
                [
                    'name'  => "wallet_module_disable",
                    'val'   => "1",
                    'group' => "wallet",
                ],
            ]);
            DB::table('bc_settings')->insert([
                [
                    'name'  => "enable_search_header",
                    'val'   => "1",
                    'group' => "general",
                ],
            ]);
            DB::table('bc_settings')->insert([
                [
                    'name'  => "enable_category_box",
                    'val'   => "1",
                    'group' => "general",
                ],
            ]);
            DB::table('bc_settings')->insert([
                [
                    'name'  => "enable_location_box",
                    'val'   => "1",
                    'group' => "general",
                ],
            ]);
            DB::table('bc_settings')->insert([
                [
                    'name'  => "header_category_box",
                    'val'   => "[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]",
                    'group' => "general",
                ],
            ]);
            DB::table('bc_settings')->insert([
                [
                    'name'  => "header_location_box",
                    'val'   => "[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]",
                    'group' => "general",
                ],
            ]);

    }
}
