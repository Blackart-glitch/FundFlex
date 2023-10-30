<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * The function creates a table called 'currencies' with columns for currency code, currency name,
     * and timestamps.
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * The above function is used to delete the "currencies" table from the database.
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
