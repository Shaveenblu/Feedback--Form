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
        Schema::table('customer_hotel', function (Blueprint $table) {
            $table
                ->foreign('hotel_id')
                ->references('id')
                ->on('hotels')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_hotel', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
            $table->dropForeign(['customer_id']);
        });
    }
};
