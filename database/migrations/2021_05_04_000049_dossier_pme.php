<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DossierPme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossier_pmes', function (Blueprint $table) {
            $table->id();
            $table->integer('pmeId')->constrained('pmes','id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('docPath');
            $table->string('nomFichier');
            $table->integer('validation')->constrained('roles','id')
            ->onUpdate('cascade')
            ->onDelete('cascade'); 
            $table->string('etat');//|PENDING,ANALYSE1,ANALYSE2,ANALYSE3,ACCORD_FINANCEMENT,REJETE
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
        Schema::drop('dossier_pmes');
    }
}
