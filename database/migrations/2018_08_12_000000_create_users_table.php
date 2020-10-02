<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('type')->default("user")->nullable();;
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Génère des données de test
        factory(App\User::class, 15)->create();

        // Génère des comptes utilisateurs et administrateur avec lesquels se connecter
        $user = User::find(1);
        $user->email = "user@test.com";
        $user->password = Hash::make("12345678");
        $user->save();

        $user = User::find(2);
        $user->email = "admin@test.com";
        $user->password = Hash::make("12345678");
        $user->type = "admin";
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
