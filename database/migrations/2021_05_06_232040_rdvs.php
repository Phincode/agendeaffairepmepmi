<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rdvs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdvs',function(Blueprint $table){
            $table->id();
           $table->integer('pmeId')->constrained('pmes','id')->nullable();
           $table->integer('horaire')->constrained('plage_temps','id');
           $table->string('clientSimpleDcId')->constrained('client_s_d_c','id')->nullable();
           $table->string('state'); // PENDING|PRESENT|ABSENT
           $table->string('dateRdv');
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
        Schema::dropIfExists('rdvs');
    }
}
