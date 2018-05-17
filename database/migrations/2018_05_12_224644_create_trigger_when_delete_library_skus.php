<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerWhenDeleteLibrarySkus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER when_delete_library_skus
                BEFORE DELETE ON libraryskus
                FOR EACH ROW
                BEGIN
                    DELETE FROM librarystocks WHERE id=OLD.id;
                    DELETE FROM purchaseorderitems WHERE itemId=OLD.id;
                    DELETE FROM saleitems WHERE itemId=OLD.id;
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
        DB::unprepared("DROP TRIGGER when_delete_library_skus");
    }
}
