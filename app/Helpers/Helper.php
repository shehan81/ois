<?php

/**
 * Author : Shehan Fernando
 * Module : Helper class for controlelrs
 * Date   : 2017-10-22
 */

namespace App\Helpers;

use \App\Models\Timeframe;
use \App\Models\Subject;
use \App\Models\Instructor;

class Helper {

    const ACTIONS_VIEW = 'view';
    const ACTIONS_EDIT = 'edit';
    const ACTIONS_DELETE = 'delete';
    const DEFAULT_TIME_ZONE = 'UTC';
    const TIME_FORMAT_DEFAULT = 'H:i:s';
    const TIME_FORMAT_MERIDIAN = 'g:i A';
    
    /**
     * Get data table actions
     * @param type $id
     * @param array $routes
     * @return type
     */
    public static function getDatatableActions($id = null, Array $routes = []) {
        $html = [];
        if (!empty($routes)) {
            foreach ($routes as $action => $route) {
                switch ($action) {
                    case self::ACTIONS_VIEW:
                        $html[self::ACTIONS_VIEW] = '<a href="' . route($route, $id) . '" class="btn btn-xs btn-primary"><i class="fa fa-sticky-note-o"></i> View</a>';
                        break;

                    case self::ACTIONS_EDIT:
                        $html[self::ACTIONS_EDIT] = '<a href="' . route($route, $id) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>';
                        break;

                    case self::ACTIONS_DELETE:
                        $html[self::ACTIONS_DELETE] = self::getDeleteForm($route, $id);
                        break;
                }
            }
            return '<span class="datatable-action-btns">' . implode("</span><span class='datatable-action-btns'>", $html) . '</span>';
        }
    }

    /**
     * Get delete form
     * @param type $route
     * @param type $id
     * @return type
     */
    public static function getDeleteForm($route, $id) {
        return ('<form action="' . route($route, $id) . '" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn-xs  btn btn-xs btn-danger confirmation-callback" data-placement="left">
                    <span class="fa fa-remove" aria-hidden="true"> Delete</span></button>' .
                csrf_field()
                . '</form>');
    }
    
    /**
     * Convert time
     * @param type $time
     * @param type $format
     * @return type
     */
    public static function convertFromTime($time, $format = self::TIME_FORMAT_DEFAULT) {
        date_default_timezone_set(self::DEFAULT_TIME_ZONE);
        return date($format, strtotime($time));
    }

    /**
     * Get days of the week
     * @return type
     */
    public static function getDaysOfWeek() {
        return [
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
        ];
    }
    
    /**
     * Get available time frames
     * @param type $timeframes
     * @return string
     */
    public static function getTimeFrames($timeframes = []) {
        
        $timeframes = !empty($timeframes) ? $timeframes : Timeframe::all();

        $result = [];
        foreach ($timeframes as $timeframe) {
            $result[$timeframe->timeframe_id] = $timeframe->from . ' - ' . $timeframe->to;
        }
        return $result;
    }
    
    
    /**
     * Get subjects
     * @param type $subjects
     * @return string
     */
    public static function getSubjects($subjects = []) {
        
        $subjects = !empty($subjects) ? $subjects : Subject::all();
        
        $result = [];
        foreach ($subjects as $subject) {
            $result[$subject->subject_id] = $subject->title . ' [' . $subject->code . ']';
        }
        return $result;
    }

    /**
     * Get instructors
     * @param type $instructors
     * @return string
     */
    public static function getInstructors($instructors = []) {
        
        $instructors = !empty($instructors) ? $instructors : Instructor::all();
        
        $result = [];
        foreach ($instructors as $instructor) {
            $result[$instructor->instructor_id] = $instructor->first_name . ' ' . $instructor->last_name;
        }
        return $result;
    }

}
