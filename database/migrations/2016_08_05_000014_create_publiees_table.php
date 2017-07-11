<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublieesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publiees', function (Blueprint $table) {
            $table->integer('annonce_id')->unsigned();
            $table->integer('classe_id')->unsigned();
            $table->timestamps();


            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('annonce_id')->references('id')->on('annonces');

            $table->primary(['annonce_id','classe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('publiees');
    }
}
