<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('nomProprietaire');
            $table->string('emailProprietaire');
            $table->string('numeroProprietaire');
            $table->string('nomGerant');
            $table->string('emailGerant');
            $table->string('numeroGerant');
            $table->string('activite');
            $table->string('dateCreation');
            $table->string('localisation');
            $table->string('besoinenfinancement');
            $table->string('codePme');
            $table->integer('typePme')->constrained('TypePme','id')
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');
            $table->integer('filledUserId')->constrained('users','id')
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');                            
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
        Schema::drop('pmes');
    }
}
