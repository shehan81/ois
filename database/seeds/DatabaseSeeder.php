<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(InstructorTableSeeder::class);
         $this->call(SubjectTableSeeder::class);
         $this->call(StudentTableSeeder::class);
         $this->call(TimeframeTableSeeder::class);
         $this->call(ClassTableSeeder::class);
         $this->call(ClassStudentsSeeder::class);
    }
}
