<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use \App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\DB;

class ClassStudentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request) {

        if ($request->ajax() && $request->wantsJson()) {
            return (new Datatables)->eloquent(ClassStudent::query()->where("class_id", $request->class_id)->with('student'))
                            ->addColumn('action', function ($model) {
                                return Helper::getDataTableActions($model->class_id, [Helper::ACTIONS_DELETE => 'class_destroy']);
                            })->editColumn('student_name', function ($model) {
                        return $model->student->full_name;
                    })->make(true);
        }

        return view('classes.student', ['id' => $id]);
    }

    /**
     * Assign students main page
     * @return type
     */
    public function assign() {

        return view('classes.assign', ["method" => 'create']);
    }

    /**
     * Saving assigned students
     * @param Request $request
     * @return type
     */
    public function assignStore(Request $request) {

        request()->validate([
            'class_id' => 'required',
            'students' => 'required'
        ]);

        $data = $request->all();

        if (!empty($data['students'])) {
            foreach ($data['students'] as $student_id) {
                $data['student_id'] = $student_id;
                ClassStudent::create($data);
            }
        }

        return redirect()->route('assign')
                        ->with('success', 'Selected students assigned successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassStudent $classStudent) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassStudent $classStudent) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassStudent $classStudent) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassStudent $class) {
        try {
            DB::transaction(function () use ($class_student) {

                ClassStudent::find($class_student->class_id)->delete();
                return redirect()->route('class_student')
                                ->with('success', 'Class deleted successfully');
            });
        } catch (\Exception $e) {
            return redirect()->route('class_student')
                            ->with('error', 'aaaaaaaaaaaError occurred! Couldn\'t delete at this moment. May be record already in use!');
        }
    }

}
