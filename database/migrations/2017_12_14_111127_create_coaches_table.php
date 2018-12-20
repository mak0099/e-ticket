<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coach_number');
            $table->string('route_id');
            $table->string('car_id');
            $table->string('driver_id')->nullable();
            $table->string('supervisor_id')->nullable();
            $table->string('boarding_point_ids')->nullable();
            $table->string('destination_point_ids')->nullable();
            $table->double('fare');
            $table->datetime('date_time');
            $table->boolean('active')->default(true);
            $table->integer('created_by');
            $table->softDeletes();
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
        Schema::dropIfExists('coaches');
    }
}
