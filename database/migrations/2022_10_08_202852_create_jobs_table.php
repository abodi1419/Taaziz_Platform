<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

//            COMPANY DETAILS
            $table->string('company_name');
            $table->string('company_phone');
            $table->string('company_website');
            $table->text('company_speciality');

//            JOB DETAILS
            $table->string('title');
            $table->enum('type',['Full time','Part time','Internship']);
            $table->string('location');
            $table->text('description');

//            HOW TO APPLY

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
        Schema::dropIfExists('jobs');
    }
}
