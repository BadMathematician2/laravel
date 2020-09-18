<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTabled515 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_objects_categories', function (Blueprint $table) {
            $table->id();
            $table->float('lat')->nullable()->default(null);
            $table->float('lng')->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('compound_code')->nullable()->default(null);
            $table->string('global_code')->nullable()->default(null);
            $table->float('rating')->nullable()->default(null);
            $table->text('types')->nullable()->default(null);
            $table->float('user_ratings_total')->nullable()->default(null);
            $table->string('vicinity')->nullable()->default(null);
            $table->string('place_id')->nullable()->default(null);
            $table->unique('place_id');
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
        Schema::dropIfExists('google_objects_categories');
    }
}
