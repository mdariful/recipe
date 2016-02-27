<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('ingredient_recipe', function(Blueprint $table)
        {
           $table->integer('recipe_id')->unsigned()->index();
           $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
           
           $table->integer('ingredient_id')->unsigned()->index();
           $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
           
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('ingredients');
        Schema::dropIfExists('ingredient_recipe');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
