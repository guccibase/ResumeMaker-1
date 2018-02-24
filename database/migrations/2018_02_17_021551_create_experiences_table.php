<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');

            $table->string('experience_title', 255)->nullable();
            $table->string('experience_company', 255)->nullable();
            $table->string('experience_location', 255)->nullable();
            $table->string('experience_from_year')->nullable();
            $table->string('experience_from_month')->nullable();
            $table->string('experience_to_year')->nullable();
            $table->string('experience_to_month')->nullable();
            $table->string('experience_to_present')->nullable();
            $table->longText('experience_description')->nullable();

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
        Schema::dropIfExists('experiences');
    }
}
