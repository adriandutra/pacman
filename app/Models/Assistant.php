<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{
    protected $table='PacmanContable.dbo.Parity_Group_Aux';
    
    public $timestamps = false;
    
    protected $fillable = [
        'ID_Auxiliar', 'ID_Company', 'ID_GAux'
    ];
}
