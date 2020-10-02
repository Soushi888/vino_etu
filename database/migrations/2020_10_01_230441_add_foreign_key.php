<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add foreing key entre transaction et bouteille
        Schema::table('transactions', function (Blueprint $table) {
             $table->foreign('bouteille_id')->references('id')->on('bouteilles');
        });

        Schema::table('bouteilles', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_bouteille_id_foreign');
            
        });

        Schema::table('bouteilles', function (Blueprint $table) {
            $table->dropForeign('bouteilles_type_id_foreign');
        });
        
    }
}
