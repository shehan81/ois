<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeframe;
use App\Models\ClassSchedule;
use App\Models\Student;
use App\Models\ClassStudent;
use App\Models\Subject;
use App\Models\Instructor;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class ScheduleManager extends Controller {

    /**
     * Get days of the week
     * @return type
     */
    public function getDays() {
        return response()->json(Helper::getDaysOfWeek(), 200);
    }

    /**
     * Get avaiable timeframes 
     * @param Request $request
     * @return type
     */
    public function getAvailableTimeframes(Request $request) {
        $day = $request->day;
        $timeframes = Timeframe::whereNotIn('timeframe_id', function($query) use($day) {
                    $query->select('timeframe_id')
                            ->from(with(new ClassSchedule)->getTable()) //subquery
                            ->where('day', $day);
                })->get();

        return response()->json(Helper::getTimeFrames($timeframes), 200);
    }

    /**
     * Get class subjects
     * @param Request $request
     * @return type
     */
    public function getClassSubjects(Request $request) {
        $day = $request->day;
        $exclude = $request->exclude == "true" ? true : false;

        //by setting the parameter to false, query willl take all the subjects
        if (!$exclude) {
            return response()->json(Helper::getSubjects(), 200);
        }

        //excluding the subjects already taken for the selected day
        $subjects = Subject::whereNotIn('subject_id', function($query) use($day) {
                    $query->select('subject_id')
                            ->from(with(new ClassSchedule)->getTable())
                            ->where('day', $day);
                })->get();

        return response()->json(Helper::getSubjects($subjects), 200);
    }

    /**
     * Get instructors for the subject
     * @param Request $request
     * @return type
     */
    public function getAvailableInstructors(Request $request) {

        $subject_id = $request->subject;
        $instructors = Instructor::all();
        $selected_instructors = [];
        if (!empty($instructors)) {
            foreach ($instructors as $instructor) {
                if (in_array($subject_id, $instructor->subjects)) {
                    array_push($selected_instructors, $instructor);
                }
            }
        }

        return response()->json(Helper::getInstructors($selected_instructors), 200);
    }

    /**
     * Get schedule
     * @param Request $request
     * @return type
     */
    public function getSchedule(Request $request) {
        $class_id = $request->class_id;

        $class = ClassSchedule::find($class_id);

        return response()->json($class, 200);
    }

    /**
     * Get time frames for the given day
     * @param Request $request
     * @return type
     */
    public function getScheduleTimeframes(Request $request) {
        $day = $request->day;

        $class_timeframes = ClassSchedule::query()
                ->where("day", $day)
                ->with('timeframe')
                ->get();


        if (!empty($class_timeframes)) {
            $result = [];
            foreach ($class_timeframes as $obj) {
                $result[$obj->timeframe->timeframe_id] = $obj->timeframe->time_frame;
            }
        }

        return response()->json($result, 200);
    }

    /**
     * Get subjects for the given timerames
     * @param Request $request
     * @return type
     */
    public function getClassesForTimeframe(Request $request) {
        $day = $request->day;
        $timeframe_id = $request->timeframe_id;

        $classes = ClassSchedule::query()
                ->where("day", $day)
                ->where("timeframe_id", $timeframe_id)
                ->with('timeframe')
                ->with('subject')
                ->with('instructor')
                ->get();

        return response()->json(Helper::getClassesDropDown($classes), 200);
    }

    /**
     * get available students for the day, time
     * @param Request $request
     * @return type
     */
    public function getStudentsAvailable(Request $request) {
        
        $class_id = $request->class_id;
        
        $students = Student::whereNotIn('student_id', function($query) use($class_id) {
                    $query->select('student_id')
                            ->from(with(new ClassStudent)->getTable())
                            ->where('class_id', $class_id);
                })->get();
                

        return response()->json(Helper::getStudents($students), 200);
    }

}
