<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdvs extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pmeId',
        'horaire',
        'clientSimpleDcId',
        'dateRdv',
        'state'
        
    ];

    public function pmeId(){
      $this->belongsTo(Pme::class);
    }

    public function clientSimpleDcId(){
        $this->belongsTo(ClientSDC::class);

    }

}
