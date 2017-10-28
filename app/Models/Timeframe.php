<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeframe extends Model
{
     protected $fillable = [
        'from', 'to'
    ];
    
    protected $primaryKey = 'timeframe_id';
}
