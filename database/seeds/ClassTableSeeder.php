<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('class_schedules')->insert([
            ['day' => 'Monday', 'timeframe_id' => 1, 'subject_id' => 1, 'instructor_id' => 1, 'status' => 'Active'],
            ['day' => 'Monday', 'timeframe_id' => 2, 'subject_id' => 2, 'instructor_id' => 2, 'status' => 'Active'],
        ]);
    }
}
