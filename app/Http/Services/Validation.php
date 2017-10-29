<?php

namespace App\Http\Services;

use Illuminate\Validation\Validator;

class Validation extends Validator {

    public function validatePhone($attribute, $value, $parameters) {
        return (preg_match('/^[0-9]{10}$/', $value));
    }

    public function validateIsTimeGreater($attribute, $value, $parameters) {
        return \Carbon\Carbon::createFromFormat($parameters[0], $value)->gt(\Carbon\Carbon::createFromFormat($parameters[0], $parameters[1]));
    }

    public function validateIsConflicts($attribute, $value, $parameters) {

        $except = !empty($parameters[1]) ?: null;

        $check_time = \App\Helpers\Helper::convertFromTime($value);
        $elq = \App\Models\Timeframe::where('from', '<', $check_time)
                ->where('to', '>', $check_time);

        if ($except)
            $elq->where('timeframe_id', '!=', $except);

        return $elq->count() == 0;
    }
    
    public function validateIsUniqueTimes($attribute, $value, $parameters) {

        $second_time_field = $parameters[1];

        $check_time = \App\Helpers\Helper::convertFromTime($value);
        $elq = \App\Models\Timeframe::where('from', '<', $check_time)
                ->where('to', '>', $check_time);

        if ($except)
            $elq->where('timeframe_id', '!=', $except);

        return $elq->count() == 0;
    }

}
