<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aggrements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id');
            $table->foreignId('receiver_id');
            $table->string('title');
            $table->decimal('price', 12, 2);
            $table->string('file_path');
            $table->boolean('negotiation_position_client');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aggrements');
    }
};
