<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleObjectsCategoriesTable extends Migration
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
            $table->float('lat', 10, 3);
            $table->float('lng', 10, 3);
            $table->string('icon');
            $table->string('name');
            $table->string('compound_code');
            $table->string('global_code');
            $table->float('rating');
            $table->text('types');
            $table->float('user_ratings_total');
            $table->string('vicinity');
            $table->string('place_id');
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
