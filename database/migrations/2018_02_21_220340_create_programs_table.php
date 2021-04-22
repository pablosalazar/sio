<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('area_id')->nullable();
            $table->string('name');
            
            $table->foreign('area_id')
                ->references('id')->on('areas')
                ->onDelete('set null');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('programs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
