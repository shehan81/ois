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
            ['first_name' => 'John', 'last_name' => 'Smith', 'email' => 'john.smith@gmail.com', 'status' => 'Active'],
            ['first_name' => 'Peter', 'last_name' => 'Kerrie', 'email' => 'peter@gmail.com', 'status' => 'Active'],
            ['first_name' => 'Andrew', 'last_name' => 'Issa', 'email' => 'andres@gmail.com', 'status' => 'Active'],
            ['first_name' => 'Smith', 'last_name' => 'Mariz', 'email' => 'smith@gmail.com', 'status' => 'Active'],
            ['first_name' => 'Taylor', 'last_name' => 'Omanis', 'email' => 'taylor@gmail.com', 'status' => 'Active'],
            ['first_name' => 'Paul', 'last_name' => 'Ferandez', 'email' => 'paul@gmail.com', 'status' => 'Inactive'],
            ['first_name' => 'Joseph', 'last_name' => 'Omani', 'email' => 'joseph@gmail.com', 'status' => 'Active'],
            ['first_name' => 'Kenedy', 'last_name' => 'Peters', 'email' => 'ken@gmail.com', 'status' => 'Active'],
            ['first_name' => 'Jean', 'last_name' => 'Sean', 'email' => 'jean@gmail.com', 'status' => 'Active'],
            ['first_name' => 'Elizabeth', 'last_name' => 'Anderson', 'email' => 'elizabeth@gmail.com', 'status' => 'Inactive'],
            ['first_name' => 'Diana', 'last_name' => 'Lorenzo', 'email' => 'diana@gmail.com', 'status' => 'Active'],
        ]);
    }
}
