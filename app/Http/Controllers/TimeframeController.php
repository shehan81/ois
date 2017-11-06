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
use App\Helpers\Helper as Helper;
use \Illuminate\Database\QueryException;
use \Illuminate\Support\MessageBag;
use App\Exceptions\CustomHandler;
use Illuminate\Support\Facades\DB;

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
        $data = $request->all();

        $this->validateForm(null, $data);

        try {

            Timeframe::create($data);
        } catch (QueryException $e) {
            if ($e->getCode() == CustomHandler::DUPLICATE_ERROR) {

                $errors = (new MessageBag())->add('validation.duplicate_time', 'Duplicate times are given.');

                return view('timeframes.edit', ["method" => 'create'])->withErrors($errors);
            }
        }
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
        $this->validateForm($timeframe);

        $data = $request->all();

        try {
            Timeframe::find($timeframe->timeframe_id)->update($data);
        } catch (QueryException $e) {
            if ($e->getCode() == CustomHandler::DUPLICATE_ERROR) {

                $errors = (new MessageBag())->add('validation.duplicate_time', 'Duplicate times are given.');

                return view('timeframes.edit', compact('timeframe'), ["method" => 'store'])->withErrors($errors);
            }
        }

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

        try {
            DB::transaction(function () use ($timeframe) {

                Timeframe::find($timeframe->timeframe_id)->delete();
                return redirect()->route('timeframe.index')
                                ->with('success', 'Time frame deleted successfully');
            });
        } catch (\Exception $e) {
            return redirect()->route('timeframe.index')
                            ->with('error', 'Error occurred! Couldn\'t delete at this moment. May be record already in use!');
        }
    }

    /**
     * 
     * @param Timeframe $timeframe
     * @return type
     */
    public function validateForm(Timeframe $timeframe = null, $data = []) {

        //custom validators
        $is_conflict = "is_conflicts:h:i A";
        $is_greater = "is_time_greater:h:i A";
        //$is_unique = "is_unique_times:from | unique:timeframes,to";

        switch (request()->method()) {
            case "PUT":
            case "PATCH":
                $is_greater .= ',' . $timeframe->from;
                $is_conflict .= ',' . $timeframe->timeframe_id;
                break;

            case "POST":
                $is_greater .= ',' . $data['from'];
                break;
        }

        return request()->validate([
                    'from' => 'required|' . $is_conflict,
                    'to' => 'required|' . $is_greater . '|' . $is_conflict,
        ]);
    }

}
