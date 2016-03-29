<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('image_path');
            $table->integer('academy_id')->unsigned()->index();
            $table->tinyInteger('status')->default(1);

            $table->timestamps();

            $table->foreign('academy_id')
                  ->references('id')->on('academies')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function($table)
        {
                $table->dropForeign(['academy_id']);
        });
        Schema::drop('images');
    }
}
