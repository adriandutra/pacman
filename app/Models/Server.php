<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Server extends Model
{
    protected $table = 'CRM_Servers';
    protected $primaryKey = 'ID_CRM_Server';
    
    public $timestamps = false;
    
    protected $fillable = [
        'Name',
        'Island_Number',
        'URI',
        'DB_connection',
        'Active'
    ];
    
    protected $guarded = [
        
    ];
    
    public static function getServerActiveId()
    {
        $query = self::select('ID_CRM_Server')->Where('Active', 1)->get();
        
        return $query;
    }
    
    public static function getServerActiveNameId()
    {
        $query = self::select(DB::raw('ID_CRM_Server as id, Name as name'))->Where('Active', 1)->get();
        
        return $query;
    }
}