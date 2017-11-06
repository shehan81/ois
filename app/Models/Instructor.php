<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'subjects', 'status'
    ];
    protected $primaryKey = 'instructor_id';

    /**
     * Get subjects unserialized
     * @param type $value
     * @return type
     */
    public function getSubjectsAttribute($value) {
        return unserialize($value);
    }

    /**
     * instructor relationship
     * @return type
     */
    public function instructor() {
        return $this->hasOne(ClassSchedule::class, 'instructor_id');
    }

    /**
     * Format name
     * @return type
     */
    public function getFullNameAttribute() {
        return $this->first_name . " " . $this->last_name;
    }

}
