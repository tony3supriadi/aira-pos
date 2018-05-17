<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerWhenCreateSaleItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER when_create_sale_items
                AFTER INSERT ON saleItems
                FOR EACH ROW
                BEGIN
                    UPDATE libraryStocks SET 
                        stockSales=stockSales+NEW.count,
                        inStock=inStock-NEW.count,
                        updated_at=NOW()
                        WHERE id=NEW.itemId;
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
        DB::unprepared("DROP TRIGGER when_create_sale_items");        
    }
}
