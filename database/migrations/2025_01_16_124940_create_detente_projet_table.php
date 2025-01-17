<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetenteProjetTable extends Migration
{
    public function up()
    {
        Schema::create('detente_projet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detente_id')->constrained()->onDelete('cascade');
            $table->foreignId('projet_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detente_projet');
    }
}
