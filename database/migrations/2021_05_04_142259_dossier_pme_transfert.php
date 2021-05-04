<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DossierPmeTransfert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_pme_transferts',function(Blueprint $table){
            $table->id();
            $table->integer('to')->constrained('users','id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('pmeId')->constrained('pmes','id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('from')->constrained('users','id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('etape')->constrained('roles','id')
                ->onUpdate('cascade')
                ->onDelete('cascade');    
            $table->string('Observation');
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
        Schema::drop('dossier_pme_analyste_simples');
    }
}

