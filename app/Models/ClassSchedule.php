<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day', 'timeframe_id', 'subject_id', 'instructor_id', 'status'
    ];
    
    
    protected $primaryKey = 'class_id';
    
    /**
     * Timeframes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timeframe() {
        return $this->belongsTo(Timeframe::class, 'timeframe_id');
    }
    
    /**
     * Subjects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    
    /**
     * Instructors 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor() {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}
