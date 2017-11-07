<?php

namespace App\Http\Controllers;

use \App\Helpers\Helper as Helper;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $timeframes = Helper::getTimeRange();
        $schedule = Helper::getScheduleTable();

        return view('home', [
            'timeframes' => $timeframes,
            'schedules' => json_decode($schedule)
        ]);
    }

}
