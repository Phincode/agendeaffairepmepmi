<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FichierDossierGeneral extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idDossier',
        'pathFichier',
        'nomFichier'
    ];

    public function idDossier(){
        return $this->belongsTo(DossierGeneral::class);
    }
}
