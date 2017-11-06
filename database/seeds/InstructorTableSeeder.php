<?php

use Illuminate\Database\Seeder;
use App\Models\Instructor;

class InstructorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('instructors')->insert([
            ['first_name' => 'John', 'last_name' => 'Smith', 'email' => 'john.smith@gmail.com', 'subjects' => 'a:2:{i:0;s:1:"2";i:1;s:1:"5";}', 'status' => 'Active'],
            ['first_name' => 'Peter', 'last_name' => 'Kerrie', 'email' => 'peter@gmail.com', 'subjects' => 'a:1:{i:0;s:1:"3";}', 'status' => 'Active'],
            ['first_name' => 'Andrew', 'last_name' => 'Issa', 'email' => 'andres@gmail.com', 'subjects' => 'a:2:{i:0;s:1:"5";i:1;s:1:"7";}', 'status' => 'Active'],
            ['first_name' => 'Smith', 'last_name' => 'Mariz', 'email' => 'smith@gmail.com', 'subjects' => 'a:4:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"6";}', 'status' => 'Active'],
            ['first_name' => 'Taylor', 'last_name' => 'Omanis', 'email' => 'taylor@gmail.com', 'subjects' => 'a:2:{i:0;s:1:"2";i:1;s:1:"5";}', 'status' => 'Active'],
            ['first_name' => 'Paul', 'last_name' => 'Ferandez', 'email' => 'paul@gmail.com', 'subjects' => 'a:2:{i:0;s:1:"5";i:1;s:1:"6";}', 'status' => 'Inactive'],
            ['first_name' => 'Joseph', 'last_name' => 'Omani', 'email' => 'joseph@gmail.com', 'subjects' => 'a:2:{i:0;s:1:"5";i:1;s:1:"7";}', 'status' => 'Active'],
            ['first_name' => 'Kenedy', 'last_name' => 'Peters', 'email' => 'ken@gmail.com', 'subjects' => 'a:2:{i:0;s:1:"2";i:1;s:1:"5";}', 'status' => 'Active'],
            ['first_name' => 'Jean', 'last_name' => 'Sean', 'email' => 'jean@gmail.com', 'subjects' => 'a:7:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";i:6;s:1:"7";}', 'status' => 'Active'],
            ['first_name' => 'Elizabeth', 'last_name' => 'Anderson', 'email' => 'elizabeth@gmail.com', 'subjects' => 'a:2:{i:0;s:1:"2";i:1;s:1:"5";}', 'status' => 'Inactive'],
            ['first_name' => 'Diana', 'last_name' => 'Lorenzo', 'email' => 'diana@gmail.com', 'subjects' => 'a:4:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"6";}', 'status' => 'Active'],
        ]);
    }
}
