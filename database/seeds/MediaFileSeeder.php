<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //general
        DB::table('media_files')->insert([
            ['file_name' => 'avatar', 'file_path' => 'demo/general/avatar.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'avatar-2', 'file_path' => 'demo/general/avatar-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'avatar-3', 'file_path' => 'demo/general/avatar-3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'testimonial', 'file_path' => 'demo/testimonial/1.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'testimonial-2', 'file_path' => 'demo/testimonial/2.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'testimonial-3', 'file_path' => 'demo/testimonial/3.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'ico_adventurous', 'file_path' => 'demo/general/ico_adventurous.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'ico_localguide', 'file_path' => 'demo/general/ico_localguide.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'ico_maps', 'file_path' => 'demo/general/ico_maps.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'ico_paymethod', 'file_path' => 'demo/general/ico_paymethod.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'logo', 'file_path' => 'demo/general/logo.svg', 'file_type' => 'image/svg+xml', 'file_extension' => 'svg'],
            ['file_name' => 'logo_white', 'file_path' => 'demo/general/logo_white.svg', 'file_type' => 'image/svg+xml', 'file_extension' => 'svg'],
            ['file_name' => 'footer_logo', 'file_path' => 'demo/general/footer-logo.svg', 'file_type' => 'image/svg+xml', 'file_extension' => 'svg'],
            ['file_name' => 'contact_banner', 'file_path' => 'demo/general/contact_banner.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'favicon', 'file_path' => 'demo/general/favicon.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'thumb-vendor-register', 'file_path' => 'demo/general/thumb-vendor-register.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'bg-video-vendor-register1', 'file_path' => 'demo/general/bg-video-vendor-register1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'ico_chat_1', 'file_path' => 'demo/general/ico_chat_1.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'ico_friendship_1', 'file_path' => 'demo/general/ico_friendship_1.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'ico_piggy-bank_1', 'file_path' => 'demo/general/ico_piggy-bank_1.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'home-mix', 'file_path' => 'demo/general/home-mix.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_1', 'file_path' => 'demo/general/image_home_mix_1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_2', 'file_path' => 'demo/general/image_home_mix_2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'image_home_mix_3', 'file_path' => 'demo/general/image_home_mix_3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'about-1', 'file_path' => 'demo/general/about-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],

            ['file_name' => 'background-1', 'file_path' => 'demo/background/1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'background-2', 'file_path' => 'demo/background/2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'background-3', 'file_path' => 'demo/background/3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'background-4', 'file_path' => 'demo/background/4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'background-5', 'file_path' => 'demo/background/5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],

            ['file_name' => 'background-inner-page-1', 'file_path' => 'demo/background/inner-page-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'background-inner-page-2', 'file_path' => 'demo/background/inner-page-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'background-inner-page-3', 'file_path' => 'demo/background/inner-page-3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],

            ['file_name' => 'pattern-1', 'file_path' => 'demo/pattern/1.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'pattern-2', 'file_path' => 'demo/pattern/2.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'pattern-3', 'file_path' => 'demo/pattern/3.png', 'file_type' => 'image/png', 'file_extension' => 'png'],

            ['file_name' => 'partner-1', 'file_path' => 'demo/partners/1.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'partner-2', 'file_path' => 'demo/partners/2.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'partner-3', 'file_path' => 'demo/partners/3.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'partner-4', 'file_path' => 'demo/partners/1.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'partner-5', 'file_path' => 'demo/partners/2.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'partner-6', 'file_path' => 'demo/partners/3.png', 'file_type' => 'image/png', 'file_extension' => 'png'],



            ['file_name' => 'team-1', 'file_path' => 'demo/team/1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'team-2', 'file_path' => 'demo/team/2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'team-3', 'file_path' => 'demo/team/3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'team-4', 'file_path' => 'demo/team/4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'error_404_banner', 'file_path' => 'demo/general/error.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'coming_soon', 'file_path' => 'demo/general/coming-soon.png', 'file_type' => 'image/png', 'file_extension' => 'png'],

            ['file_name' => 'avt-agent', 'file_path' => 'demo/agencies/agent1.svg', 'file_type' => 'image/svg+xml', 'file_extension' => 'svg'],
            ['file_name' => 'avt-agent-2', 'file_path' => 'demo/agencies/agent2.svg', 'file_type' => 'image/svg+xml', 'file_extension' => 'svg'],
            ['file_name' => 'avt-agent-3', 'file_path' => 'demo/agencies/agent3.svg', 'file_type' => 'image/svg+xml', 'file_extension' => 'svg'],


        ]);
//agencies
        for ($i=1 ; $i <= 6 ; $i++){
            DB::table('media_files')->insert([
                ['file_name' => 'agencies-'.$i, 'file_path' => 'demo/agencies/agencies-'.$i.'.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }
        //Property
        for ($i=1 ; $i <= 6 ; $i++){
            DB::table('media_files')->insert([
                ['file_name' => 'icon-property-category-'.$i, 'file_path' => 'demo/property/categories/icon-'.$i.'.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ]);
        }
        for ($i=1 ; $i <= 6 ; $i++){
            DB::table('media_files')->insert([
                ['file_name' => 'property-gallery-'.$i, 'file_path' => 'demo/property/gallery/property-gallery-'.$i.'.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }
        for ($i=1 ; $i <= 3 ; $i++){
            DB::table('media_files')->insert([
                ['file_name' => 'property-video-cover-'.$i, 'file_path' => 'demo/property/video-cover/property-video-cover-'.$i.'.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }
        for ($i=1 ; $i <= 4 ; $i++){
            DB::table('media_files')->insert([
                ['file_name' => 'property-banner-'.$i, 'file_path' => 'demo/property/banner/property-banner-'.$i.'.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }


        DB::table('media_files')->insert([
            ['file_name' => 'banner-search-property', 'file_path' => 'demo/general/home-mix.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'banner-search-property-2', 'file_path' => 'demo/general/home-mix.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
        ]);
        for ($i=1 ; $i <= 9 ; $i++){
            DB::table('media_files')->insert([
                ['file_name' => 'property-'.$i, 'file_path' => 'demo/property/property-'.$i.'.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ]);
        }




        //Location
        DB::table('media_files')->insert([
            ['file_name' => 'location-1', 'file_path' => 'demo/location/location-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-2', 'file_path' => 'demo/location/location-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-3', 'file_path' => 'demo/location/location-3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-4', 'file_path' => 'demo/location/location-4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'location-5', 'file_path' => 'demo/location/location-5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'banner-location-1', 'file_path' => 'demo/location/banner-detail/banner-location-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'trip-idea-1', 'file_path' => 'demo/location/trip-idea/trip-idea-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'trip-idea-2', 'file_path' => 'demo/location/trip-idea/trip-idea-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],

        ]);

        //News
        DB::table('media_files')->insert([
            ['file_name' => 'news-1', 'file_path' => 'demo/news/1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-2', 'file_path' => 'demo/news/2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-3', 'file_path' => 'demo/news/3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-4', 'file_path' => 'demo/news/4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-5', 'file_path' => 'demo/news/5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-6', 'file_path' => 'demo/news/6.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-7', 'file_path' => 'demo/news/7.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
            ['file_name' => 'news-banner', 'file_path' => 'demo/news/news-banner.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'],
        ]);

        //for version 2

        DB::table('media_files')->insert([
            ['file_name' => 'icon_global', 'file_path' => 'demo/general/icon_global.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'icon_global_white', 'file_path' => 'demo/general/icon_global_white.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'icon_price', 'file_path' => 'demo/general/icon_price.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'icon_price_white', 'file_path' => 'demo/general/icon_price_white.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'icon_support', 'file_path' => 'demo/general/icon_support.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'icon_support_white', 'file_path' => 'demo/general/icon_support_white.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],


            ['file_name' => 'banner-new-1', 'file_path' => 'demo/general/banner-new-1.jpg', 'file_type' => 'image/jpg', 'file_extension' => 'jpg'],
            ['file_name' => 'banner-new-2', 'file_path' => 'demo/general/banner-new-2.jpg', 'file_type' => 'image/jpg', 'file_extension' => 'jpg'],

            ['file_name' => 'call-to-action-bg-1', 'file_path' => 'demo/general/call-to-action-bg-1.jpg', 'file_type' => 'image/jpg', 'file_extension' => 'jpg'],
            ['file_name' => 'call-to-action-bg-2', 'file_path' => 'demo/general/call-to-action-bg-2.png', 'file_type' => 'image/png', 'file_extension' => 'png'],
            ['file_name' => 'call-to-action-bg-3', 'file_path' => 'demo/general/call-to-action-bg-3.png', 'file_type' => 'image/png', 'file_extension' => 'png'],

            ['file_name' => 'customer-feedback', 'file_path' => 'demo/general/customer-feedback.jpg', 'file_type' => 'image/jpg', 'file_extension' => 'jpg'],
            ['file_name' => 'customer-feedback-2', 'file_path' => 'demo/general/customer-feedback-2.jpg', 'file_type' => 'image/jpg', 'file_extension' => 'jpg'],

            ['file_name' => 'logo-white', 'file_path' => 'demo/general/logo_white.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
            ['file_name' => 'footer-bg', 'file_path' => 'demo/background/footer-bg.svg', 'file_type' => 'image/svg', 'file_extension' => 'svg'],
        ]);
    }
}
