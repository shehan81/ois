<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('student_id', 8);
            $table->string('first_name', 50);
            $table->string('last_name',50);
            $table->string('email', 100)->unique();
            $table->char('phone', 10)->nullable();
            $table->enum('status', array('Active','Inactive'));
            $table->timestamps();
        });
        //starting the student id from 10000000
        $statement = "ALTER TABLE students AUTO_INCREMENT = 10000000;";
        DB::unprepared($statement);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
