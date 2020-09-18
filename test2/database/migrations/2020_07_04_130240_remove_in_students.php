<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveInStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
                $table->integer('grade');
            });
        Schema::table('grades', function (Blueprint $table) {
            $table->integer('grade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->removeColumn('gradebook`s number');
        });
        Schema::table('grades', function (Blueprint $table) {
            $table->removeColumn('gradebook`s number');
        });

    }
}
