<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'PacmanContable.dbo.grupos_auxiliares';
    protected $primaryKey = 'ID_GAux';
    
    public $timestamps = false;
    
    protected $fillable = [
        'Descripcion'
    ];

}
