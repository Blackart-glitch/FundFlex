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

        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->date('due_date');
            $table->string('status')->default('active');
            $table->string('payment_method')->nullable();
            $table->string('reference')->nullable();
            $table->string('attachment')->nullable();
            $table->decimal('late_fee', 10, 2)->default(0);
            $table->decimal('discounts', 10, 2)->default(0); //discounts are applied to bills
            $table->decimal('tax', 10, 2)->default(0); //taxes are applied to bills
            $table->bigInteger('category_id')->unsigned();
            $table->string('type'); //categorize bills, such as "Tuition," "Extracurricular," "Books," etc.
            $table->string('billing_period')->nullable(); // school bills on a periodic basis (e.g., monthly, quarterly, annually),
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('bill_categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
