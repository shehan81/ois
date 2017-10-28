<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('subjects')->insert([
            ['code' => 'M001', 'title' => 'Mathematics I', 'status' => 'Active'],
            ['code' => 'M002', 'title' => 'Mathematics II', 'status' => 'Active'],
            ['code' => 'S001', 'title' => 'Sinhala', 'status' => 'Active'],
            ['code' => 'S002', 'title' => 'Sinhala Literature', 'status' => 'Active'],
            ['code' => 'ENG1', 'title' => 'English I', 'status' => 'Active'],
            ['code' => 'ENG2', 'title' => 'English II', 'status' => 'Active'],
            ['code' => 'ENGL', 'title' => 'English Literature', 'status' => 'Active'],
        ]);
    }

}
