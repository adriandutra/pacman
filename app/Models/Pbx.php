<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pbx extends Model
{
    protected $table = 'PBX';
    protected $primaryKey = 'pbx_id';
    
    public $timestamps = false;
    
    protected $fillable = [
        'Name',
        'URI',
        'Location',
        'Folder',
        'FileName',
        'DB_connection',
        'Type',
        'depend_pbx_id',
        'ID_CRM_Server',
        'Active'
    ];
    
    protected $guarded = [
        
    ];
    
    public static function getPbxId()
    {
        $query = self::select(DB::raw('pbx_id as id'))->where('Active', 1)->get();
        
        return $query;    
    }
    
    public static function getPbxNameId()
    {
        $query = self::select(DB::raw('pbx_id as id, Name as name'))->where('Active', 1)->get();
        
        return $query;
    }
}