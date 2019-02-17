<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $table = 'PacManContable.dbo.NodosContables';
    protected $primaryKey = 'ID_NodosContables';
    
    public $timestamps = false;
    
    protected $fillable = [
        'Descripcion', 'ID_Company'
    ];
    
    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
