<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningDaysDurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_days_duration', function (Blueprint $table) {
            $table->id();
            $table->string('day_of_week');
            $table->time('start_time');
            $table->time('end_time');
            $table->float('total_mins');
            $table->tinyInteger('status')->default(true);
            $table->foreignId('location_id')->constrained();
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
        Schema::dropIfExists('opening_days_duration');
    }
}
