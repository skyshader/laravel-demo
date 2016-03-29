<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademyTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy_tag', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('academy_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();
            $table->tinyInteger('status')->default(1);
            
            $table->timestamps();

            $table->foreign('academy_id')
                  ->references('id')->on('academies')
                  ->onDelete('cascade');
            $table->foreign('tag_id')
                  ->references('id')->on('tags')
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
        Schema::table('academy_tag', function($table)
        {
            $table->dropForeign(['academy_id']);
            $table->dropForeign(['tag_id']);
        });
        Schema::drop('academy_tag');
    }
}
