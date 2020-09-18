<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotes', function (Blueprint $table) {

            $table->string('first');
            $table->integer('second');
            $table->float('third');
            $table->boolean('fourth');
            $table->string('fifth');
            $table->integer('sixth');
            $table->float('seventh');
            $table->boolean('eight');
            $table->string('ninth');
            $table->integer('tenth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes', function (Blueprint $table) {
            //
        });
    }
}
