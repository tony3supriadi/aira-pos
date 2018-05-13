<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerWhenDeleteSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER when_delete_suppliers
                BEFORE DELETE ON suppliers
                FOR EACH ROW
                BEGIN
                    DELETE FROM purchaseorders WHERE supplierId=OLD.id;
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
        DB::unprepared("DROP TRIGGER when_delete_suppliers");
    }
}
