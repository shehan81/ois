<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    
    protected $fillable = [
        'class_id', 'student_id'
    ];
    
    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
