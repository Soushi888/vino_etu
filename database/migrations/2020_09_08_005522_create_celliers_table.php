<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celliers', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->foreignId("user_id")->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });

        // Génère des données de test
        factory(App\Cellier::class, 5)->create();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cellier');
    }
}
