<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichierDossierGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichier_dossier_generals', function (Blueprint $table) {
            $table->id();
            $table->integer('idDossier')->constrained('dossier_generals','id');
            $table->string('pathFichier');
            $table->string('nomFichier');
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
        Schema::dropIfExists('fichier_dossier_generals');
    }
}
