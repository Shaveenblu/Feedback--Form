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
        Schema::table('guide_tour', function (Blueprint $table) {
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
        Schema::table('guide_tour', function (Blueprint $table) {
            $table->dropForeign(['guide_id']);
            $table->dropForeign(['tour_id']);
        });
    }
};
