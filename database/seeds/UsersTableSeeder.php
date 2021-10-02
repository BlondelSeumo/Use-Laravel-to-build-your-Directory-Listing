<?php

    use Faker\Factory;
    use Illuminate\Database\Seeder;
    use Modules\Media\Models\MediaFile;

    class UsersTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $avatar = MediaFile::findMediaByName("avt-agent")->id;

            $faker = Factory::create('en_US');
            DB::table('users')->insert([
                'first_name'        => 'System',
                'last_name'         => 'Admin',
                'email'             => 'admin@dev.com',
                'password'          => bcrypt('admin123'),
                'phone'             => $faker->tollFreePhoneNumber,
                'status'            => 'publish',
                'job'               => 'Designer at guido',
                'avatar_id'         => $avatar,
                'created_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
                'bio'               => 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
            ]);
            $user = \App\User::where('email', 'admin@dev.com')->first();
            $user->assignRole('administrator');



        }
    }
