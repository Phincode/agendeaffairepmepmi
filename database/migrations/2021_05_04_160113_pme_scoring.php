<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PmeScoring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pme_scorings',function(Blueprint $table){
            $table->id();
            $table->integer('pmeId')->constrained('pmes','id');
            $table->integer('analysteId')->constrained('users','id');
            $table->string('Observation');
            $table->string('score');
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
        Schema::drop('pme_scoring');
    }
}
