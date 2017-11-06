<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeframe;
use App\Models\ClassSchedule;
use App\Models\Subject;
use App\Models\Instructor;
use App\Helpers\Helper;
class ScheduleManager extends Controller {
    
    /**
     * Get days of the week
     * @return type
     */
    public function getDays(){
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
        if(!$exclude){
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
        if(!empty($instructors)){
            foreach($instructors as $instructor){
                if(in_array($subject_id, $instructor->subjects)){
                    array_push($selected_instructors, $instructor);
                }
            }
        }

        return response()->json(Helper::getInstructors($selected_instructors), 200);
    }
    

}

