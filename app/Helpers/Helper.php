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
use App\Models\ClassSchedule;

class Helper {

    const ACTIONS_VIEW = 'view';
    const ACTIONS_EDIT = 'edit';
    const ACTIONS_DELETE = 'delete';
    const ACTIONS_LIST = 'list';
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

                    case self::ACTIONS_LIST:
                        $html[self::ACTIONS_LIST] = '<a href="' . route($route, $id) . '" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> List Students</a>';
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
    public static function getDeleteForm($route, $id = null) {
        return ('<form action="' . route($route, $id) . '" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn-xs  btn btn-xs btn-danger confirmation-callback" data-placement="left">
                    <input type="hidden" name="_id" value="' . $id . '">
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
            $result[$timeframe->timeframe_id] = $timeframe->time_frame;
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

    /**
     * Classes dropdown
     * @param type $classes
     * @return string
     */
    public static function getClassesDropDown($classes = []) {

        $result = [];
        if (!empty($classes)) {
            $result = [];
            foreach ($classes as $obj) {
                $result[$obj->class_id] = $obj->subject->title . ' By : ' . $obj->instructor->full_name;
            }
        }

        return $result;
    }

    /**
     * get available students
     * @param type $timeframes
     * @return type
     */
    public static function getAvailableStudents($timeframes = []) {

        $timeframes = !empty($timeframes) ? $timeframes : Timeframe::all();

        $result = [];
        foreach ($timeframes as $timeframe) {
            $result[$timeframe->timeframe_id] = $timeframe->time_frame;
        }
        return $result;
    }

    /**
     * get students
     * @param type $students
     * @return type
     */
    public static function getStudents($students = []) {
        $result = [];

        if (!empty($students)) {
            foreach ($students as $obj) {
                $result[$obj->student_id] = $obj->full_name;
            }
        }
        return $result;
    }
    
    /**
     * get schedule
     * @return type
     */

    public static function getScheduleTable() {
        
        $days = self::getDaysOfWeek();
        $c = self::getCSSClasses(); //colors
        
        $schedule = [];
        
        foreach ($days as $day) {
            $classes = ClassSchedule::query()
                    ->where("day", $day)
                    ->where("status", 'Active')
                    ->with('timeframe')
                    ->with('subject')
                    ->with('instructor')
                    ->get();

            $schedule[$day] = [];

            if (!empty($classes)) {
                foreach ($classes as $class) {

                    array_push($schedule[$day], ['classes' => [
                            'title' => $class->subject->title,
                            'start' => $class->timeframe->getOriginal('from'),
                            'to' => $class->timeframe->getOriginal('to'),
                            'color' => $c[rand(0, 4)]
                        ]
                    ]);
                }
            }
        }

        return json_encode($schedule);
    }

    /**
     * Get time range for the timeline
     * @param type $timeframes
     * @return string
     */
    public static function getTimeRange($timeframes = []) {
        
        $start = '10:00';
        $t = [$start];
        for ($i = 1; $i < 12; $i++) {
            array_push($t, date('H:i', strtotime($start . ' +' . $i . ' hour')));
        }
        return $t;
    }

    /**
     * define css colors array
     * @return type
     */
    public static function getCSSClasses() {

        return [
            'bg-light-blue', 'bg-green', 'bg-purple', 'bg-teal', 'bg-yellow'
        ];
    }

}
