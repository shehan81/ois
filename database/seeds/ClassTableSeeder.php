<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('class_schedules')->insert([
            ['day' => 'Monday', 'timeframe_id' => 1, 'subject_id' => 1, 'instructor_id' => 4, 'status' => 'Active'],
            ['day' => 'Monday', 'timeframe_id' => 3, 'subject_id' => 2, 'instructor_id' => 1, 'status' => 'Active'],
            ['day' => 'Tuesday', 'timeframe_id' => 2, 'subject_id' => 6, 'instructor_id' => 6, 'status' => 'Active'],
            ['day' => 'Tuesday', 'timeframe_id' => 3, 'subject_id' => 4, 'instructor_id' => 9, 'status' => 'Active'],
            ['day' => 'Wednesday', 'timeframe_id' => 1, 'subject_id' => 7, 'instructor_id' => 3, 'status' => 'Active'],
            ['day' => 'Wednesday', 'timeframe_id' => 4, 'subject_id' => 2, 'instructor_id' => 1, 'status' => 'Active'],
            ['day' => 'Thursday', 'timeframe_id' => 3, 'subject_id' => 3, 'instructor_id' => 2, 'status' => 'Active'],
            ['day' => 'Friday', 'timeframe_id' => 1, 'subject_id' => 1, 'instructor_id' => 4, 'status' => 'Active'],
        ]);
    }

}
