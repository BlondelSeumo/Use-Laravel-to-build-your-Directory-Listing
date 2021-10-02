<?php

    use Faker\Factory;
    use Illuminate\Database\Seeder;
use Modules\Location\Models\Location;
use Modules\Media\Models\MediaFile;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $locations = [
            [
                'name' => 'Miami',
                'content'=>'Find great places to stay, eat, shop, or visit from local experts.',
                'banner_image_id' => MediaFile::findMediaByName("banner-location-1")->id,
                'map_lat' => $faker->latitude(-30,30),
                'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-1")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Los Angeles',
                'content'=>'Find great places to stay, eat, shop, or visit from local experts.',
                'map_lat' => $faker->latitude(-30,30),
                'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-2")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Florida',
                'content'=>'Find great places to stay, eat, shop, or visit from local experts.',
                'map_lat' => $faker->latitude(-30,30),
                'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-3")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'New York',
                'content'=>'Find great places to stay, eat, shop, or visit from local experts.',
                'map_lat' => $faker->latitude(-30,30),
                'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-4")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Los Angeles',
                'content'=>'Find great places to stay, eat, shop, or visit from local experts.',
                'map_lat' => $faker->latitude(-30,30),
                'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-1")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'New Jersey',
                'content'=>'Find great places to stay, eat, shop, or visit from local experts.',
                'map_lat' => $faker->latitude(-30,30),
                'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-2")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'San Francisco',
                'content'=>'Find great places to stay, eat, shop, or visit from local experts.',
                'map_lat' => $faker->latitude(-30,30),
                'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-3")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ],
            [
                'name' => 'Virginia',
                'content'=>'Find great places to stay, eat, shop, or visit from local experts.',
                'map_lat' => $faker->latitude(-30,30),
                'map_lng' => $faker->longitude(-60,60),
                'map_zoom' => '12',
                'image_id' => MediaFile::findMediaByName("location-4")->id,
                'status' => 'publish',
                'create_user' => '1',
                'created_at' =>  date("Y-m-d H:i:s")
            ]
        ];

        foreach ($locations as $location){
            $row = new Location( $location );
            $row->save();
        }
    }
}
