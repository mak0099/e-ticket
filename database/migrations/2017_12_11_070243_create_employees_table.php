<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nid');
            $table->string('phone');
            $table->text('address')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('image_directory')->nullable();
            $table->string('image_name')->nullable();
            $table->string('type')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('reference_name')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
