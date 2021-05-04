<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierPmeTransfert extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'to',
        'pmeId',
        'from',
        'etape',
        'Observation',
    ];

    public function pmeId()
    {
        return $this->belongsTo(Pme::class);
    }

    public function etape(){
        return $this->belongsTo(Role::class);
    }

    public function to()
    {
        return $this->belongsTo(User::class);
    }

    public function from()
    {
        return $this->belongsTo(User::class);
    }

}
