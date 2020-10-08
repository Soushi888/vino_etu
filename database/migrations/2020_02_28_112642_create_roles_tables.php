<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::create('abilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::create('ability_role', function (Blueprint $table) {
            $table->primary(['role_id', 'ability_id']);

            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('ability_id');
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('ability_id')
                ->references('id')
                ->on('abilities')
                ->onDelete('cascade');
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->primary(['user_id', 'role_id']);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        // Génération des rôles administrateurs et utilisateurs
        $role = \App\Role::create([
            'name' => 'administrateur',
            'label' => 'admin'
        ]);
        $role->save();

        $role = \App\Role::create([
            'name' => 'utilisateur',
            'label' => 'user'
        ]);
        $role->save();

        // Génération de la capacité d'accès au backoffice
        $ability = \App\Ability::create([
            'name' => 'backoffice_access',
            'label' => 'backoffice'
        ]);
        $ability->save();

        // Association de la capacité au rôle
        \App\Role::find(1)->allowTo("backoffice_access");

        // Association des rôles aux utilisateurs
        \App\User::find(1)->assignRole("utilisateur");
        \App\User::find(2)->assignRole("administrateur");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
