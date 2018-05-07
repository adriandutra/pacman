<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $table = 'Products';
    protected $primaryKey = 'ID_Product';
    
    public $timestamps = false;
    
    protected $fillable = [
        'Description',
        'Active'
    ];
    
    protected $guarded = [
        
    ];
    
    public static function getServerActiveId()
    {
        $query = self::select('ID_Product')->get();
        
        return $query;
    }
    
    public static function getServerActiveDescId()
    {
        $query = self::select(DB::raw('ID_Product as id, Description as description'))->get();
        
        return $query;
    }
}
