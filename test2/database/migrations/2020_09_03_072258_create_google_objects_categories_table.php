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
            $table->float('lat')->default(null);
            $table->float('lng')->default(null);
            $table->string('icon')->default(null);
            $table->string('name')->default(null);
            $table->string('compound_code')->default(null);
            $table->string('global_code')->default(null);
            $table->float('rating')->default(null);
            $table->text('types')->default(null);
            $table->float('user_ratings_total')->default(null);
            $table->string('vicinity')->default(null);
            $table->string('place_id')->default(null);
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
