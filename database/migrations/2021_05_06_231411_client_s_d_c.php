<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientSDC extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_s_d_c',function(Blueprint $table){
            $table->id();
           $table->string('nomPrenom');
           $table->string('age');
           $table->string('tel1');
           $table->string('tel2');
           $table->string('niveauDiplome');
           $table->string('nomEcoleDernierDiplome');
           $table->string('localisation');
           $table->string('ancienNouveau');
           $table->string('periode');
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
        Schema::dropIfExists('client_s_d_c');
    }
}
