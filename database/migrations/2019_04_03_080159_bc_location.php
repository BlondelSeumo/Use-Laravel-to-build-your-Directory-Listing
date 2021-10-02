<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class BcLocation extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('bc_locations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 255)->nullable();
                $table->text('content')->nullable();
                $table->string('slug', 255)->nullable();
                $table->integer('image_id')->nullable();
                $table->string('map_lat', 20)->nullable();
                $table->string('map_lng', 20)->nullable();
                $table->integer('map_zoom')->nullable();
                $table->string('status', 50)->nullable();
                $table->integer('banner_image_id')->nullable();
                $table->text('trip_ideas')->nullable();

                $table->nestedSet();

                $table->integer('create_user')->nullable();
                $table->integer('update_user')->nullable();
                $table->softDeletes();

                //Languages
                $table->bigInteger('origin_id')->nullable();
                $table->string('lang', 10)->nullable();

                $table->timestamps();
            });
            Schema::create('bc_location_translations', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->bigIncrements('id');

                $table->bigInteger('origin_id')->nullable();
                $table->string('locale', 10)->nullable();

                $table->string('name', 255)->nullable();
                $table->text('content')->nullable();
                $table->text('trip_ideas')->nullable();


                $table->integer('create_user')->nullable();
                $table->integer('update_user')->nullable();

                $table->unique(['origin_id', 'locale']);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('bc_locations');
            Schema::dropIfExists('bc_location_translations');
        }
    }
