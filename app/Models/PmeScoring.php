<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmeScoring extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pmeId',
        'analysteId',
        'Observation',
        'score',
    ];

   

   

    public function pmeId()
    {
        return $this->belongsTo(Pme::class);
    }
    public function Role()
    {
        return $this->belongsTo(Role::class);
    }

}
