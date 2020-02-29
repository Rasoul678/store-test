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
            $table->string('order_number')->unique();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign ('user_id')->references ('id')->on ('users')
                              ->onDelete ('cascade');
            
            $table->integer ('total_price');
            $table->boolean ('is_shipped')->default (false);
            $table->boolean ('is_delivered')->default (false);
            $table->enum('order_status', ['pending', 'processing', 'completed', 'decline'])->default('pending');

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
