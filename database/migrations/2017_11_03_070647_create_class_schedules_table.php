<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSchedulesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('class_id');
            $table->char('day', 10); //to store the day of the week ex : Saturday
            $table->integer('timeframe_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->integer('instructor_id')->unsigned()->index();
            $table->enum('status', array('Active', 'Inactive'));
            $table->timestamps();

            // Foreign keys
            $table->foreign('instructor_id')->references('instructor_id')->on('instructors');
            $table->foreign('subject_id')->references('subject_id')->on('subjects');
            $table->foreign('timeframe_id')->references('timeframe_id')->on('timeframes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('class_schedules');
    }

}
