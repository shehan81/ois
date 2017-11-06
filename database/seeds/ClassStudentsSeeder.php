<?php

use Illuminate\Database\Seeder;

class ClassStudentsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('class_students')->insert([
            ['class_id' => '1', 'student_id' => 10000000],
            ['class_id' => '1', 'student_id' => 10000001],
            ['class_id' => '1', 'student_id' => 10000003],
            ['class_id' => '1', 'student_id' => 10000004],
            ['class_id' => '2', 'student_id' => 10000001]
        ]);
    }

}
