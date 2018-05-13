<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerWhenCreateLibrarySkus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER when_create_library_skus
                AFTER INSERT ON libraryskus 
                FOR EACH ROW
                BEGIN
                    INSERT INTO librarystocks (id, stockLast, stockPurchase, stockSales, inStock) VALUES (NEW.id, 0, 0, 0, 0);
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
        DB::unprepared("DROP TRIGGER when_create_library_skus");
        
    }
}
