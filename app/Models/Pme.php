<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pme extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'nomProprietaire',
        'emailProprietaire',
        'numeroProprietaire',
        'nomGerant',
        'emailGerant',
        'numeroGerant',
        'activite',
        'dateCreation',
        'localisation',
        'besoinenfinancement',
        'codePme',
        'typePme',
        'filledUserId'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'dateCreation' => 'datetime',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function TypePme()
    {
        return $this->belongsTo(TypePme::class);
    }


}
