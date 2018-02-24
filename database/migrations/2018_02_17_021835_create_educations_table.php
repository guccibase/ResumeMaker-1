<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('education_school', 255)->nullable();
            $table->string('education_degree', 255)->nullable();
            $table->string('education_field_of_study', 255)->nullable();
            $table->string('education_grade', 255)->nullable();
            $table->longText('education_activities_and_societies')->nullable();
            $table->string('education_from_year')->nullable();
            $table->string('education_to_year')->nullable();
            $table->longText('education_description')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->integer('resume_id')->unsigned()->nullable();
            $table->foreign('resume_id')->references('id')->on('resumes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educations');
    }
}
