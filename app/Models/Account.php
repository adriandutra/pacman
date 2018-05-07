<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Account extends Model
{
    protected $table = 'Account';
    protected $primaryKey = 'acc_id';
    
    public $timestamps = false;
    
    protected $fillable = [
        'Name',
        'Start_Cycle',
        'End_Cycle',
        'Cycle',
        'CDR',
        'CPP',
        'ID_Sales_Rates',
        'Active'
    ];
    
    protected $guarded = [
        
    ];
    
    public static function getServerActiveId()
    {
        $query = self::select('acc_id as id')->get();
        
        return $query;
    }
    
    public static function getServerActiveNameId()
    {
        $query = self::select(DB::raw('acc_id as id, Name as name'))->get();
        
        return $query;
    }
}
