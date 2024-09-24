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
        Schema::table('feed_back_forms', function (Blueprint $table) {
            $table
                ->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('response_type_id')
                ->references('id')
                ->on('response_types')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('hotel_id')
                ->references('id')
                ->on('hotels')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('guide_id')
                ->references('id')
                ->on('guides')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('tour_id')
                ->references('id')
                ->on('tours')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feed_back_forms', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['response_type_id']);
            $table->dropForeign(['hotel_id']);
            $table->dropForeign(['guide_id']);
            $table->dropForeign(['tour_id']);
        });
    }
};
