<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_form_urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url_link');
            $table->string('unique_id')->unique();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('tour_id');
            $table->enum('status', ['Completed', 'In Progress']);
            $table->date('date');
            $table->string('other_details');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_form_urls');
    }
};
