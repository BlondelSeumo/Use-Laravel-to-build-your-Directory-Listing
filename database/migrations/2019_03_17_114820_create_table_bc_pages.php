<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateTableBcPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bc_pages', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug',255)->charset('utf8')->index();
            $table->string('title',255)->nullable();
            $table->text('content')->nullable();
            $table->text('short_desc')->nullable();
            $table->string('status',50)->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('template_id')->nullable();

            $table->smallInteger('position')->nullable();
            $table->string('header_style',255)->nullable();
            $table->integer('custom_logo')->nullable();
            $table->integer('banner_image')->nullable();



            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();
            $table->softDeletes();

            //Languages
            $table->bigInteger('origin_id')->nullable();
            $table->string('lang',10)->nullable();

            $table->timestamps();
        });
        Schema::create('bc_page_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('origin_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title',255)->nullable();
            $table->text('content')->nullable();
            $table->text('short_desc')->nullable();

            $table->bigInteger('create_user')->nullable();
            $table->bigInteger('update_user')->nullable();

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
        Schema::dropIfExists('bc_pages');
        Schema::dropIfExists('bc_page_translations');
    }
}
