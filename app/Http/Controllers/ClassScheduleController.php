<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use \App\Helpers\Helper as Helper;

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
            return (new Datatables)->eloquent(ClassSchedule::query())
                    ->addColumn('action', function ($model) {
                        return Helper::getDataTableActions($model->class_id, [Helper::ACTIONS_EDIT => 'class.edit', Helper::ACTIONS_DELETE => 'class.destroy']);
                    })->editColumn('phone', function ($model) {
                        //return $model->phone ? : '-';
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
            
        ClassSchedule::create($data);
        return redirect()->route('class.index')
                        ->with('success', 'Class Schedule created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassSchedule  $classSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ClassSchedule $classSchedule) {
        //
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
     * @param  \App\ClassSchedule  $classSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassSchedule $classSchedule) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassSchedule  $classSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassSchedule $classSchedule) {
        //
    }

}

