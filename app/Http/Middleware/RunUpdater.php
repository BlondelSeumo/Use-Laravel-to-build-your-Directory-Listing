<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Artisan;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;
    use Modules\Booking\Models\Service;
    use Modules\Booking\Models\ServiceTranslation;
    use Modules\Core\Models\Settings;
    use Modules\User\Emails\CreditPaymentEmail;
    use Bavix\Wallet\Models\Transaction;
    use Bavix\Wallet\Models\Transfer;
    use Bavix\Wallet\Models\Wallet;

    class RunUpdater
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            if (strpos($request->path(), 'install') === false && file_exists(storage_path().'/installed') and !app()->runningInConsole()) {
                $this->updateTo100();

            }
            return $next($request);
        }

        public function checkDbEngine()
        {
            if (!setting_item('check_db_engine')) {
                $tables = [
                    (new Transaction())->getTable().'_1',
                    (new Transfer())->getTable().'_1',
                    (new Wallet())->getTable().'_1',
                ];
                foreach ($tables as $table) {
                    $engine = DB::select(DB::raw("select ENGINE,TABLE_NAME from information_schema.TABLES where TABLE_SCHEMA	= '".env('DB_DATABASE')."' and TABLE_NAME = '".$table."'"));
                    if (!empty($engine)) {
                        foreach ($engine as $value) {
                            if (!empty($value->ENGINE) and $value->ENGINE != 'InnoDB') {
                                DB::statement('ALTER TABLE '.$value->TABLE_NAME.' ENGINE = InnoDB');
                            }
                        }
                    }
                }
                Settings::store('check_db_engine', true);
            }
        }
        public function updateWalletDB()
        {
            $this->checkDbEngine();
            if (setting_item('update_to_182')) {
                return "Updated Up 1.8.2";
            }

            Artisan::call('migrate', [
                '--force' => true,
            ]);
            setting_update_item('wallet_credit_exchange_rate', 1);
            setting_update_item('wallet_deposit_rate', 1);
            setting_update_item('wallet_deposit_type', 'list');
            setting_update_item('wallet_deposit_lists', [
                ['name' => __("100$"), 'amount' => 100, 'credit' => 100],
                ['name' => __("Bonus 10%"), 'amount' => 500, 'credit' => 550],
                ['name' => __("Bonus 15%"), 'amount' => 1000, 'credit' => 1150],
            ]);

            setting_update_item('wallet_new_deposit_admin_subject', 'New credit purchase');
            setting_update_item('wallet_new_deposit_admin_content', CreditPaymentEmail::defaultNewBody());
            setting_update_item('wallet_new_deposit_customer_subject', 'Thank you for your purchasing');
            setting_update_item('wallet_new_deposit_customer_content', CreditPaymentEmail::defaultNewBody());

            setting_update_item('wallet_update_deposit_admin_subject', 'Credit purchase updated');
            setting_update_item('wallet_update_deposit_admin_content', CreditPaymentEmail::defaultUpdateBody());
            setting_update_item('wallet_update_deposit_customer_subject', 'Your credit purchase updated');
            setting_update_item('wallet_update_deposit_customer_content', CreditPaymentEmail::defaultUpdateBody());

            Schema::table('user_transactions', function (Blueprint $table) {
                if (!Schema::hasColumn('user_transactions', 'payment_id')) {
                    $table->bigInteger('payment_id')->nullable();
                }
                if (!Schema::hasColumn('user_transactions', 'booking_id')) {
                    $table->bigInteger('booking_id')->nullable();
                }
            });
            Schema::table((new Transaction())->getTable(), function (Blueprint $table) {
                $table->engine = 'InnoDB';
                if (!Schema::hasColumn((new Transaction())->getTable(), 'create_user')) {
                    $table->integer('create_user')->nullable();
                }
                if (!Schema::hasColumn((new Transaction())->getTable(), 'update_user')) {
                    $table->integer('update_user')->nullable();
                }
            });

            Schema::table((new Transfer())->getTable(), function (Blueprint $table) {
                $table->engine = 'InnoDB';
                if (!Schema::hasColumn((new Transfer())->getTable(), 'create_user')) {
                    $table->integer('create_user')->nullable();
                }
                if (!Schema::hasColumn((new Transfer())->getTable(), 'update_user')) {
                    $table->integer('update_user')->nullable();
                }
            });

            Schema::table((new Wallet())->getTable(), function (Blueprint $table) {
                $table->engine = 'InnoDB';
                if (!Schema::hasColumn((new Wallet())->getTable(), 'create_user')) {
                    $table->integer('create_user')->nullable();
                }
                if (!Schema::hasColumn((new Wallet())->getTable(), 'update_user')) {
                    $table->integer('update_user')->nullable();
                }
            });

            Settings::store('update_to_182', true);

        }
        public function updateTo100()
        {
            if (setting_item('update_to_100')) {
                return "Updated Up 1.0.0";
            }
            Artisan::call('migrate', [
                '--force' => true,
            ]);
            $this->updateWalletDB();

            if (!Schema::hasTable((new Service())->getTable())) {
                Schema::create((new Service())->getTable(), function (Blueprint $table) {
                    $table->bigIncrements('id');

                    $table->string('title', 255)->nullable();
                    $table->string('slug', 255)->charset('utf8')->index();
                    $table->integer('category_id')->nullable();
                    $table->integer('location_id')->nullable();
                    $table->string('address', 255)->nullable();
                    $table->string('map_lat', 20)->nullable();
                    $table->string('map_lng', 20)->nullable();
                    $table->tinyInteger('is_featured')->nullable();
                    $table->tinyInteger('star_rate')->nullable();
                    //Price
                    $table->decimal('price', 12, 2)->nullable();
                    $table->decimal('sale_price', 12, 2)->nullable();

                    //Tour type
                    $table->integer('min_people')->nullable();
                    $table->integer('max_people')->nullable();
                    $table->integer('max_guests')->nullable();
                    $table->integer('review_score')->nullable();
                    $table->integer('min_day_before_booking')->nullable();
                    $table->integer('min_day_stays')->nullable();
                    $table->integer('object_id')->nullable();
                    $table->string('object_model', 255)->nullable();
                    $table->string('status', 50)->nullable();


                    $table->integer('create_user')->nullable();
                    $table->integer('update_user')->nullable();
                    $table->softDeletes();
                    $table->timestamps();
                });
            }
            if (!Schema::hasTable((new ServiceTranslation())->getTable())) {
                Schema::create((new ServiceTranslation())->getTable(), function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->bigInteger('origin_id')->nullable();
                    $table->string('locale', 10)->nullable();

                    $table->string('title', 255)->nullable();
                    $table->text('address')->nullable();
                    $table->text('content')->nullable();

                    $table->integer('create_user')->nullable();
                    $table->integer('update_user')->nullable();
                    $table->unique(['origin_id', 'locale']);
                    $table->timestamps();
                });
            }
            Settings::store('update_to_100', true);
            Artisan::call('cache:clear');
        }

    }
