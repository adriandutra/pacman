<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{
    protected $table='PacmanContable.dbo.Parity_NodoContable';
    
    public $timestamps = false;
    
    protected $fillable = [
        'ID_CUENTA', 'ID_Company', 'ID_NodosContables'
    ];
}
