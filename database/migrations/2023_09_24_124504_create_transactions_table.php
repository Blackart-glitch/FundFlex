<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reference_id')->nullable();
            $table->unsignedBigInteger('sender_id'); // Add sender_id
            $table->unsignedBigInteger('receiver_id'); // Add receiver_id
            $table->string('transaction_type');
            $table->string('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->unsignedBigInteger('currency_id')->nullable(); // You can make currency_id nullable
            $table->string('status');
            $table->text('attachments')->nullable();
            $table->string('payment_gateway')->default('fundflex_secure');
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
