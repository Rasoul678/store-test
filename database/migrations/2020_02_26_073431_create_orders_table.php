<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger ('user_id')->unsigned ()->nullable ();
            $table->foreign ('user_id')->references ('id')->on ('users')
                              ->onUpdate ('cascade')->onDelete ('set null');
            $table->integer ('total_price');
            $table->boolean ('shipped')->default (false);
            $table->boolean ('delivered')->default (false);

            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
