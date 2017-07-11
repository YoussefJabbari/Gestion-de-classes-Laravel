<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevoirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoirs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classe_id')->unsigned();
            $table->string('titre_devoir');
            $table->text('enonce');
            $table->date('deadline');
            $table->date('date_devoir');
            $table->timestamps();

            $table->foreign('classe_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('devoirs');
    }
}
