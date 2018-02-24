<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name', 255)->nullable();
            $table->string('middle_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('cellphone')->nullable();
            $table->string('phone')->nullable();

            $table->string('image', 255)->nullable();

            $table->string('country', 255)->nullable();
            $table->string('province', 255)->nullable();
            $table->string('city', 255)->nullable();

            $table->mediumText('address')->nullable();
            $table->longText('about')->nullable();

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
        Schema::dropIfExists('informations');
    }
}
