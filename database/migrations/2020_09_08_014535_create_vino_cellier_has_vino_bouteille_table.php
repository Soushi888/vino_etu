<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinoCellierHasVinoBouteilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellier_has_bouteille', function (Blueprint $table) {
            $table->foreignId('bouteille_id')->references("id")->on("bouteille");
            $table->foreignId('cellier_id')->references("id")->on("cellier");
            $table->bigInteger("quantité");
            $table->timestamp("date_achat")->nullable();
            $table->timestamp("garde_jusqua")->nullable();
            $table->text("notes")->nullable();
            $table->float("prix");
            $table->year("millesime");
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
        Schema::dropIfExists('cellier_has_bouteille');
    }
}
