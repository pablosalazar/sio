<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('program_id')->nullable();
            $table->string('code');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('journey')->nullable(); 
            
            $table->timestamps();

            $table->foreign('program_id')
                  ->references('id')->on('programs')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('courses');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
