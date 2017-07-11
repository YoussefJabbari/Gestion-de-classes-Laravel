<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->integer('etudiant_id')->unsigned();
            $table->integer('classe_id')->unsigned();
            $table->integer('nbr_absence');
            $table->float('note_devoir')->default(0);
            $table->float('note_presence')->default(0);
            $table->float('note_controle')->default(0);
            $table->float('note_rattrapage')->default(0);
            $table->float('note_normale')->default(0);
            $table->float('note_globale')->default(0);
            $table->timestamps();
            

            $table->foreign('etudiant_id')->references('id')->on('etudiants');
            $table->foreign('classe_id')->references('id')->on('classes');

            $table->primary(['etudiant_id','classe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluations');
    }
}
