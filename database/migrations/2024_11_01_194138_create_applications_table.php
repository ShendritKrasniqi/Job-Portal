<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing ID field
            $table->string('cv')->nullable(); // Assuming 'cv' stores a file path or URL, nullable if not required
            $table->unsignedBigInteger('job_id'); // Foreign key for job
            $table->string('email');
            $table->unsignedBigInteger('user_id'); // Foreign key for user
            $table->string('job_image')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_region')->nullable();
            $table->string('job_type')->nullable();
            $table->string('company')->nullable();
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
        Schema::dropIfExists('applications');
    }
};