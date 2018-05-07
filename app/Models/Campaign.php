<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{

    protected $table = 'Campaign';
    protected $primaryKey = 'ID_Campaign';
    
    public $timestamps = false;
    
    protected $fillable = [
        'Name',
        'NameFact',
        'IDCampaing_Neotel',
        'pbx_id',
        'Prepend',
        'acc_id',
        'ID_CRM',
        'Active',
        'Group_Fact',
        'Date',
        'Action'
    ];
    
    protected $guarded = [
        
    ];
    
    public static function getServerActiveId()
    {
        $query = self::select('ID_Campaign')->Where('Active', 1)->get();
        
        return $query;
    }
    
    public static function getServerActiveNameId()
    {
        $query = self::select(DB::raw('ID_Campaign as id, Name as name'))->Where('Active', 1)->get();
        
        return $query;
    }
}
