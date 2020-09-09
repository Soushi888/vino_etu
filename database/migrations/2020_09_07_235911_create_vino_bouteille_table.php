<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinoBouteilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bouteille', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("image");
            $table->string("code_saq");
            $table->string("pays");
            $table->text("description");
            $table->float("prix_saq");
            $table->string("url_saq");
            $table->string("image_url");
            $table->string("format");
            $table->unsignedBigInteger('type_id');
            $table->foreign("type_id")->references('id')->on('type');
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
        Schema::dropIfExists('bouteille');
    }
}
