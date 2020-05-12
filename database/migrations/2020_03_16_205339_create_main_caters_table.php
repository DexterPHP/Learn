<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_caters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('title_en');
            $table->text('description');
            $table->string('image_link');
            $table->string('icon_link')->default('fa fa-book ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_caters');
    }
}
