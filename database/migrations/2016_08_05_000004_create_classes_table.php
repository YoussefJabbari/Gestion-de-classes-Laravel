<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enseignant_id')->unsigned();
            $table->string('nom_cours');
            $table->integer('semestre');
            $table->string('annee_univ');
            $table->string('nom_formation')->nullable();
            $table->float('pourcent_devoir')->nullable();
            $table->float('pourcent_assiduite')->nullable();
            $table->float('pourcent_controle')->nullable();
            $table->float('pourcent_exam')->nullable();
            $table->float('note_reference')->nullable();
            $table->integer('nbr_seance')->nullable();
            $table->timestamps();

            $table->foreign('enseignant_id')->references('id')->on('enseignants');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classes');
    }
}
