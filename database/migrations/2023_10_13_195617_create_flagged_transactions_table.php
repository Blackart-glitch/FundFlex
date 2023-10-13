<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlaggedTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('flagged_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // Foreign key constraint for user_id
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions'); // Foreign key constraint for transaction_id
            $table->unsignedBigInteger('recipient_id');
            $table->foreign('recipient_id')->references('id')->on('users'); // Foreign key constraint for recipient_id
            $table->text('reason');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flagged_transactions');
    }
}
