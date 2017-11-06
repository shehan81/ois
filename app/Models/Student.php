<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'status'
    ];
    
    protected $primaryKey = 'student_id';
    
    
    /**
     * student relationship
     * @return type
     */
    public function student() {
        return $this->hasOne(ClassStudent::class, 'student_id');
    }
    
   
    /**
     * get student full name
     * @return type
     */
    public function getFullNameAttribute() {
        return $this->first_name . " " . $this->last_name;
    }
}
