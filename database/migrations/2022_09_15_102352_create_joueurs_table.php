<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joueurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_joueur');
            $table->string('prenom_joueur');
            $table->string('age');
            $table->string('telephone');
            $table->string('mail');
            $table->string('genre');
            $table->string('pays_origine');
            $table->foreignId('role_id')
                ->constrained();
            $table->foreignId('equipe_id')
                ->constrained();
            $table->foreignId('photo_id')
                ->constrained();
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
        Schema::dropIfExists('joueurs');
    }
};
