<?php

use App\Models\Enums\ProductStatus;
use App\Models\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnumOrderProductShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopping_carts', function (Blueprint $table) {
            $table->dropColumn('cart_status');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_status');
            $table->string('status')->default(OrderStatus::PENDING);
        });
        Schema::table('products', function (Blueprint $table) {
            $table->string('status')->default(ProductStatus::ACTIVE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopping_carts', function (Blueprint $table) {
            $table->enum('cart_status', ['active', 'checkout', 'completed', 'abandoned'])
                ->default('active');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->enum('order_status', ['pending', 'completed', 'cancelled'])
                ->default('pending');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
