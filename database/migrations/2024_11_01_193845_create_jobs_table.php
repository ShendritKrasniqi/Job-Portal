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
            $table->string('job_title');
            $table->string('job_region');
            $table->string('company');
            $table->string('job_type');
            $table->integer('vacancy')->nullable(); // Assuming it can be null
            $table->string('experience')->nullable();
            $table->decimal('salary', 10, 2)->nullable(); // Assuming salary can be decimal
            $table->string('gender')->nullable();
            $table->date('application_deadline')->nullable();
            $table->text('jobdescription')->nullable();
            $table->text('responsibilities')->nullable();
            $table->string('education_experience')->nullable();
            $table->text('otherbenifits')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->timestamps(); // Adds 'created_at' and 'updated_at'
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