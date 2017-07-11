<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classe_id')->unsigned();
            $table->integer('categorie_id')->unsigned();
            $table->string('titre_document');
            $table->text('description')->nullable();
            $table->text('url_document');
            $table->date('date_document')->nullable();
            $table->timestamps();

            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('categorie_id')->references('id')->on('categories');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('documents');
    }
}
