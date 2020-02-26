<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique(); // slug is a URL friendly version of any name, and very SEO friendly
            $table->text('description')->nullable();
            $table->unsignedInteger('parent_id')->default(1)->nullable(); // to make a nested tree of categories
            $table->boolean('featured')->default(0);
            $table->boolean('menu')->default(1); // to show or hide a category in the main navigation
            $table->string('image')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
