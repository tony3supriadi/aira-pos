<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerWhenDeleteUnits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER when_delete_units
                BEFORE DELETE ON units
                FOR EACH ROW
                BEGIN
                    UPDATE libraryskus SET unitId='1' WHERE itemId=OLD.id;
                    UPDATE purchaseorderitems SET unitId='1' WHERE itemId=OLD.id;
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
        DB::unprepared("DROP TRIGGER when_delete_units");
    }
}
