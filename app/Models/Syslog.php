<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Syslog extends Model
{
    protected $table = 'Syslogs';
    protected $primaryKey = 'Fecha';
    
    public $timestamps = false;
    
    protected $fillable = [
        'ACK'
    ];
    
    protected $guarded = [
        
    ];
}
