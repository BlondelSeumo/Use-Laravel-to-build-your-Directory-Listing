<?php

    use App\User;
    use Faker\Factory;
    use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;

use Modules\Review\Models\Review;
use Modules\Property\Models\PropertyCategory;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     */
    public function run()
    {
        $faker = Factory::create('en_US');
        $list_gallery = [];
        for($i=1 ; $i <=5 ; $i++){
            $list_gallery[] = MediaFile::findMediaByName("property-gallery-".$i)->id;
        }

        $banner_images = [];
        for($i=1 ; $i <=4 ; $i++){
            $banner_images[] = MediaFile::findMediaByName("property-banner-".$i)->id;
        }

        $IDs_vendor= User::where('status','publish')->whereHas('roles',function($q){
            $q->whereIn("name", ["administrator",'vendor']);
        })->pluck('id')->toArray();
        $IDs[] = DB::table('bc_properties')->insertGetId(
            [
                'title' => 'Adventure High Ropes',
                'slug' => Str::slug('Adventure High Ropes', '-'),
                'content' => "<p>Dishes are loosely based on Jewish cooking from the Middle East and Europe. Loosely, as a ‘Russian salad’ wouldn’t be recognised by its creator, Belgian chef Lucien Olivier, or many of his antecedents. Instead, whole green beans, large chunks of carrot, peas and potatoes were very lightly dressed with mayonnaise, and all the better for it.</p><p>Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("property-1")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-video-cover-'.rand(1,3))->id,
                'banner_images' => implode(',', $banner_images),
                'location_id' => 1,
                'address' => "329 Queensberry Street, North Melbourne VIC 3051, Australia.",
                'phone' => $faker->tollFreePhoneNumber,
                'email' => 'contact@guido.com',
                'website' => 'www.guido.com',
                'is_featured' => rand(0,1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price_from' => rand(40, 150),
                'price' => rand(150, 200),
                'price_range' => rand(2, 5),
                'map_lat' => $faker->latitude(-30,30),
                'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $faker->randomElement($IDs_vendor),
                'created_at' =>  date("Y-m-d H:i:s"),
                'socials' => '[{"icon_class":"fa fa-facebook","url":"#"},{"icon_class":"fa fa-twitter","url":"#"},{"icon_class":"fa fa-instagram","url":"#"},{"icon_class":"fa fa-linkedin","url":"#"}]',
                'enable_open_hours' => '1',
                'open_hours' => '{"1":{"enable":"1","from":"06:30","to":"16:00"},"2":{"enable":"1","from":"06:30","to":"16:00"},"3":{"enable":"1","from":"06:30","to":"16:00"},"4":{"enable":"1","from":"06:30","to":"16:00"},"5":{"enable":"1","from":"06:30","to":"16:00"},"6":{"enable":"1","from":"06:30","to":"16:00"},"7":{"enable":"1","from":"06:30","to":"16:00"}}'
            ]);
        $IDs[] = DB::table('bc_properties')->insertGetId(
            [
                'title' => 'Museum of New York',
                'slug' => Str::slug('Museum of New York', '-'),
                'content' => "<p>Dishes are loosely based on Jewish cooking from the Middle East and Europe. Loosely, as a ‘Russian salad’ wouldn’t be recognised by its creator, Belgian chef Lucien Olivier, or many of his antecedents. Instead, whole green beans, large chunks of carrot, peas and potatoes were very lightly dressed with mayonnaise, and all the better for it.</p><p>Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("property-2")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-video-cover-'.rand(1,3))->id,
                'banner_images' => implode(',', $banner_images),
                'location_id' => 2,
                'address' => "329 Queensberry Street, North Melbourne VIC 3051, Australia.",
                'phone' => $faker->tollFreePhoneNumber,
                'email' => 'contact@guido.com',
                'website' => 'www.guido.com',
                'is_featured' => rand(0,1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price_from' => rand(40, 150),
                'price' => rand(150, 200),
                'price_range' => rand(2, 5),
                'map_lat' => $faker->latitude(-30,30),
'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $faker->randomElement($IDs_vendor),
                'created_at' =>  date("Y-m-d H:i:s"),
                'socials' => '[{"icon_class":"fa fa-facebook","url":"#"},{"icon_class":"fa fa-twitter","url":"#"},{"icon_class":"fa fa-instagram","url":"#"},{"icon_class":"fa fa-linkedin","url":"#"}]',
                'enable_open_hours' => '1',
                'open_hours' => '{"1":{"enable":"1","from":"06:30","to":"16:00"},"2":{"enable":"1","from":"06:30","to":"16:00"},"3":{"enable":"1","from":"06:30","to":"16:00"},"4":{"enable":"1","from":"06:30","to":"16:00"},"5":{"enable":"1","from":"06:30","to":"16:00"},"6":{"enable":"1","from":"06:30","to":"16:00"},"7":{"enable":"1","from":"06:30","to":"16:00"}}'
            ]);

        $IDs[] = DB::table('bc_properties')->insertGetId(
            [
                'title' => 'The Palmas Hotel',
                'slug' => Str::slug('The Palmas Hotel', '-'),
                'content' => "<p>Dishes are loosely based on Jewish cooking from the Middle East and Europe. Loosely, as a ‘Russian salad’ wouldn’t be recognised by its creator, Belgian chef Lucien Olivier, or many of his antecedents. Instead, whole green beans, large chunks of carrot, peas and potatoes were very lightly dressed with mayonnaise, and all the better for it.</p><p>Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("property-3")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-video-cover-'.rand(1,3))->id,
                'banner_images' => implode(',', $banner_images),
                'location_id' => 3,
                'address' => "329 Queensberry Street, North Melbourne VIC 3051, Australia.",
                'phone' => $faker->tollFreePhoneNumber,
                'email' => 'contact@guido.com',
                'website' => 'www.guido.com',
                'is_featured' => rand(0,1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price_from' => rand(40, 150),
                'price' => rand(150, 200),
                'price_range' => rand(2, 5),
                'map_lat' => $faker->latitude(-30,30),
'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $faker->randomElement($IDs_vendor),
                'created_at' =>  date("Y-m-d H:i:s"),
                'socials' => '[{"icon_class":"fa fa-facebook","url":"#"},{"icon_class":"fa fa-twitter","url":"#"},{"icon_class":"fa fa-instagram","url":"#"},{"icon_class":"fa fa-linkedin","url":"#"}]',
                'enable_open_hours' => '1',
                'open_hours' => '{"1":{"enable":"1","from":"06:30","to":"16:00"},"2":{"enable":"1","from":"06:30","to":"16:00"},"3":{"enable":"1","from":"06:30","to":"16:00"},"4":{"enable":"1","from":"06:30","to":"16:00"},"5":{"enable":"1","from":"06:30","to":"16:00"},"6":{"enable":"1","from":"06:30","to":"16:00"},"7":{"enable":"1","from":"06:30","to":"16:00"}}'
            ]);

        $IDs[] = DB::table('bc_properties')->insertGetId(
            [
                'title' => 'Wellness Fitness Club',
                'slug' => Str::slug('Wellness Fitness Club', '-'),
                'content' => "<p>Dishes are loosely based on Jewish cooking from the Middle East and Europe. Loosely, as a ‘Russian salad’ wouldn’t be recognised by its creator, Belgian chef Lucien Olivier, or many of his antecedents. Instead, whole green beans, large chunks of carrot, peas and potatoes were very lightly dressed with mayonnaise, and all the better for it.</p><p>Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("property-4")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-video-cover-'.rand(1,3))->id,
                'banner_images' => implode(',', $banner_images),
                'location_id' => 4,
                'address' => "329 Queensberry Street, North Melbourne VIC 3051, Australia.",
                'phone' => $faker->tollFreePhoneNumber,
                'email' => 'contact@guido.com',
                'website' => 'www.guido.com',
                'is_featured' => rand(0,1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price_from' => rand(40, 150),
                'price' => rand(150, 200),
                'price_range' => rand(2, 5),
                'map_lat' => $faker->latitude(-30,30),
'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $faker->randomElement($IDs_vendor),
                'created_at' =>  date("Y-m-d H:i:s"),
                'socials' => '[{"icon_class":"fa fa-facebook","url":"#"},{"icon_class":"fa fa-twitter","url":"#"},{"icon_class":"fa fa-instagram","url":"#"},{"icon_class":"fa fa-linkedin","url":"#"}]',
                'enable_open_hours' => '1',
                'open_hours' => '{"1":{"enable":"1","from":"06:30","to":"16:00"},"2":{"enable":"1","from":"06:30","to":"16:00"},"3":{"enable":"1","from":"06:30","to":"16:00"},"4":{"enable":"1","from":"06:30","to":"16:00"},"5":{"enable":"1","from":"06:30","to":"16:00"},"6":{"enable":"1","from":"06:30","to":"16:00"},"7":{"enable":"1","from":"06:30","to":"16:00"}}'
            ]);

        $IDs[] = DB::table('bc_properties')->insertGetId(
            [
                'title' => 'Core by Clare Smyth',
                'slug' => Str::slug('Core by Clare Smyth', '-'),
                'content' => "<p>Dishes are loosely based on Jewish cooking from the Middle East and Europe. Loosely, as a ‘Russian salad’ wouldn’t be recognised by its creator, Belgian chef Lucien Olivier, or many of his antecedents. Instead, whole green beans, large chunks of carrot, peas and potatoes were very lightly dressed with mayonnaise, and all the better for it.</p><p>Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("property-5")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-video-cover-'.rand(1,3))->id,
                'banner_images' => implode(',', $banner_images),
                'location_id' => 1,
                'address' => "329 Queensberry Street, North Melbourne VIC 3051, Australia.",
                'phone' => $faker->tollFreePhoneNumber,
                'email' => 'contact@guido.com',
                'website' => 'www.guido.com',
                'is_featured' => rand(0,1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price_from' => rand(40, 150),
                'price' => rand(150, 200),
                'price_range' => rand(2, 5),
                'map_lat' => $faker->latitude(-30,30),
'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $faker->randomElement($IDs_vendor),
                'created_at' =>  date("Y-m-d H:i:s"),
                'socials' => '[{"icon_class":"fa fa-facebook","url":"#"},{"icon_class":"fa fa-twitter","url":"#"},{"icon_class":"fa fa-instagram","url":"#"},{"icon_class":"fa fa-linkedin","url":"#"}]',
                'enable_open_hours' => '1',
                'open_hours' => '{"1":{"enable":"1","from":"06:30","to":"16:00"},"2":{"enable":"1","from":"06:30","to":"16:00"},"3":{"enable":"1","from":"06:30","to":"16:00"},"4":{"enable":"1","from":"06:30","to":"16:00"},"5":{"enable":"1","from":"06:30","to":"16:00"},"6":{"enable":"1","from":"06:30","to":"16:00"},"7":{"enable":"1","from":"06:30","to":"16:00"}}'
            ]);

        $IDs[] = DB::table('bc_properties')->insertGetId(
            [
                'title' => 'Luxary Hotel-Spa',
                'slug' => Str::slug('Luxary Hotel-Spa', '-'),
                'content' => "<p>Dishes are loosely based on Jewish cooking from the Middle East and Europe. Loosely, as a ‘Russian salad’ wouldn’t be recognised by its creator, Belgian chef Lucien Olivier, or many of his antecedents. Instead, whole green beans, large chunks of carrot, peas and potatoes were very lightly dressed with mayonnaise, and all the better for it.</p><p>Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>",
                'image_id' => MediaFile::findMediaByName("property-6")->id,
                'banner_image_id' => MediaFile::findMediaByName('property-video-cover-'.rand(1,3))->id,
                'banner_images' => implode(',', $banner_images),
                'location_id' => 1,
                'address' => "329 Queensberry Street, North Melbourne VIC 3051, Australia.",
                'phone' => $faker->tollFreePhoneNumber,
                'email' => 'contact@guido.com',
                'website' => 'www.guido.com',
                'is_featured' => rand(0,1),
                'gallery' => implode(",", $list_gallery),
                'video' => "https://www.youtube.com/watch?v=UfEiKK-iX70",
                'price_from' => rand(40, 150),
                'price' => rand(150, 200),
                'price_range' => rand(2, 5),
                'map_lat' => $faker->latitude(-30,30),
'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => "12",
                'faqs' => '[{"title":"Check-in time?","content":"As a rough guide, the check-in time is after 12 a.m. Let us know your arrival time in case you schedule and early check in we\u2018ll do our best to have your room available."},{"title":"Check-out time?","content":"As a rough guide, the check-out time is before 12pm. If you plan a late check out kindly let us know your departure time, we\u2019ll our best to satisfy your needs."},{"title":"Is Reception open 24 hours?","content":"Yes, Reception service is available 24 hours."},{"title":"Which languages are spoken at Reception?","content":"Italian, English, French, German and Spanish."},{"title":"Can I leave my luggage?","content":"Yes, we can look after your luggage. If at check in your room is not ready yet or in case of early check out after .We will store your luggage free of charge on your check-in and check-out days."},{"title":"Internet connection?","content":"A wireless internet connection is available throughout the hotel.\r\n\r\nThe guest rooms feature hi-speed web connectivity (both wireless and cabled)."}]',
                'status' => "publish",
                'create_user' => $faker->randomElement($IDs_vendor),
                'created_at' =>  date("Y-m-d H:i:s"),
                'socials' => '[{"icon_class":"fa fa-facebook","url":"#"},{"icon_class":"fa fa-twitter","url":"#"},{"icon_class":"fa fa-instagram","url":"#"},{"icon_class":"fa fa-linkedin","url":"#"}]',
                'enable_open_hours' => '1',
                'open_hours' => '{"1":{"enable":"1","from":"06:30","to":"16:00"},"2":{"enable":"1","from":"06:30","to":"16:00"},"3":{"enable":"1","from":"06:30","to":"16:00"},"4":{"enable":"1","from":"06:30","to":"16:00"},"5":{"enable":"1","from":"06:30","to":"16:00"},"6":{"enable":"1","from":"06:30","to":"16:00"},"7":{"enable":"1","from":"06:30","to":"16:00"}}'
            ]);

        // Add meta
        foreach ($IDs as $numer_key => $property){
            $titles = ["Great Trip","Good Trip","Trip was great","Easy way to discover the city"];
            $review = new Review([
                "object_id"    => $property,
                "object_model" => "property",
                "title"        => $titles[rand(0, 3)],
                "content"      => "Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te",
                "rate_number"  => rand(1, 5),
                "author_ip"    => "127.0.0.1",
                "status"       => "approved",
                "publish_date" => date("Y-m-d H:i:s"),
                'create_user' => rand(7,16),
                'vendor_id' => $faker->randomElement($IDs_vendor),
            ]);
            $review->save();
        }

        // Settings
        DB::table('bc_settings')->insert(
            [
                [
                    'name' => 'property_page_search_title',
                    'val' => 'Search for property',
                    'group' => "property",
                ],
                [
                    'name' => 'property_page_search_layout',
                    'val' => 'v1',
                    'group' => "property",
                ],
                [
                    'name' => 'property_page_single_layout',
                    'val' => '1',
                    'group' => "property",
                ],
                [
                    'name' => 'property_enable_review',
                    'val' => '1',
                    'group' => "property",
                ],
                [
                    'name' => 'property_review_approved',
                    'val' => '0',
                    'group' => "property",
                ],
                [
                    'name' => 'property_review_stats',
                    'val' => '[{"title":"Overall Rating"},{"title":"Services"},{"title":"Hospitality"},{"title":"Pricing"}]',
                    'group' => "property",
                ],
                [
                    'name' => 'property_booking_buyer_fees',
                    'val' => '[{"name":"Cleaning fee","desc":"One-time fee charged by host to cover the cost of cleaning their property.","name_ja":"\u30af\u30ea\u30fc\u30cb\u30f3\u30b0\u4ee3","desc_ja":"\u30b9\u30da\u30fc\u30b9\u3092\u6383\u9664\u3059\u308b\u8cbb\u7528\u3092\u30db\u30b9\u30c8\u304c\u8acb\u6c42\u3059\u308b1\u56de\u9650\u308a\u306e\u6599\u91d1\u3002","price":"100","type":"one_time"},{"name":"Service fee","desc":"This helps us run our platform and offer services like 24\/7 support on your trip.","name_ja":"\u30b5\u30fc\u30d3\u30b9\u6599","desc_ja":"\u3053\u308c\u306b\u3088\u308a\u3001\u5f53\u793e\u306e\u30d7\u30e9\u30c3\u30c8\u30d5\u30a9\u30fc\u30e0\u3092\u5b9f\u884c\u3057\u3001\u65c5\u884c\u4e2d\u306b","price":"200","type":"one_time"}]',
                    'group' => "property",
                ],
                [
                    'name'=>'property_map_search_fields',
                    'val'=>'[{"field":"service_name","attr":null,"position":"1"},{"field":"location","attr":null,"position":"2"},{"field":"category","attr":null,"position":"3"}]',
                    'group'=>'property'
                ],
                [
                    'name'=>'property_search_fields',
                    'val'=>'{"0":{"title":"What","field":"category","position":"1"},"3":{"title":"Where","field":"location","position":"2"}}',
                    'group'=>'property'
                ],
                [
                    'name'=>'property_sidebar_search_fields',
                    'val'=>'[{"title":"Location","field":"location","position":"3"},{"title":"What are you looking for","field":"service_name","position":"1"},{"title":"All Categories","field":"category","position":"2"},{"title":"Price","field":"price","position":"5"},{"title":"Amenities","field":"amenities|1","position":"6"}]',
                    'group'=>'property'
                ]
            ]
        );

        $a = new \Modules\Core\Models\Attributes([
            'name'=>'Amenities',
            'service'=>'property'
        ]);

        $a->save();

        $term_ids = [];
        $term_icons = ['flaticon-credit-card', 'flaticon-bike', 'flaticon-car', 'flaticon-wifi', 'flaticon-disabled', 'flaticon-pawprint'];

        foreach (['Accepts Credit Cards','Bike Parking','Parking Street','Wireless Internet','Wheelchair Accessible','Pets Friendly'] as $k=>$term){
            $t = new \Modules\Core\Models\Terms([
                'name'=>$term,
                'attr_id'=>$a->id,
                'icon' => $term_icons[$k]
            ]);
            $t->save();
            $term_ids[] = $t->id;
        }

        foreach ($IDs as $property_id){
            foreach ($term_ids as $k=>$term_id) {

                if( rand(0 , count($term_ids) ) == $k) continue;
                if( rand(0 , count($term_ids) ) == $k) continue;
                if( rand(0 , count($term_ids) ) == $k) continue;

                \Modules\Property\Models\PropertyTerm::firstOrCreate([
                    'term_id' => $term_id,
                    'target_id' => $property_id
                ]);
            }
        }
        $categories =  [
            ['name' => 'Outdoor Activity','icon' => 'flaticon-tent', 'image_id' => MediaFile::findMediaByName("icon-property-category-1")->id,'content' => '', 'status' => 'publish',],
            ['name' => 'Restaurant','icon' => 'flaticon-cutlery', 'image_id' => MediaFile::findMediaByName("icon-property-category-2")->id,'content' => '', 'status' => 'publish',],
            ['name' => 'Hotels','icon' => 'flaticon-desk-bell', 'image_id' => MediaFile::findMediaByName("icon-property-category-3")->id,'content' => '', 'status' => 'publish',],
            ['name' => 'Beauty & Spa', 'icon' => 'flaticon-mirror','image_id' => MediaFile::findMediaByName("icon-property-category-4")->id,'content' => '', 'status' => 'publish',],
            ['name' => 'Shopping', 'icon' => 'flaticon-shopping-bag','image_id' => MediaFile::findMediaByName("icon-property-category-5")->id,'content' => '', 'status' => 'publish',],
            ['name' => 'Automotive',  'icon' => 'flaticon-brake','image_id' => MediaFile::findMediaByName("icon-property-category-6")->id,'content' => '', 'status' => 'publish',]
        ];

        $cat_ids = [];
        foreach ($categories as $category){
            $row = new PropertyCategory( $category );
            $row->save();
            $cat_ids[] = $row->id;
        }

        foreach ($IDs as $property_id){
            foreach ($cat_ids as $k=>$cat_id) {

                if( rand(0 , count($cat_ids) ) == $k) continue;
                if( rand(0 , count($cat_ids) ) == $k) continue;

                DB::table('bc_property_category_relationships')->insert([
                    'property_id' => $property_id,
                    'category_id' => $cat_id
                ]);
            }
        }

        //Update Review Score
        foreach ($IDs as $service_id){
            \Modules\Property\Models\Property::find($service_id)->update_service_rate();
        }
    }
}
