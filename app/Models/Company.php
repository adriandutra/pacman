<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'PacmanContable.dbo.Company';
    protected $primaryKey = 'ID_Company';
    
    public $timestamps = false;
    
    protected $fillable = [
        'Descripcion', 'Database', 'active'
    ];
    
    public function node()
    {
        return $this->hasMany(Node::class);
    }
    
    public static function getServerActiveId()
    {
        $query = self::select('ID_Company')->Where('Active', 1)->get();
        
        return $query;
    }
}
