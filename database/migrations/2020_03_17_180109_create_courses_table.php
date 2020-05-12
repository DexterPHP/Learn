<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('title_en');
            $table->string('auther');
            $table->text('desc');
            $table->text('playlist_link');
            $table->text('logo');
            $table->text('fulldata')->nullable();
            $table->text('tags')->nullable();
            $table->string('publish_at')->nullable();
            $table->string('all_length')->nullable();
            $table->integer('count_of_videos');
            $table->string('language')->default('عربي');
            $table->bigInteger('sub_cater')->unsigned();
            $table->foreign('sub_cater')->references('id')->on('sub_caters');
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
        Schema::dropIfExists('courses');
    }
}
