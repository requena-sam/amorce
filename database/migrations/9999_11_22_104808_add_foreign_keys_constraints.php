<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('source_id')->references('id')->on('funds');
            $table->foreign('destination_id')->references('id')->on('funds');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('donator_id')->references('id')->on('donators');
            $table->foreign('detente_id')->references('id')->on('detentes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donator_detente');
    }
};
