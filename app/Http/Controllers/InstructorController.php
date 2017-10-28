<?php
/**
 * Author : Shehan Fernando
 * Module : Instructor
 * Date   : 2017-10-20
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Yajra\DataTables\DataTables;
use \App\Helpers\Helper as Helper;

class InstructorController extends Controller {

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
            return (new Datatables)->eloquent(Instructor::query())
                            ->addColumn('action', function ($model) {
                                return Helper::getDataTableActions($model->instructor_id, [Helper::ACTIONS_EDIT => 'instructor.edit', Helper::ACTIONS_DELETE => 'instructor.destroy']);
                            })
                            ->make(true);
        }
        return view('instructors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('instructors.edit', ["method" => 'create']);
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

        Instructor::create($data);
        return redirect()->route('instructor.index')
                        ->with('success', 'Instructor created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor) {

        $instructor = Instructor::find($instructor->instructor_id);
        return view('instructors.edit', compact('instructor'), ["method" => 'store']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor) {

        $this->validateForm($instructor);

        $data = $request->all();

        Instructor::find($instructor->instructor_id)->update($data);
        return redirect()->route('instructor.index')
                        ->with('success', 'Instructor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor) {
        Instructor::find($instructor->instructor_id)->delete();
        return redirect()->route('instructor.index')
                        ->with('success', 'Instructor deleted successfully');
    }

    /**
     * 
     * @param Instructor $instructor
     * @return type
     */
    public function validateForm(Instructor $instructor = null) {

        $email = 'required|email|unique:instructors';
        switch (request()->method()) {
            case "PUT":
            case "PATCH":
                $email .= ',email,' . $instructor->instructor_id . ',instructor_id';
                break;
        }
        return request()->validate([
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => $email
        ]);
    }

}
