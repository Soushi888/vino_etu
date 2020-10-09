<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Cellier;

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
        factory(App\Cellier::class, 2)->create();

        $cellier = Cellier::find(1);
        $cellier->user_id = 1;
        $cellier->save();

        $cellier = Cellier::find(2);
        $cellier->user_id = 2;
        $cellier->save();

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
