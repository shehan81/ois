<?php

/**
 * Author : Shehan Fernando
 * Module : Timeframe
 * Date   : 2017-10-27
 */

namespace App\Http\Controllers;

use App\Models\Timeframe;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use \App\Helpers\Helper as Helper;

class TimeframeController extends Controller {

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
            return (new Datatables)->eloquent(Timeframe::query())
                            ->addColumn('action', function ($model) {
                                return Helper::getDataTableActions($model->timeframe_id, [Helper::ACTIONS_EDIT => 'timeframe.edit', Helper::ACTIONS_DELETE => 'timeframe.destroy']);
                            })->editColumn('from', function ($model) {
                                return Helper::convertFromTime($model->from, Helper::TIME_FORMAT_MERIDIAN);
                            })->editColumn('to', function ($model) {
                                return Helper::convertFromTime($model->to, Helper::TIME_FORMAT_MERIDIAN);
                            })
                            ->make(true);
        }
        return view('timeframes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('timeframes.edit', ["method" => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //$this->validateForm();

        $data = $request->all();
        
        //converting meridian to hh:mm:ss
        $data['from'] = Helper::convertFromTime($data['from']);
        $data['to'] = Helper::convertFromTime($data['to']);

        Timeframe::create($data);
        return redirect()->route('timeframe.index')
                        ->with('success', 'Time frame created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timeframe  $timeframe
     * @return \Illuminate\Http\Response
     */
    public function show(Timeframe $timeframe) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timeframe  $timeframe
     * @return \Illuminate\Http\Response
     */
    public function edit(Timeframe $timeframe) {
        $timeframe = Timeframe::find($timeframe->timeframe_id);
        return view('timeframes.edit', compact('timeframe'), ["method" => 'store']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timeframe  $timeframe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timeframe $timeframe) {
        //$this->validateForm($timeframe);

        $data = $request->all();

        //converting meridian to hh:mm:ss
        $data['from'] = Helper::convertFromTime($data['from']);
        $data['to'] = Helper::convertFromTime($data['to']);

        Timeframe::find($timeframe->timeframe_id)->update($data);
        return redirect()->route('timeframe.index')
                        ->with('success', 'Time frame updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timeframe  $timeframe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timeframe $timeframe) {
        Timeframe::find($timeframe->timeframe_id)->delete();
        return redirect()->route('timeframe.index')
                        ->with('success', 'Time frame deleted successfully');
    }

    /**
     * 
     * @param Timeframe $timeframe
     * @return type
     */
    public function validateForm(Timeframe $timeframe = null) {

        $code = 'required|min:4|max:4|regex:/(^[A-Za-z0-9^\S]+$)+/|unique:timeframes';
        switch (request()->method()) {
            case "PUT":
            case "PATCH":
                $code .= ',code,' . $timeframe->timeframe_id . ',timeframe_id';
                break;
        }
        return request()->validate([
                    'code' => $code,
                    'title' => 'required',
        ]);
    }

}
