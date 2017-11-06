<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

    protected $fillable = [
        'code', 'title', 'status'
    ];
    
    protected $primaryKey = 'subject_id';

    /**
     * subject relationship
     * @return type
     */
    public function subject() {
        return $this->hasOne(ClassSchedule::class, 'subject_id');
    }
    

}
