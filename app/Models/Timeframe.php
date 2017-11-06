<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper as Helper;

class Timeframe extends Model {

    protected $fillable = [
        'from', 'to'
    ];
    protected $primaryKey = 'timeframe_id';

    /**
     * format from time to g:i A
     * @param type $value
     * @return type
     */
    public function getFromAttribute($value) {
        return Helper::convertFromTime($value, Helper::TIME_FORMAT_MERIDIAN);
    }

    /**
     * format to time to g:i A
     * @param type $value
     * @return type
     */
    public function getToAttribute($value) {
        return Helper::convertFromTime($value, Helper::TIME_FORMAT_MERIDIAN);
    }

    public function getTimeFrameAttribute() {
        return $this->from . ' - ' . $this->to;
    }

    /**
     * format from time to HH:MM:SS
     * @param type $value
     * @return type
     */
    public function setFromAttribute($value) {
        $this->attributes['from'] = Helper::convertFromTime($value);
    }

    /**
     * format to time to HH:MM:SS
     * @param type $value
     * @return type
     */
    public function setToAttribute($value) {
        $this->attributes['to'] = Helper::convertFromTime($value);
    }

    /**
     * classes relationship
     * @return type
     */
    public function classes() {
        return $this->hasMany(ClassSchedule::class, 'timeframe_id');
    }

    /**
     * timeframe relationship
     * @return type
     */
    public function timeframe() {
        return $this->hasOne(ClassSchedule::class, 'timeframe_id');
    }

}
