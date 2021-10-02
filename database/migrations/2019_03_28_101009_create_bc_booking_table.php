<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBcBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bc_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',64)->nullable();

            $table->integer('vendor_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('gateway',50)->nullable();
            $table->integer('object_id')->nullable();
            $table->string('object_model',255)->nullable();

            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();


            $table->decimal('total',10,2)->nullable();
            $table->integer('total_guests')->nullable();
            $table->string('currency',5)->nullable();
            $table->string('status',30)->nullable();

            $table->decimal('deposit',10,2)->nullable();
            $table->string('deposit_type',30)->nullable();

            $table->decimal('commission',10,2)->nullable();
            $table->string('commission_type',150)->nullable();

            $table->string('email',255)->nullable();
            $table->string('first_name',255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('address2',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('state',255)->nullable();
            $table->string('zip_code',255)->nullable();
            $table->string('country',255)->nullable();
            $table->text('customer_notes')->nullable();


            $table->double('wallet_credit_used')->nullable();// Credit used
            $table->double('wallet_total_used')->nullable();// Credit
            $table->bigInteger('wallet_transaction_id')->nullable();// Credit used
            $table->tinyInteger('is_refund_wallet')->nullable();// Credit used

            $table->decimal('vendor_service_fee_amount')->nullable();
            $table->text('vendor_service_fee')->nullable();
            $table->text('buyer_fees')->nullable();
            $table->decimal('total_before_fees',10,2)->nullable();
            $table->decimal('pay_now',10,2)->nullable();
            $table->decimal('paid',10,2)->nullable();
            $table->tinyInteger('paid_vendor')->nullable();
            $table->bigInteger('object_child_id')->nullable();
            $table->smallInteger('number')->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();

            $table->timestamps();
        });

        Schema::create('bc_booking_payments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('booking_id')->nullable();
            $table->string('payment_gateway',50)->nullable();

            $table->decimal('amount',10,2)->nullable();
            $table->string('currency',10)->nullable();

            $table->decimal('converted_amount',10,2)->nullable();
            $table->string('converted_currency',10)->nullable();
            $table->decimal('exchange_rate',10,2)->nullable();

            $table->string('status',30)->nullable();
            $table->text('logs')->nullable();
            $table->string('code', 64)->nullable();
            $table->bigInteger('object_id')->nullable();
            $table->string('object_model', 40)->nullable();
            $table->text('meta')->nullable();
            $table->bigInteger('wallet_transaction_id')->nullable();

            $table->integer('create_user')->nullable();
            $table->integer('update_user')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('bc_bookings');
        Schema::dropIfExists('bc_booking_payments');
    }
}
