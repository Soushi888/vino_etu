<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bouteille_id')->references("id")->on("bouteilles")->cascadeOnDelete();
            $table->foreignId('cellier_id')->references("id")->on("celliers")->cascadeOnDelete();
            $table->bigInteger("quantite");
            $table->timestamp("date_achat")->nullable();
            $table->timestamp("garde_jusqua")->nullable();
            $table->text("notes")->nullable();
            $table->float("prix");
            $table->bigInteger("millesime");
            $table->timestamps();
        });

        // Génère des données de test
        factory(App\Transaction::class, 50)->create();
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
