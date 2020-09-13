<?php

use App\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string("type");
        });


        // Insertion des types de vin dans la BDD
        DB::table('types')->insert(
            ['id' => 1, 'type' => "blanc"]
        );
        DB::table('types')->insert(
            ['id' => 2, 'type' => "rouge"]
        );
        DB::table('types')->insert(
            ['id' => 3, 'type' => "rosé"]
        );
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('type');
    }
}
