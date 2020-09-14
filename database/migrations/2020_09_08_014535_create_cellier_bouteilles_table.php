<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellierBouteillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellier_bouteilles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bouteille_id')->nullable()->references("id")->on("bouteilles");
            $table->foreignId('cellier_id')->references("id")->on("celliers");
            $table->bigInteger("quantite");
            $table->timestamp("date_achat")->nullable();
            $table->timestamp("garde_jusqua")->nullable();
            $table->text("notes")->nullable();
            $table->float("prix");
            $table->year("millesime");
            $table->timestamps();
        });

        // Génère des données de test
        factory(App\CellierBouteille::class, 50)->create();
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
