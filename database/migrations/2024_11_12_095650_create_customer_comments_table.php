<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('customer_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_form_urls_id')->nullable();
            $table->text('comment')->nullable();
            $table->string('unique_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_comments');
    }
};
