<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerWhenDeleteCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER when_delete_purchase_customers
                BEFORE DELETE ON customers
                FOR EACH ROW
                BEGIN
                    UPDATE sales SET customerId='1' WHERE customerId=OLD.id;
                END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER when_delete_purchase_customers");
    }
}
