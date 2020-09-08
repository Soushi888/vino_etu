<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinoCellierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vino_cellier', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->foreignId("vino_utilisateur_id")->references('id')->on('vino_utilisateur');
            $table->foreignId("vino_adresse_id")->references('id')->on('vino_adresse');
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
        Schema::dropIfExists('vino_cellier');
    }
}
