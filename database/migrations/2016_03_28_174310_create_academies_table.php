<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->increments('id');

            $table->string('username', 30)->unique();
            $table->string('email', 100)->unique();
            $table->string('phone', 22);
            $table->string('name', 50);
            $table->text('description');
            $table->tinyInteger('status')->default(1);

            $table->timestamps();
        });
        DB::statement('ALTER TABLE `academies` ADD `location` POINT AFTER `description`');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('academies');
    }
}
