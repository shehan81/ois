<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\ClassStudent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use \App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\DB;

class ClassScheduleController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax() && $request->wantsJson()) {
            return (new Datatables)->eloquent(ClassSchedule::query()->with('timeframe')->with('subject')->with('instructor'))
                            ->addColumn('action', function ($model) {
                                return Helper::getDataTableActions($model->class_id, [Helper::ACTIONS_LIST => 'class_student', Helper::ACTIONS_EDIT => 'class.edit', Helper::ACTIONS_DELETE => 'class.destroy']);
                            })->editColumn('timeframe', function ($model) {
                                return $model->timeframe->time_frame;
                            })->editColumn('subject', function ($model) {
                                return $model->subject->title . ' [ ' . $model->subject->code . ']';
                            })->editColumn('instructor', function ($model) {
                                return $model->instructor->full_name;
                            })
                            ->make(true);
        }

        return view('classes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('classes.edit', [
            "method" => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        request()->validate([
            'day' => 'required',
            'timeframe_id' => 'required',
            'subject_id' => 'required',
            'instructor_id' => 'required'
        ]);

        $data = $request->all();

        try {

            DB::transaction(function () use ($data) {
                return ClassSchedule::create($data);
            });
        } catch (\Exception $e) {

            return redirect()->route('class.index')
                            ->with('error', 'Error occurred! Couldn\'t store at this moment.');
        }


        return redirect()->route('class.index')
                        ->with('success', 'Class Schedule created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassSchedule  $classSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassSchedule $class) {

        $class = ClassSchedule::find($class->class_id);
        return view('classes.edit', compact('class'), ["method" => 'store']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassSchedule  $class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassSchedule $class) {

        request()->validate([
            'day' => 'required',
            'timeframe_id' => 'required',
            'subject_id' => 'required',
            'instructor_id' => 'required'
        ]);

        $data = $request->all();

        try {

            DB::transaction(function () use ($class, $data) {

                return ClassSchedule::find($class->class_id)->update($data);
            });
        } catch (\Exception $e) {

            return redirect()->route('class.index')
                            ->with('error', 'Error occurred! Couldn\'t store at this moment.');
        }

        return redirect()->route('class.index')
                        ->with('success', 'Class Schedule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassSchedule  $classSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassSchedule $class) {
        try {
            DB::transaction(function () use ($class) {

                ClassSchedule::find($class->class_id)->delete();
            });
        } catch (\Exception $e) {
            return redirect()->route('class.index')
                            ->with('error', 'Error occurred! Couldn\'t delete at this moment. May be record already in use!');
        }

        return redirect()->route('class.index')
                        ->with('success', 'Class deleted successfully');
    }

    /**
     * Assign students to class : main page
     * @return type
     */
    public function assign() {

        return view('classes.assign', ["method" => 'create']);
    }

    /**
     * Storing assigned students
     * @param Request $request
     * @return type
     */
    public function assignStore(Request $request) {

        request()->validate([
            'class_id' => 'required',
            'students' => 'required'
        ]);

        $data = $request->all();

        try {

            DB::transaction(function () use ($data) {

                if (!empty($data['students'])) {
                    foreach ($data['students'] as $student_id) {
                        $data['student_id'] = $student_id;
                        ClassStudent::create($data);
                    }
                }

                return;
            });
        } catch (\Exception $e) {

            return redirect()->route('class.index')
                            ->with('error', 'Error occurred! Couldn\'t store at this moment.');
        }

        return redirect()->route('class.index')
                        ->with('success', 'Selected students assigned successfully. You can see them on "List Students" action.');
    }

    /**
     * Display list of students of a class
     *
     * @return \Illuminate\Http\Response
     */
    public function classStudentList($id, Request $request) {

        if ($request->ajax() && $request->wantsJson()) {
            return (new Datatables)->eloquent(ClassStudent::query()->where("class_id", $request->class_id)->with('student'))
                            ->addColumn('action', function ($model) {
                                return Helper::getDataTableActions($model->id, [Helper::ACTIONS_DELETE => 'remove_student']); // id : primary key of the classStudent model
                            })->editColumn('student_name', function ($model) {
                        return $model->student->full_name;
                    })->make(true);
        }

        return view('classes.student', ['id' => $id]);
    }

    /**
     * Remove the specified student from a class
     *
     * @param  \App\ClassStudent  $class
     * @return \Illuminate\Http\Response
     */
    public function removeStudent(Request $request) {
        try {
            $class_id = DB::transaction(function () use ($request) {

                        $ClassStudent = ClassStudent::find($request->_id);
                        $class_id = $ClassStudent->class_id;
                        $ClassStudent->delete();

                        return $class_id;
                    });
        } catch (\Exception $e) {
            return redirect()->route('class.index')
                            ->with('error', 'Error occurred! Couldn\'t delete at this moment. May be record already in use!');
        }

        return redirect()->route('class_student', $class_id)
                        ->with('success', 'Class deleted successfully');
    }

}
