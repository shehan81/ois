<?php

/**
 * Author : Shehan Fernando
 * Module : Student
 * Date   : 2017-10-28
 */

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use \App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax() && $request->wantsJson()) {
            return (new Datatables)->eloquent(Student::query())
                            ->addColumn('action', function ($model) {
                                return Helper::getDataTableActions($model->student_id, [Helper::ACTIONS_EDIT => 'student.edit', Helper::ACTIONS_DELETE => 'student.destroy']);
                            })->editColumn('phone', function ($model) {
                                return $model->phone ? : '-';
                            })
                            ->make(true);
        }
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('students.edit', ["method" => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validateForm();

        $data = $request->all();

        try {

            DB::transaction(function () use ($data) {
                return Student::create($data);
            });
        } catch (\Exception $e) {

            return redirect()->route('student.index')
                            ->with('error', 'Error occurred! Couldn\'t store at this moment.');
        }

        return redirect()->route('student.index')
                        ->with('success', 'Student created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student) {
        $student = Student::find($student->student_id);
        return view('students.edit', compact('student'), ["method" => 'store']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student) {
        $this->validateForm($student);

        $data = $request->all();

        try {

            DB::transaction(function () use ($student, $data) {
                return Student::find($student->student_id)->update($data);
            });
        } catch (\Exception $e) {

            return redirect()->route('student.index')
                            ->with('error', 'Error occurred! Couldn\'t store at this moment.');
        }

        return redirect()->route('student.index')
                        ->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student) {

        try {

            DB::transaction(function () use ($student) {

                return Student::find($student->student_id)->delete();
            });
        } catch (\Exception $e) {

            return redirect()->route('student.index')
                            ->with('error', 'Error occurred! Couldn\'t delete at this moment. May be record already in use!');
        }

        return redirect()->route('student.index')
                        ->with('success', 'Student deleted successfully');
    }

    /**
     * 
     * @param Student $student
     * @return type
     */
    public function validateForm(Student $student = null) {

        $email = 'required|email|unique:students';
        switch (request()->method()) {
            case "PUT":
            case "PATCH":
                $email .= ',email,' . $student->student_id . ',student_id';
                break;
        }
        return request()->validate([
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => $email,
                    'phone' => 'nullable|phone'
        ]);
    }

}
