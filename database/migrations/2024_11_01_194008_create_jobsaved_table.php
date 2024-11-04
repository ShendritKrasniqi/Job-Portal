<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsavedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobsaved', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing ID field
            $table->unsignedBigInteger('job_id'); // Foreign key for job
            $table->unsignedBigInteger('user_id'); // Foreign key for user
            $table->string('job_image')->nullable(); // Assuming it can be null
            $table->string('job_title')->nullable(); // Assuming it can be null
            $table->string('job_region')->nullable(); // Assuming it can be null
            $table->string('job_type')->nullable(); // Assuming it can be null
            $table->string('company')->nullable(); // Assuming it can be null
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
            
            // Optionally, you can add foreign key constraints
            // $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobsaved');
    }
};