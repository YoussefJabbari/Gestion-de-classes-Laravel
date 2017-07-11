<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travails', function (Blueprint $table) {
            $table->increments('id_travail');
            $table->integer('devoir_id')->unsigned();
            $table->integer('etudiant_id')->unsigned();
            $table->text('url_travail')->nullable();
            $table->float('note_devoir')->default(0);
            $table->timestamps();

            $table->foreign('devoir_id')->references('id')->on('devoirs');
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('travails');
    }
}
