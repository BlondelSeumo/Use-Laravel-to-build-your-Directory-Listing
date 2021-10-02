<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BcPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bc_payouts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('vendor_id')->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->string('status',50)->nullable();
            $table->string("payout_method",50)->nullable();
            $table->text("account_info")->nullable();

            $table->text("note_to_admin")->nullable();
            $table->text("note_to_vendor")->nullable();
            $table->integer('last_process_by')->nullable();
            $table->timestamp("pay_date")->nullable();// admin pay date

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->timestamps();
        });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('bc_payouts');

        //
    }
}
