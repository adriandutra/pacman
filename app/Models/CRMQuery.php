<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class CRMQuery extends Model
{
    protected $table = 'CRM';
    protected $primaryKey = 'ID_CRM';
    
    public $timestamps = false;
    
    protected $fillable = [
        'Name',
        'IDCRM_Neotel',
        'Active',
        'Date',
        'Action',
        'ID_CRM_Server',
        'Field_Document',
        'SQL_Contact',
        'SQL_Contact_Sales',
        'SQL_Contact_History',
        'SQL_External_Contact',
        'SQL_Contact_Phone',
        'SQL_Contact_MailAddress',
        'SQL_Contact_Address'
    ];
    
    
    
    protected $guarded = [
        
    ];
    
    public static function getServerActiveId()
    {
        $query = self::select('ID_CRM')->where('Active', 1)->get();
        
        return $query;
    }
    
    public static function getServerActiveNameId()
    {
        $query = self::select(DB::raw('ID_CRM as id, Name as name'))->where('Active', 1)->get();
        
        return $query;
    }
}
