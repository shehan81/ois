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
        Instructor::create(array(
            'first_name' => 'John',
            'last_name' => 'Smith',
            'email' => 'john.smith@gmail.com',
            'status' => 'Active'
        ));
    }
}
