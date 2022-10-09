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
            $table->increments('id');
            $table->unsignedInteger('user_id');

//            COMPANY DETAILS
            $table->string('company_name');
            $table->string('company_phone');
            $table->string('company_website');
            $table->text('company_info');

//            JOB DETAILS
            $table->string('job_title');
            $table->string('job_types');
            $table->string('job_location');
            $table->text('job_description');

//            HOW TO APPLY
            $table->string('apply_by');
            $table->string('apply_by_link_Email');


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
