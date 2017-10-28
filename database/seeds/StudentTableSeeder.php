<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('students')->insert([
            ['first_name' => 'James', 'last_name' => 'Corray', 'email' => 'james@gmail.com', 'phone' => '0745285789', 'status' => 'Active'],
            ['first_name' => 'Magiline', 'last_name' => 'Lato', 'email' => 'mag@gmail.com', 'phone' => '0112895658', 'status' => 'Active'],
            ['first_name' => 'John', 'last_name' => 'Ember', 'email' => 'jo@gmail.com', 'phone' => '0772145875', 'status' => 'Active'],
            ['first_name' => 'Vigneth', 'last_name' => 'Martin', 'email' => 'vig@gmail.com', 'phone' => '0114525878', 'status' => 'Active'],
            ['first_name' => 'Santa', 'last_name' => 'Smith', 'email' => 'san@gmail.com', 'phone' => '0762478587', 'status' => 'Active'],
        ]);
    }

}
