<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionCategoryStagesTable extends Migration
{
    public function up()
    {
        Schema::create('transaction_category_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->references('id')->on('transaction_categories');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('transaction_categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_stages');
    }
}
